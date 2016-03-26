<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote extends CI_Controller
{

	public function __construct()
	 {
		parent::__construct();
		
		$this->load->model('vote_model','voteManager');
		// $this->output->enable_profiler(true);
	 }
	
	 public function index() 
	  {
		$datas['online'] = ($this->session->userdata('id')) ? true : false; // On regarde s'il est connecté ou non
		$datas['vote'] = $this->config->item('vote');
		$datas['pts_vote'] = $this->config->item('pts_vote');
		
		if($datas['online']) // S'il est connecté
		 {
			$infos = $this-> voteManager -> getInfos('*',$this->session->userdata('id')); // Récuperation des infos sur le compte
			$timestamp = time();
			$delay = floor(($timestamp - $infos[0]['heurevote']) );
			
				if($delay >= $this->config->item('vote_delay') * 60) // Si la dernière fois qu'il a voté remonte a plus du temps de délai entre chaque vote -> OK
				 {
					$mules = $this->voteManager->infoMules('*', array ( 'lastIP' => $this->session->userdata('ip') ) );	
						foreach($mules as $mule) // On vérifie qu'il n'a pas déjà voté sur une de ses mules
						 {
							if(! isset($check) ) // On s'arrête à la premiere mule ayant déjà voté
							 {
								$delay = floor($timestamp - $mule->heurevote); 
								if($delay < $this->config->item('vote_delay') * 60)
									$check = $delay;
							}
						 }
						 
						 if(isset($check)) { // Si une mule a déjà voté, on stop & le signale
							$datas['check'] = return_time($this->config->item('vote_delay') * 60 - $check);
							$this->layout->view('vote/waiting_mule',$datas);
							}
						else{ // Tout s'est bien passé, il peut voter
							if(!isset($_POST['action'])) // Si il demande juste la page de vote
							  $this->layout->view('vote/voteOnline',$datas);
							else // S'il veut voter  
							  $this->action(); 
						 }
				 }
			    else {
				  $datas['waiting'] = return_time($this->config->item('vote_delay') * 60 - $delay);
				  $this->layout->view('vote/waiting.php', $datas);
				}
				
		}
		else // S'il est hors ligne, simple vote direct 
			$this->layout->view('vote/voteOffline',$datas);		
	  }
	  
	private function action()
	 {
		if(! $this->session->userdata('id')) // Si pas co
			$this->layout->view('errors/online_required');
		else {
			$totalPts = $this->session->userdata('points') + $this->config->item('pts_vote'); // Nouveau total de pts
			$votes = $this->voteManager->getInfos('vote',$this->session->userdata('id')); // récupère son nbre de vote
 			$votes[0]['vote']++; // incrémente pour le new vote
			
			$this->voteManager->update ( array ('guid' => $this -> session -> userdata('id') ), array ( 
																								'points' => $totalPts ,
																								'heurevote' => time(),
																								'vote' => $votes[0]['vote']) 
																								);
			$this->session->set_userdata('points',$totalPts);
			redirect($this->config->item('vote'));
	   }
	 }

}