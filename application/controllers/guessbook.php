<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guessbook extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('livreor_model', 'livreorManager');
	}
	
// ------------------------------------------------------------------------
	
	public function index($g_nb_commentaire = 1)
	{
		$this->voir($g_nb_commentaire);
	}
	
// ------------------------------------------------------------------------
	
public function voir($g_nb_commentaire = 1)
{
	$this->load->library('pagination');
	
	$data = array();
	
	$nb_commentaire_total = $this->livreorManager->count();
	
	if($g_nb_commentaire > 1)
	{

		if($g_nb_commentaire <= $nb_commentaire_total)
		{
			$nb_commentaire = intval($g_nb_commentaire);
		}
		else
		{			
			$nb_commentaire = 1;
		}
	}
	else
	{		
		$nb_commentaire = 1;
	}
	
	$this->pagination->initialize(array('base_url' => base_url() . 'index.php/guessbook/voir/',
					    'total_rows' => $nb_commentaire_total,
					    'per_page' => $this->config->item('commentaires_per_page'))); 
	
	$data['pagination'] = $this->pagination->create_links();
	$data['nb_commentaires'] = $nb_commentaire_total;
	$data['admin'] = ($this->session->userdata('admin_level') >= $this->config->item('admin_level')) ? true : false;
	$data['online'] = ($this->session->userdata('id')) ? true : false;
	$data['commentaires'] = $this->livreorManager->get_commentaires($this->config->item('commentaires_per_page'), $nb_commentaire-1);
	$data['coms_count'] = $nb_commentaire_total;
	
	//	On charge la vue
	$this->layout->view('guessbook/affichage', $data);
}

	
// ------------------------------------------------------------------------
	
	public function add()
	{
		if(empty($_POST['commentaire']) || !empty($_POST['commentaire']) && $_POST['commentaire'] === '')
			$this->layout->view('errors/post_missing');
		else
		 {
			if($this->session->userdata('id'))
			 {
				if($this->livreorManager->create ( array('text' => $_POST['commentaire'], 'pseudo' => $this->session->userdata('pseudo')), array('date' => 'NOW()') ) )
					$this->layout->view('success/add');
				else
					$this->layout->view('errors/unexpected_error');
			 }
		   else
		     $this->layout->view('errors/online_required');
		 }
	}
	
	 public function delete() // Supprime une news
	  {	   
		 if($this->session->userdata('admin_level') >= $this->config->item('admin_level'))
	      {
		 
			if(sizeof(func_get_args()) >= 1) // Si l'id de la news est bien indiqué
			 {
			   $id = intval(func_get_arg(0));

					if($this->livreorManager->checkExists('id',$id)) // Si la news existe
					  {
							if($this->livreorManager->delete($id))
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
	
	
}


/* End of file livreor.php */
/* Location: ./application/controllers/livreor.php */
