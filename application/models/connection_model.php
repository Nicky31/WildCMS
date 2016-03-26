<?php

class Connection_model extends MY_Model
{
		protected $table = 'accounts';
		
		public function getAccount($account)
		 {
				$sql = "SELECT * FROM accounts WHERE account = ?";
			return $this->db->query($sql, array($account));
		 }
}