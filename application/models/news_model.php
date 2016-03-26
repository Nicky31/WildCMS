<?php

class News_model extends MY_Model
{
	protected $table = 'news';
	
	public function listNews($debut,$nbre)
	 {
	 $debut--;
	 
	    return	$this->db->query ("SELECT id,titre,text,auteur, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM news ORDER BY id DESC LIMIT ?,?", array($debut,$nbre))
						 ->result();
	 
	 }
	 
	public function searchNews($id)
	 {
		return $this -> db -> select('titre,text')
						   -> from($this->table)
						   -> where(array('id' => $id))
						   -> get()
						   -> result_array();
	 }
}