<?php 
	/**
	 * 
	 */
	class User_model extends CI_Model
	{
		
		public function register($enc_password)
		{
			// User Data Array
			$data = array
			(
				'firstName'		=>	$this->input->post('firstName'),
				'lastName'		=>	$this->input->post('lastName'),
				'username'		=>	$this->input->post('username'),
				'employeeCode'	=>	$this->input->post('employeeCode'),
				'email'			=>	$this->input->post('email'),
				'password'		=>	$enc_password
			);

			// Insert User
			return $this->db->insert('users', $data);
		}

		// Login User
		public function login($username, $password)
		{
			// Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1)
			{
				return $result->row(0);
			}
			else
			{
				return false;
			}
		}


		// Check username exists
		public function check_username_exists($username)
		{
			$query = $this->db->get_where('users', array('username' => $username));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}

		// Check Email exists
		public function check_email_exists($email)
		{
			$query = $this->db->get_where('users', array('email' => $email));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
	}