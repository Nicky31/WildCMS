<?php

class Boutique extends CI_Controller
{
	public function __construct()
	 {
		parent::__construct();
		
		$this->load->model('boutique_model','boutiqueManager');
		$this->load->database('static');
		
		if(! $this->config->item('boutique')) // Si boutique désactivé, on stop
			$this->layout->view('boutique/disabled');
	 }
	 
	public function index()
	 {
		$this->load->helper('items');
		$datas = array();
		$datas['allowedBuy'] = ( $this->boutiqueManager->checkExists('personnages','account',$this->session->userdata('id')) ) ? true : false; // Bool pour afficher ou non l'achat
		$datas['items'] = $this->boutiqueManager->listItems();
		$datas['persos'] = $this->boutiqueManager->listPersos('*',$this->session->userdata('id'));
		$datas['perfectTaxItem'] = $this->config->item('perfectTaxItem');
			
			foreach($datas['items'] as $cle => $valeur) // On renseigne les stats
			 { 
				$datas['items'][$cle]->stats = getStats(null,null,$datas['items'][$cle]->Statistiques);
			 }
		
		$this->layout->view('boutique/affichage',$datas);
	 }
	 
	public function buy()
	 {
		if($this->session->userdata('id')) // S'il est connecté 
		 {
			if(!empty($_POST['id']) && !empty($_POST['perso']) && !empty($_POST['jet']) ) // Si les POST nécessaires sont reçus
			 {
			  $id = intval($_POST['id']);
			  $perso = intval($_POST['perso']);
			  $jet = ($_POST['jet'] == '20' || $_POST['jet'] == '21') ? $_POST['jet'] : '20'; // on vérifie la valeur du type de jet demandé
			  
				if($this->boutiqueManager->checkExists('item_db','ID',$id)) // Si l'objet existe et est un item boutique 
				  {
					if($this->boutiqueManager->checkExists('personnages',array ('account' => $this->session->userdata('id'), 'guid' => $perso) ) ) // Si le perso existe & lui appartient
					 { 	
						$item = $this->boutiqueManager->searchItem('*',$id); // On récupère les infos sur l'item
						$prix = ($jet == '20') ? $item[0]['boutique'] : $item[0]['boutique'] * $this->config->item('perfectTaxItem'); // prix de l'item
							if( $this->session->userdata('points') - $prix >= 0) // S'il a assez de points					
							 { // Vérifications terminées
								if ( $this->boutiqueManager->giveItem( array('PlayerID' => $perso,'Action' => $jet, 'Nombre' => $id) ) ) // Si la live action a bien été add
								 {
									$points = $this->session->userdata('points') - $prix;
									$this->session->set_userdata('points',$points); // Edite son nbre de pts
									$this->boutiqueManager->editPts( array('points' => $this->session->userdata('points')), $this->session->userdata('id') );
									
									$this->boutiqueManager->insertHistoric(array('account' => $this->session->userdata('id'),
																				 'perso' => $perso, 
																				 'action' => $jet,
																				 'item' => $id ) ,
																		   array('date' => 'NOW()') ); // On note l'achat dans l'historique
																		   
									$this->layout->view('boutique/successBuy');
								 }
								else
								  $this->layout->view('errors/unexpected_error');
							 }
							else
							  $this->layout->view('boutique/insufficientPoints');
     				 }
					else
					  $this->layout->view('boutique/perso_required');
				  }
				 else
				   $this->layout->view('errors/non_existent');
			 }
			else
			  $this->layout->view('errors/post_missing');
		 }
		else
		  $this->layout->view('errors/online_required');
	 }
	 
	public function admin()
	 {
		if($this->session->userdata('id') && $this->session->userdata('admin_level') >= $this->config->item('admin_level')) 
		 {
			if(func_num_args() > 0) // S'il a reçu un GET -> delete
			 {
				$id = intval(func_get_arg(0));
				 if($this->boutiqueManager->checkExists('item_db','ID',$id)) // Si l'item demandé existe
				  {
					if($this->boutiqueManager->update(array('ID' => $id), array('boutique' => 0)) )
						$this->layout->view('success/edit');
					else
						$this->layout->view('errors/unexpected_error');
    			  }
				 else
				   $this->layout->view('errors/non_existent');
			 }
			elseif(!empty($_POST['id']) && !empty($_POST['price'])) // S'il a reçu 2 posts => add
			 {
				$id = intval($_POST['id']); 
				$price = intval($_POST['price']);
				  if($this->boutiqueManager->checkExists('item_dbAdd','ID',$id)) // Si l'item existe 
				   {
						if($this->boutiqueManager->update(array('ID' => $id), array('boutique' => $price)) )
							$this->layout->view('success/add');
						else
							$this->layout->view('errors/unexpected_error');
				   }
				  else
				    $this->layout->view('boutique/unexistent_item');
			 
			 }
			else
			 {
				$datas['items'] = $this->boutiqueManager->listItems();
				$this->layout->view('boutique/admin',$datas);
			 }
		 }
		else
		  $this->layout->view('errors/admin_required');
	 }
}