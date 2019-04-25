<?php 
	/**
	 * 
	 */
	class LevelOne_model extends CI_Model
	{
		
		public function get_levelone($id)
		{
			$this->db->where('chart_id', $id);
			$query = $this->db->get('levelone');
			return $query->result_array();
		}

		public function create_levelone($id)
		{
			$this->db->where('chart_id', $id);
			$count = $this->db->get('levelone')->num_rows();
			// Equity Data Array
			$data = array
			(
				'name'	=>	$this->input->post('name'),
				'chart_id'	=>  $id,
				'levelone_id'	=>	$id.str_pad($count + '1', 2, '0', STR_PAD_LEFT)
			);

			// Insert Equity
			return $this->db->insert('levelone', $data);
		}

		// Check Equity exists
		public function check_levelone_exists($name)
		{
			$query = $this->db->get_where('levelone', array('name' => $name));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}

		public function get_chart_name($chart_id)
		{
			$this->db->select('name');
			$query = $this->db->get('chart');
			return $query->result_array();
		}

		public function get_levelone_title($id)
		{
			$query = $this->db->get_where('levelone', array('levelone_id' => $id));
			return $query->row();
		}
	}