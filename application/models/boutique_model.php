<?php
class Boutique_model extends MY_Model
{
	public $table = 'item_db';
	
	public function listItems() // Liste des items boutiques
	 { 						
		return	$items = $this->db->query('SELECT ID,Type,Name,GfxId,Level,Statistiques,boutique FROM item_db WHERE boutique > 0 ORDER BY boutique DESC')
								  ->result();
	 }
	 
	public function listPersos($select,$id) // Liste des persos
	 {
		return $this->db->select($select)
							->from('personnages')
							->where('account',$id)
							->get()
							->result();
	 }
	 
	 public function checkExists($table,$champ,$valeur = null) // Vérifie l'existence d'une ligne
	  {
		if($table == 'personnages')
		 {
		   $count =	$this->db->where($champ,$valeur)
							 ->from($table)
							 ->count_all_results();
	     }
	   elseif($table == 'item_db')
	     {
			$count = $this->db->query('SELECT COUNT(*) AS count FROM item_db WHERE ID = ? AND boutique > 0', array($valeur) )
							  ->result_array(); 
			$count = $count[0]['count'];
		 }
		else
			$count = parent::count($champ,$valeur);
			
			if($count >= 1)
				return true;
			else
				return false;
	  }
	  
	public function searchItem($select,$id) // recherche les informations sur un item (lors de l'achat)
	 {
		return $this -> db -> select($select)
						   -> from($this->table)
						   -> where(array('ID' => $id))
						   -> get()
						   -> result_array();
	 }
	 
	public function giveItem($values) // Ajoute une live action
	 {
		return (bool) $this->db->set($values)
							   ->insert('live_action');
	 }
	 
	public function editPts($values,$id) // Update du nombre de pts d'un compte
	 {
		$this->db->set($values)
				 ->where('guid',$id)
				 ->update('accounts');
	 }
	 
	public function insertHistoric($options_echappees,$non_echappees)
	 {
			$this->db->set($options_echappees)
					 ->set($non_echappees, null, false)
					 ->insert('boutique_Historique');
	 }

}