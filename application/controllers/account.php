<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
	private $datas;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('id'))
			$this->layout->view('errors/online_required');
			
		$this->load->model('account_model','accountManager');
		$this->load->helper('regex_helper');
		
		$this->datas['infos'] = $this-> accountManager -> searchAccount($this->session->userdata('id')); // Récuperation des infos sur le compte

			
	}
	
	public function index()
	 {
		$this->layout->view('account/account.php',$this->datas);
	 }
	
	public function setAccount()
	 {
		if(empty($_POST['response']) || empty($_POST['newAccount']))
		 {
			$this->layout->view('account/setAccount.php',$this->datas);
		 }
		else
		 {
			if($_POST['response'] == $this->datas['infos'][0]['reponse'])
			 {
				if(checkLogin($_POST['newAccount'])) // Si le nom de compte est correct
				 {
					if($this->accountManager->update(array('guid' => $this->session->userdata('id') ),array ('account' => $_POST['newAccount'])))
					 {
						$this->session->set_userdata('account',$_POST['newAccount']);
						$this->layout->view('success/edit');
					 }
					else
						$this->layout->view('unexpected_error');
				 }
				else
				  $this->layout->view('account/incorrectAccount');
			 }
			else
			 $this->layout->view('account/badResponse.php');
		 }
	 }
	 
	public function setPseudo()
	 {
		if(empty($_POST['response']) || empty($_POST['newPseudo']))
		 {
			$this->layout->view('account/setPseudo.php',$this->datas);
		 }
		else
		 {
			if($_POST['response'] == $this->datas['infos'][0]['reponse'])
			 {
				if(checkPseudo($_POST['newPseudo'])) // Si le pseudo est correct
				 {
					if($this->accountManager->update(array('guid' => $this->session->userdata('id') ),array ('pseudo' => $_POST['newPseudo'])))
					 {
					 	$this->session->set_userdata('pseudo',$_POST['newPseudo']);
						$this->layout->view('success/edit');
					 }
					else
						$this->layout->view('unexpected_error');
				 }
				else
				  $this->layout->view('account/incorrectPseudo');
			 }
			else
			 $this->layout->view('account/badResponse.php');
		 }
	 }
	 
	public function setPassword()
	 {
		if(empty($_POST['response']) || empty($_POST['newPass']) || empty($_POST['newPass2']))
		 {
			$this->layout->view('account/setPassword',$this->datas);
		 }
		else // traitement 
		 {
			if($_POST['response'] == $this->datas['infos'][0]['reponse'])
			 {
				if($_POST['newPass'] == $_POST['newPass2'])
				  {
					if(checkPass($_POST['newPass'])) // Si le password est correct
					 {
					 if($this->config->item('enable_hash')) 
						$_POST['newPass'] = hash($this->config->item('hash'),$_POST['newPass']); // Si hash activé, on hash le mdp
						
						if($this->accountManager->update(array('guid' => $this->session->userdata('id') ),array ('pass' => $_POST['newPass'])))
							$this->layout->view('success/edit');
						else
							$this->layout->view('unexpected_error');
					 }
					else
					  $this->layout->view('account/incorrectPass');
				  }
				 else
				   $this->layout->view('account/differentPass');
			 }
			else
			 $this->layout->view('account/badResponse.php');
		 }
	 }
	 
	 public function setEmail()
	 {
		if(empty($_POST['response']) || empty($_POST['newEmail']))
		 {
			$this->layout->view('account/setEmail',$this->datas);
		 }
		else
		 {
			if($_POST['response'] == $this->datas['infos'][0]['reponse'])
			 {
				if(checkMail($_POST['newEmail'])) // Si le pseudo est correct
				 {
					if($this->accountManager->update(array('guid' => $this->session->userdata('id') ),array ('email' => $_POST['newEmail'])))
					 	$this->layout->view('success/edit');
					else
						$this->layout->view('unexpected_error');
				 }
				else
				  $this->layout->view('account/incorrectEmail');
			 }
			else
			 $this->layout->view('account/badResponse.php');
		 }
	 }
	 
	 public function setQuestion()
	 {
		if(empty($_POST['response']) || empty($_POST['newQuestion']) || empty($_POST['newResponse']))
		 {
			$this->layout->view('account/setQuestion',$this->datas);
		 }
		else
		 {
			if($_POST['response'] == $this->datas['infos'][0]['reponse'])
			 {
				if(checkQuestion($_POST['newQuestion']) && checkResponse($_POST['newResponse'])) // Si le pseudo est correct
				 {
					if($this->accountManager->update(array('guid' => $this->session->userdata('id') ),
															array ('question' => $_POST['newQuestion'] , 'reponse' => $_POST['newResponse'])))
					 	$this->layout->view('success/edit');
					else
						$this->layout->view('unexpected_error');
				 }
				else
				  $this->layout->view('account/incorrectQuestion');
			 }
			else
			 $this->layout->view('account/badResponse.php');
		 }
	 }
}