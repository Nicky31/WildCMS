<?php

class Account_model extends MY_Model
{
	protected $table = 'accounts';
	
	public function searchAccount($id)
	 {
		return $this -> db -> select('*')
						   -> from($this->table)
						   -> where(array('guid' => $id))
						   -> get()
						   -> result_array();
	 }
	 


}