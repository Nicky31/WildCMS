<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller
{
	private $datas = array();
	
	public function __construct()
	 {
		parent::__construct();
		
		$this->load->model('staff_model','staffManager');
		
		  $this->datas['staffs'] = $this->staffManager->listStaff('*');
	 }
	 
	public function index()
	 {
		$this->layout->view('staff/presentation',$this->datas);
	 }
	 
    public function edit()
	 {
	 
		$this->layout->view('staff/edit',$this->datas);
	 }
	 
	public function delete()
	 {
		if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
		  {
			if(sizeof(func_get_args()) > 0) // Si l'id est bien indiqué
			 {
				$id = intval(func_get_arg(0));
				if($this->staffManager->checkExists(array ('id' =>$id) )) // Si le staffID est bien existant
				 {
					if($this->staffManager->delete($id))
						$this->layout->view('success/delete');
					else
						$this->layout->view('errors/unexpected_error');
				 }
			   else
				 $this->layout->view('errors/non_existent');
			 }
			else
			  $this->layout->view('errors/post_missing');
		 }
	    else
		  $this->layout->view('errors/admin_required');
	 }
	 
	 public function add()
	  {
		if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
		 {
			if(empty($_POST['pseudo']) || empty($_POST['rôle']) || empty($_POST['contact']))
				$this->layout->view('errors/post_missing');
			else // Si les POST sont bien reçus
			 {
				if(! $this->staffManager->checkExists('pseudo',$_POST['pseudo'])) // S'il est pas déjà enregistré
				  {
					  if($this->staffManager->create(array ('pseudo' => $_POST['pseudo'], 'rôle' => $_POST['rôle'], 'contact' => $_POST['contact']) ) ) 
						 $this->layout->view('staff/add_success');
					  else
						 $this->layout->view('errors/unexpected_error');
				  }
				else
				  $this->layout->view('staff/pseudo_alreadyExists',array('pseudo' => $_POST['pseudo']));
			 
			 }
		 }
	    else
		  $this->layout->view('errors/admin_required');
	  }

	   
}