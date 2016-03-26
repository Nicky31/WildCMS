<?php

class Staff_model extends MY_Model
{
	protected $table = 'staff';
	
   public function listStaff($select = '*', $where = array())
	{
		return $this->db->select($select)
							->from($this->table)
							->where($where)
							->get()
							->result();
	}

}