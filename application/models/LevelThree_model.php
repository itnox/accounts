<?php 
	/**
	 * 
	 */
	class LevelThree_model extends CI_Model
	{
		
		public function get_levelthree($id)
		{
			$this->db->where('leveltwo_id', $id);
			$query = $this->db->get('levelthree');
			return $query->result_array();
		}

		public function create_levelthree($id)
		{
			$this->db->where('leveltwo_id', $id);
			$count = $this->db->get('levelthree')->num_rows();
			// Equity Data Array
			$data = array
			(
				'name'	=>	$this->input->post('name'),
				'leveltwo_id'	=>  $id,
				'levelthree_id'	=>	$id.str_pad($count + '1', 3, '0', STR_PAD_LEFT)
			);

			// Insert Equity
			return $this->db->insert('levelthree', $data);
		}

		// Check Equity exists
		public function check_levelthree_exists($name)
		{
			$query = $this->db->get_where('levelthree', array('name' => $name));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
	}