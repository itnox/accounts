<?php 

	/**
	 * 
	 */
	class Voucher_model extends CI_Model
	{
		
		public function get_chart($id)
		{
			$this->db->order_by('name');
			$query = $this->db->get_where('levelthree', array('levelthree_id' => $id));
			return $query->result_array();
		}

		
	}