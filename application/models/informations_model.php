<?php

class Informations_model extends MY_Model
{

	public function rowsCount($table,$where = array()) 
		{
			return (int) $this->db->where($where)
									  ->from($table)
									  ->count_all_results();
		}

}