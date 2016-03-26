<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscriptions extends CI_Controller
{

	public function __construct()
	 {
		parent::__construct();
		
		if($this->session->userdata('admin_level')) // S'il est connecté
			$this->layout->view('errors/disconnect_required'); 
		
		if(! $this->config->item('inscriptions') ) // Si les inscriptions sont fermées
			$this->layout->view('inscription/inscriptions_closed');
			
		$this->load->helper('regex_helper');
		$this->load->model('inscription_model','inscriptionManager');
	 }
	 
	 public function index()
	  {
		if(empty($_POST['account']) || empty($_POST['password']) || empty($_POST['passwordConfirm']) || empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['question']) || empty($_POST['response']))
			$this->layout->view('inscription/inscription');
		else // Traitement
		{
			if(checkLogin($_POST['account']))
			 {
				if(checkPass($_POST['password']))
				 {
					if($_POST['password'] == $_POST['passwordConfirm'])
					 {
						if(checkPseudo($_POST['pseudo']))
						 {
							if(checkMail($_POST['email']))
							 {
								if(checkQuestion($_POST['question']))
								 {
									if(checkResponse($_POST['response']))
									 {
										if(! $this->inscriptionManager->checkExists(array('account' => $_POST['account'])))
										 { // Vérifications terminées
											if($this->config->item('enable_hash')) 
												$_POST['password'] = hash($this->config->item('hash'),$_POST['password']); // Hash si activé
												
											$sql = array('account' => $_POST['account'],
														 'pass' => $_POST['password'],
														 'email' => $_POST['email'],
														 'question' => $_POST['question'],
														 'reponse' => $_POST['response'],
														 'pseudo' => $_POST['pseudo'],
														 'lastIP' => $this -> session -> userdata('ip_address'));
											
											if($this->inscriptionManager->create($sql)) { // Création du compte
												$this->layout->view('inscription/inscription_success');
			
												}
											else
												$this->layout->view('errors/unexpected_error');
										 }
										else
										  $this->layout->view('inscription/account_alreadyexists');
									 }
									else
									  $this->layout->view('account/incorrectResponse');
								 }
								else
								  $this->layout->view('account/incorrectQuestion');
							 }
							else
							  $this->layout->view('account/incorrectEmail');
					     }
						else
						  $this->layout->view('account/incorrectPseudo');
					 }
					else
					  $this->layout->view('account/differentPass');
				 }
				else
				  $this->layout->view('account/inccorectPass');
			 }
			else
			  $this->layout->view('account/incorrectAccount');
		
		}
	  
	  }

}