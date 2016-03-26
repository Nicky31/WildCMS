<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ladder extends CI_Controller 
{

	public function __construct()
	 {
		parent::__construct();
		
		$this->load->model('ladder_model','ladderManager');
	 }
	 
	 public function index()
	  {
		$this->persos();
	  }
	  
	public function persos()
	 {
		$num_perso = (sizeof(func_get_args()) >= 1) ? func_get_arg(0) : 0;
			
		$this->load->library('pagination');
		
		$persos_count = $this->ladderManager->count();
		
		if($num_perso > 1)
		{
			if($num_perso <= $persos_count)
			{	
				$num_perso = intval($num_perso);
			}
			else
			{				
				$num_perso = 1;
			}
		}
		else
		{	
			$num_perso = 1;
		}
		
	$persos_count = ( $persos_count/ 2 == 0) ? $persos_count : $persos_count + 1; // Réglage d'un petit problème qui n'affiche pas la dernière page si elle ne contient qu'un élément
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/ladder/persos/',
					    'total_rows' => $persos_count,
					    'per_page' => $this->config->item('persos_per_page'))); 
	
	$datas['pagination'] = $this->pagination->create_links();
	$datas['persos_count'] = $persos_count;
	$datas['rang'] = 1;
	$datas['num_perso'] = $num_perso;
	
		$datas['persos'] = $this->ladderManager->listPersos($num_perso,$this->config->item('persos_per_page'));
		$this->layout->view('ladder/persos',$datas);
	 }
	 
   public function guilds()
	 {
		$num_guild = (sizeof(func_get_args()) >= 1) ? func_get_arg(0) : 0;
			
		$this->load->library('pagination');
		
		$guilds_count = $this->ladderManager->countGuilds();
		
		if($num_guild > 1)
		{
			if($num_guild <= $guilds_count)
			{	
				$num_guild = intval($num_guild);
			}
			else
			{				
				$num_guild = 1;
			}
		}
		else
		{	
			$num_guild = 1;
		}
		
	$guilds_count = ( $guilds_count/ 2 == 0) ? $guilds_count : $guilds_count + 1; // Réglage d'un petit problème qui n'affiche pas la dernière page si elle ne contient qu'un élément
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/ladder/guilds/',
					    'total_rows' => $guilds_count,
					    'per_page' => $this->config->item('guilds_per_page'))); 
	
	$datas['pagination'] = $this->pagination->create_links();
	$datas['guilds_count'] = $guilds_count;
	$datas['rang'] = 1;
	$datas['num_guild'] = $num_guild;
	
		$datas['guilds'] = $this->ladderManager->listGuilds($num_guild,$this->config->item('guilds_per_page'));
			foreach($datas['guilds'] as $cle => $valeur) // On définit les emblèmes
			  {
				$embleme = explode(',',$valeur->emblem);
			
				$datas['guilds'][$cle]->embleme['bgSrc'] = base_convert($embleme['0'],36,10);
				$datas['guilds'][$cle]->embleme['bgColor'] = base_convert($embleme['1'],36,10);
				$datas['guilds'][$cle]->embleme['logoSrc'] = base_convert($embleme['2'],36,10);
				$datas['guilds'][$cle]->embleme['logoColor'] = base_convert($embleme['3'],36,10);
			  }
			  
		$this->layout->view('ladder/guilds',$datas);
	 }
		
	public function votes()
	 {
		$num_voter = (sizeof(func_get_args()) >= 1) ? func_get_arg(0) : 0;
			
		$this->load->library('pagination');
		
		$votes_count = $this->ladderManager->countVotes('vote >=',1);
		
		if($num_voter > 1)
		{
			if($num_voter <= $votes_count)
			{	
				$num_voter = intval($num_voter);
			}
			else
			{				
				$num_voter = 1;
			}
		}
		else
		{	
			$num_voter = 1;
		}
		
	$votes_count = ( $votes_count/ 2 == 0) ? $votes_count : $votes_count + 1; // Réglage d'un petit problème qui n'affiche pas la dernière page si elle ne contient qu'un élément
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/ladder/votes/',
					    'total_rows' => $votes_count,
					    'per_page' => $this->config->item('votes_per_page'))); 
	
	$datas['pagination'] = $this->pagination->create_links();
	$datas['votes_count'] = $votes_count;
	$datas['rang'] = 1;
	$datas['num_voter'] = $num_voter;
	
		$datas['votes'] = $this->ladderManager->listVoters($num_voter,$this->config->item('votes_per_page'));
		$this->layout->view('ladder/votes',$datas);
	 }
	
}