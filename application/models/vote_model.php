<?php
class Vote_model extends MY_Model
{
protected $table = 'accounts';
	
	public function getInfos($select = '*',$where) // R�cup�re les infos a propos du compte
	 {
		return $this -> db -> select($select)
						   -> from($this->table)
						   -> where('guid',$where)
						   -> get()
						   -> result_array();	
	}
	
	public function infoMules($select = '*', $where) // requ�te pour liste des mules (v�rification multi vote)
	 {
		return $this->db->select($select)
							->from($this->table)
							->where($where)
							->get()
							->result();
	 }
}