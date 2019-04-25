<?php 
	/**
	 * 
	 */
	class LevelTwo_model extends CI_Model
	{
		
		public function get_leveltwo($id)
		{
			$this->db->where('levelone_id', $id);
			$query = $this->db->get('leveltwo');
			return $query->result_array();
		}

		public function create_leveltwo($id)
		{
			$this->db->where('levelone_id', $id);
			$count = $this->db->get('leveltwo')->num_rows();
			// Equity Data Array
			$data = array
			(
				'name'	=>	$this->input->post('name'),
				'levelone_id'	=>  $id,
				'leveltwo_id'	=>	$id.str_pad($count + '1', 3, '0', STR_PAD_LEFT)
			);

			// Insert Equity
			return $this->db->insert('leveltwo', $data);
		}

		// Check Equity exists
		public function check_leveltwo_exists($name)
		{
			$query = $this->db->get_where('leveltwo', array('name' => $name));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}

		public function get_leveltwo_title($id)
		{
			$query = $this->db->get_where('leveltwo', array('leveltwo_id' => $id));
			return $query->row();
		}
	}