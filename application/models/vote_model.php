<?php
class Vote_model extends MY_Model
{
protected $table = 'accounts';
	
	public function getInfos($select = '*',$where) // Récupère les infos a propos du compte
	 {
		return $this -> db -> select($select)
						   -> from($this->table)
						   -> where('guid',$where)
						   -> get()
						   -> result_array();	
	}
	
	public function infoMules($select = '*', $where) // requête pour liste des mules (vérification multi vote)
	 {
		return $this->db->select($select)
							->from($this->table)
							->where($where)
							->get()
							->result();
	 }
}