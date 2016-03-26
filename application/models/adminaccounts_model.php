<?php

class AdminAccounts_model extends MY_Model
{
	protected $table = 'accounts';
	protected $tablePersos = 'personnages';
	
	public function accountsCount($gmMax) // Nombre de comptes à lister pour la pagination
		{
			return (int)  $this->db->where('level <=', $gmMax)
								   ->from($this->table)
								   ->count_all_results();			
		}
		
	public function listAccounts($gmlevel,$debut,$nbre) // Liste des compets à lister
	 {
	 $debut--;
	 
	    return	$this->db->query ("SELECT * FROM accounts WHERE level <= ? ORDER BY account LIMIT ?,?", array($gmlevel,$debut,$nbre))
						 ->result();
	 
	 }
	 
	 public function searchAccounts($select = '*', $where = array()) // Rechercher des comptes
	  {
		 return $this->db->select($select)
						 ->from($this->table)
						 ->where($where)
						 ->get()
						 ->result();
	  }
	  
	  public function readArray($id) // Récupère les infos sur un compte pour method displayAccount, renvoi un array
	 {
		return $this -> db -> select('*')
						   -> from($this->table)
						   -> where(array('guid' => $id))
						   -> get()
						   -> result_array();
	 }
	 
	 public function deletePersos($where) // Supprime des persos
	{
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}
		
		return (bool) $this->db->where($where)
								   ->delete($this->tablePersos);
	}
	
	public function persosCount($where) // Nombre de comptes à lister pour la pagination
		{
			return (int)  $this->db->where('account', $where)
								   ->from($this->tablePersos)
								   ->count_all_results();			
		}

}