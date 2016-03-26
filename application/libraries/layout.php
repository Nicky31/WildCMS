<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	private $theme = 'default';
	private $counter = 0;
	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{	
		$this ->CI =& get_instance();
		$this -> CI -> load -> helper('assets');
		$this -> CI -> load -> model('index_model','indexManager');
		
		// Update IP
		$this -> CI -> indexManager -> update ( array ('guid' => $this -> CI -> session -> userdata('id') ), array ( 'lastIP' => $this -> CI -> session -> userdata('ip_address') ) );
		// Contenu de la page
		$this->var['output'] = '';
		// Statistiques
		$this->var['stats'] = $this -> CI -> indexManager -> initStats($this->CI->config->item('serverHost'),$this->CI->config->item('serverPort'));
		// Titre
		$this->var['titre'] = $this->CI->config->item('titre');		
		// Charset
		$this->var['charset'] = $this->CI->config->item('charset');
		// Forum
		$this->var['forum'] = $this->CI->config->item('forum');
		
		if( !$this-> CI -> session -> userdata('id'))  // Si déconnecté
			$this->theme='default';
		else  // si connecté
		 {
		  $this->theme = 'connected'; 
			
		  $this->var['points'] = $this->CI->session->userdata('points');
		  $this->var['pseudo'] = $this->CI->session->userdata('pseudo');
		  
			 if($this->CI->session->userdata('admin_level') >= $this->CI->config->item('admin_level'))
		   				$this->theme='admin';
		 }
			
			
		 
		 

	
	}
	
/*
|===============================================================================
| Méthodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
	   if($this->counter == 0) //Fonction exécutable qu'une seule fois dans un script, pour afficher plusieurs views utiliser function views
	    {
			$this->var['output'] .= $this->CI->load->view($name, $data, true);
			
			$this->CI->load->view('../themes/'.$this->theme, $this->var);
			
			$this->counter++;
	    }
	}
	
	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}
	
////////////////////////////////////////

	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}
	
	public function set_theme($theme = 'default')
	 {
		if(is_string($theme) AND file_exists('./application/themes/'.$theme.'.php'))
		 {
			$this->theme = $theme;
			return true;
		 }
		 return false;
	 }

}
