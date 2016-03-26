<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informations extends CI_Controller
{
	public function __construct()
	 {
		parent::__construct();
		
		$this->load->model('informations_model','informationsManager');
	 }
	 
	public function index()
	 {
	  $datas = array();
	  
		$datas['intro'] = $this->config->item('introduction');
		$datas['type'] = $this->config->item('type');
		$datas['pvm'] = $this->config->item('pvm');
		$datas['honor'] = $this->config->item('honor');
		$datas['kamas'] = $this->config->item('kamas');
		$datas['drop'] = $this->config->item('drop');

		$datas['accounts'] = $this->informationsManager->rowsCount('accounts');
		$datas['persos'] = $this->informationsManager->rowsCount('personnages');
		$datas['neutres'] = $this->informationsManager->rowsCount('personnages',array ( 'alignement' => 0));
		$datas['anges'] = $this->informationsManager->rowsCount('personnages',array ( 'alignement' => 1));
		$datas['demons'] = $this->informationsManager->rowsCount('personnages',array ( 'alignement' => 2));
		$datas['serianes'] = $this->informationsManager->rowsCount('personnages',array ( 'alignement' => 3));
		
		$datas['fecas'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 1));
		$datas['osas'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 2));
		$datas['enus'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 3));
		$datas['srams'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 4));
		$datas['xelors'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 5));
		$datas['ecas'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 6));
		$datas['enis'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 7));
		$datas['iops'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 8));
		$datas['cras'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 9));
		$datas['sadis'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 10));
		$datas['sacris'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 11));
		$datas['pandas'] = $this->informationsManager->rowsCount('personnages',array ( 'class' => 12));
		
		

		
		
		$this->layout->view('informations',$datas);
	 }

}