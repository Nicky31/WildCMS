<?php

class Livreor_model extends MY_Model
{
	protected $table = 'guess_book';
	
	public function get_commentaires($nb, $debut = 0)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($debut) OR $debut < 0)
		{
			return false;
		}
		
		return $this->db->select('`id`, `pseudo`, `text`, DATE_FORMAT(`date`,\'%d/%m/%Y\') AS \'date\'', false)
				->from($this->table)
				->order_by('id', 'desc')
				->limit($nb, $debut)
				->get()
				->result();
	}
}
