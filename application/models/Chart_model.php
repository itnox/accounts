<?php 
	/**
	 * 
	 */
	class Chart_model extends CI_Model
	{
		
		public function get_chart()
		{
			$query = $this->db->get('chart');
			return $query->result_array();
		}

		public function get_chart_name($chart_id)
		{
			$this->db->select('name');
			$query = $this->db->get('chart');
			return $query->result_array();
		}

		public function get_chart_title($id)
		{
			$query = $this->db->get_where('chart', array('chart_id' => $id));
			return $query->row();
		}

		public function get_master_title($id)
		{
			$this->db->like('chart_id', substr($id,0,1));
			$query = $this->db->get('chart');
			return $query->row();
		}


	}