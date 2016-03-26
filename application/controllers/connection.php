<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connection extends CI_Controller
{

	public function index()
	 {
		$this->load->model('connection_model','connectionManager');
		
		if(!empty($_POST['account']) && !empty($_POST['pass'])) // si les 2 POST sont bien reçus
		 {
			if($this->config->item('enable_hash'))  // si le hash est activé, on hash le pass
				$_POST['pass'] = hash($this->config->item('hash'),$_POST['pass']);
				
			$exists = $this->connectionManager->count( 
												array('account' => $_POST['account'], 'pass' => $_POST['pass']) 
													 );
													 
				if($exists >= 1) // S'il y a un compte correspondant à ces identifiants
				  {
				    $account_datas = $this->connectionManager -> getAccount($_POST['account'])
															  -> first_row(); // On récupère toutes les données sur le compte
					
								// Initialisation des variables sessions
						$this->session-> set_userdata(array(
										 'id' => $account_datas->guid,
										 'account' => $account_datas->account,
										 'admin_level' => $account_datas->level,
										 'pseudo' => $account_datas->pseudo,
										 'points' => $account_datas->points,
										 'ip' => $account_datas->lastIP));
										 
					$this->layout->view('connection/success');
				  }
			    else 
				 $this->layout->view('connection/incorrect');
													 
		 
		 }
		else
		 $this->layout->view('errors/post_missing');
	 }
	 
	 public function logout()
	 {
		if($this->session->userdata('id'))
		  {
			$this->session->sess_destroy();
			$this->layout->view('logout');
		  }
		else
		  $this->layout->view('already_disconnected');
	 }

}