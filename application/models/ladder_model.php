<?php

class Ladder_model extends MY_Model
{
	protected $table = 'personnages';
	protected $tableVotes = 'accounts';
	protected $tableGuilds = 'guilds';
	
	public function listPersos($debut,$nbre)
	 {
	 $debut--;
	 
	    return	$this->db->query ("SELECT * FROM personnages ORDER BY xp DESC LIMIT ?,?", array($debut,$nbre))
						 ->result();
	 
	 }
	 
	public function listGuilds($debut,$nbre)
	 {
	 $debut--;
	 
	    return	$this->db->query ("SELECT * FROM guilds ORDER BY xp DESC LIMIT ?,?", array($debut,$nbre))
						 ->result();
	 
	 }
	
	public function listVoters($debut,$nbre)
	 {
	 $debut--;
	 
	    return	$this->db->query ("SELECT * FROM accounts WHERE vote >= 1 ORDER BY vote DESC LIMIT ?,?", array($debut,$nbre))
						 ->result();
	 
	 }
	 
	public function countGuilds($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
	{
			return (int) $this->db->where($champ, $valeur)
									  ->from($this->tableGuilds)
									  ->count_all_results();
	}
	
   public function countVotes($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
	{
			return (int) $this->db->where($champ, $valeur)
									  ->from($this->tableVotes)
									  ->count_all_results();
	}
}