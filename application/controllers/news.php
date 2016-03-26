<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('news_model','newsManager');
		
		// $this->output->enable_profiler(true);
	}
	
	public function index()
	 {
		$num_news = (sizeof(func_get_args()) >= 1) ? func_get_arg(0) : 0;
			
		$this->load->library('pagination');
		
		$news_count = $this->newsManager->count();
		
		if($num_news > 1)
		{
			if($num_news <= $news_count)
			{	
				$num_news = intval($num_news);
			}
			else
			{				
				$num_news = 1;
			}
		}
		else
		{	
			$num_news = 1;
		}
		
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/news/index/',
					    'total_rows' => $news_count,
					    'per_page' => $this->config->item('news_per_page'))); 
	
	$datas['pagination'] = $this->pagination->create_links();
	$datas['news_count'] = $news_count;
		
		$datas['news'] = $this->newsManager->listNews($num_news,$this->config->item('news_per_page'));
		$datas['admin'] = ($this->session->userdata('admin_level') >= $this->config->item('admin_level')) ? true : false;
		$this->layout->view('news/list',$datas);
	 }
	 
	 public function delete() // Supprime une news
	  {	   
		 if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
	      {
		 
			if(sizeof(func_get_args()) >= 1) // Si l'id de la news est bien indiqué
			 {
			   $id = intval(func_get_arg(0));

					if($this->newsManager->checkExists('id',$id)) // Si la news existe
					  {
							if($this->newsManager->delete($id))
								$this->layout->view('success/delete.php');
							else
								$this->layout->view('errors/unexpected_error.php');
					  }
					else
					 $this->layout->view('errors/non_existent');
			 }
			else
			  $this->layout->view('errors/get_missing');
		  
	    }
	   else
	     $this->layout->view('errors/admin_required');
	  }
	  
	  public function add() // Ajouter une news
	   {
	     if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
		  {
			
			if(empty($_POST['title']) || empty($_POST['news'])) // Si aucun POST n'est reçu, afficher le formulaire
			 {
				$this->layout->view('news/add');
			 }
			else // Sinon, traiter les POST
			 {
				$query = array(
							  'titre' => $_POST['title'],
							  'text' => $_POST['news'],
							  'auteur' => $this->session->userdata('pseudo'));
			    $date = array ('date' => 'NOW()');
				
				if( $this->newsManager->create($query,$date) ) // si tout s'est bien passé
					$this->layout->view('success/add');
				else 
					$this->layout->view('errors/unexpected_error');
									
			 }
		  }
		 else
			$this->layout->view('errors/admin_required');
	   }
	   
	   public function edit() // Edite une news
	  {
	  
	  if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
		{
			if(sizeof(func_get_args()) >= 1) // Si l'id de la news est bien indiqué
			 {
			   $id = intval(func_get_arg(0));

					if($this->newsManager->checkExists('id',$id)) // Si la news existe
					  {
						if(empty($_POST['title']) || empty($_POST['news']))
							 {
								$datas['new'] = $this->newsManager->searchNews($id);
								
								$this->layout->view('news/edit.php',$datas);
							 }
						  else  // Si les POST sont dispos
							 {
								if($this->newsManager->update($id,array('titre' => $_POST['title'], 'text' => $_POST['news'])))
									$this->layout->view('success/edit');
								else
									$this->layout->view('errors/unexpected_error');
							 }
					  }
					else
					 $this->layout->view('errors/non_existent');

			 }
			else
			  $this->layout->view('errors/get_missing');
			  
		 }
	    else
		  $this->layout->view('errors/admin_required');
		
	  }

}