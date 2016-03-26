<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller
{

	public function __construct() 
	{
		parent::__construct();
		
		if($this->session->userdata('id'))
			$this->layout->view('errors/disconnect_required');
	}

	public function index()
	 {
		$datas['name'] = $this->config->item('titre');
		$datas['dofus'] = $this->config->item('dofus');
		$datas['uplauncher'] = $this->config->item('uplauncher');
		
		$this->layout->view('join',$datas);
	 }
}