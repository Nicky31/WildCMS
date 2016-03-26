<?php

class Index_model extends MY_Model
{
	protected $table = 'accounts';
	private $table_persos = 'personnages';
	
   public function initStats($serverHost,$serverPort)
	{
		$stats = array();

		 $stats['server'] = ($this->checkConnec($serverHost,$serverPort)) ? "<b><font color=\"green\">EN LIGNE</font></b>" : "<b><font color=\"red\">HORS LIGNE</font></b>";
		// $stats['database'] = (! $this->checkConnec(HOST,'3306')) ? "<b><font color=\"green\">EN LIGNE</font></b>" : "<b><font color=\"red\">HORS LIGNE</font></b>";

		$stats['comptes'] = $this->db->count_all_results($this->table); // Nombre de comptes

		$stats['persos'] = $this->db->count_all_results($this->table_persos); // Nombre de persos
		
		$stats['cos'] = $this -> db -> where('logged',1)
									-> count_all_results($this->table); // Nombre de connectés

		$stats['ip_cos'] = $this -> db -> query('SELECT COUNT(DISTINCT lastIP) AS newsCount FROM accounts WHERE logged = 1')
									   -> first_row(); // Nombre d'IPs cos

		return $stats;
	}
	
   public function checkConnec($server,$port) // teste la connction d'un serveur, renvoi une bool
	{
	  $connec = @fsockopen($server,$port,$errno,$errstr,1);
			if(!$connec)
			   return false;
			fclose($connec);
			   return true;
			   
	}

}