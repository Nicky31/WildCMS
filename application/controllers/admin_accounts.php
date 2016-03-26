<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_accounts extends CI_Controller
{
	public function __construct()
	 {
		parent::__construct();
		
		if(! $this->session->userdata('admin_level') >= $this->config->item('admin_level'))
			$this->layout->view('errors/admin_required');
			
		$this->load->model('adminAccounts_model','accountsManager');
	 }
	
	public function index() // Liste des comptes
	 {
		$num_account = (sizeof(func_get_args()) >= 1) ? func_get_arg(0) : 0;
			
		$this->load->library('pagination');
		
		$accounts_count = $this->accountsManager->accountsCount($this->config->item('maxGmDisplayAccount') );
		
		if($num_account > 1)
		{
			if($num_account <= $accounts_count)
			{	
				$num_account = intval($num_account);
			}
			else
			{				
				$num_account = 1;
			}
		}
		else
		{	
			$num_account = 1;
		}
		
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/admin_accounts/index/',
					    'total_rows' => $accounts_count,
					    'per_page' => $this->config->item('accounts_per_page'))); 
	
	$datas['pagination'] = $this->pagination->create_links();
	$datas['accounts_count'] = $accounts_count;
		
		$datas['accounts'] = $this->accountsManager->listAccounts($this->config->item('maxGmDisplayAccount'),$num_account,$this->config->item('accounts_per_page'));

		$this->layout->view('admin_accounts/accounts',$datas);
	 }
	 
	 public function search() // recherche de comptes
	  {
		if(empty($_POST['item']) || empty($_POST['search'])) // POST['item'] = 'account' || 'pseudo'
			$this->layout->view('errors/post_missing');
		else // Traitement
		 {
		   $datas = array();
		   	  $datas['search'] = $_POST['search'];
		      $datas['accounts'] = $this->accountsManager->searchAccounts('*', array ( $_POST['item'] => $_POST['search'] , 'level' => 0));
			  
				$checkExists = $this->accountsManager->checkExists ( array ( $_POST['item'] => $_POST['search'] ) ) ; 

			if($checkExists)	 
				$this->layout->view('admin_accounts/search_'.$_POST['item'],$datas);
			else
			  $this->layout->view('admin_accounts/no_results',$datas);
		 
		 }
	  }
	  
	 public function displayAccount() // Afficher les infos sur un compte précis
	  { 
		if(sizeof(func_get_args()) >= 1) // Si l'id du compte est bien indiqué
		  {
			$id = intval(func_get_arg(0));
			   
			  if($this->accountsManager->checkExists('guid', $id) ) // Si le compte demandé existe
			   {
			     $datas['infos'] = $this->accountsManager->readArray($id); // infos sur le compte
					if($datas['infos'][0]['level'] <= $this->config->item('maxGmDisplayAccount') || $datas['infos'][0]['guid'] == $this->session->userdata('id') )
					 { // s'il a le droit de consulter les infos du compte demandé
						$this->layout->view('admin_accounts/display_account',$datas);
					 }
					else
					  $this->layout->view('admin_accounts/unauthorized_watching');
			   }
			 else
			   $this->layout->view('errors/non_existent');
		  }
		 else
		   $this->layout->view('errors/get_missing');
	  }
	  
	 public function clearAccounts()
	  {
		if(!empty($_POST['type']) && $_POST['type'] == "never_connected") // Option delete tous les comptes jamais connectés
		 {
			$datas['count'] = $this->accountsManager->count ( array( 'lastConnectionDate' => '') );
			$this->accountsManager->delete( array('lastConnectionDate' => '') );
			$this->layout->view('admin_accounts/neverConnected_clear.php',$datas);
		 }
		elseif(!empty($_POST['type']) && $_POST['type'] == "inactives" && !empty($_POST['date'])) // Delete les comptes inactifs depuis x date
		 {
			$date = explode('/', $_POST['date']); // Date maximum de derniere connection acceptée, avant elle on delete
			$accounts = $this->accountsManager->searchAccounts('*', array ( 'level' => 0) );
				$datas['accountsCount'] = 0;
				$datas['persosCount'] = 0;
				$datas['date'] = $_POST['date'];
				
				foreach ($accounts as $account) // on fait chaque comptes
				 { 
					if($account->lastConnectionDate != '') // Si l'account courant s'est bien déjà connecté
					 {
					   $lastCoDate = explode('~', $account->lastConnectionDate); // Date de la dernière connection
							$lastCoTimeStamp = mktime($lastCoDate['3'],$lastCoDate['4'],0,$lastCoDate['1'],$lastCoDate['2'],$lastCoDate['0']);
 
						if(! $timeStampLimit = mktime(0,0,0,$date['1'],$date['0'],$date['2']))  // Conversion en timestamp de la date limite
						    $this->layout->view('admin_accounts/error_date');
							
							if($lastCoTimeStamp < $timeStampLimit) // Si last connection avant date limite, on delete compte  + persos
							 {
								$this->accountsManager->delete( array( 'guid' => $account->guid) );
								$datas['accountsCount']++;
								
									$countPersos = $this->accountsManager->persosCount($account->guid); // nbre de persos du compte
										if($countPersos > 0) // On supprime ses persos
										 {
											$this->accountsManager->deletePersos( array ( 'account' => $account->guid) );
											$datas['persosCount'] += $countPersos;
										 }
							 }
						
					 }
				 }
		 
			$this->layout->view('admin_accounts/inactivesClear',$datas);
		 }
		else
		  $this->layout->view('errors/post_missing');
	  }
}