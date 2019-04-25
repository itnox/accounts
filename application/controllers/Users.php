<?php 
	/**
	 * 
	 */
	class Users extends CI_Controller
	{
		
		public function index()
		{
			$data['title'] = 'Users List';

			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function register()
		{
			if ($this->session->userdata('logged_in') == true)
			{

				$data['title'] = 'Register A new User';

				$this->form_validation->set_rules('firstName', 'First Name', 'required');
				$this->form_validation->set_rules('lastName', 'Last Name', 'required');
				$this->form_validation->set_rules('employeeCode', 'Employee Code', 'required');
				$this->form_validation->set_rules('username', 'User Name', 'required|callback_check_username_exists');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

				if ($this->form_validation->run() == FALSE)
				{
					//$this->load->view('templates/header');
					$this->load->view('users/register');
					//$this->load->view('templates/footer');
				}
				else
				{
					// Encrypt Password
					$enc_password = md5($this->input->post('password'));

					$this->user_model->register($enc_password);

					// Set Message
					$this->session->set_flashdata('user_registered', 'You are now registered and can login');

					redirect('users/login');
				}
			}
			else
			{
				redirect('users/login');
			}
		}

		// Login User
		public function login()
		{
			$data['title'] = 'Login';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('users/login', $data);
			}
			else
			{
				// Get username
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$user_id = $this->user_model->login($username, $password);

				if ($user_id)
				{
					// Create Session
					$user_data = array
					(
						'user_id'	=> $user_id,
						'username'	=> $username,
						'logged_in'	=> true
					);

					$this->session->set_userdata($user_data);

					$flashName = ucfirst($this->session->userdata('username'));
					// Set Message
					$this->session->set_flashdata('user_loggedin', 'Welcome <b>'.$flashName.'</b> You are now logged in');

					redirect('home');
				}
				else
				{
					// Set Message
					$this->session->set_flashdata('login_failed', 'Login is Invalid');

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout()
		{
			$test = ucfirst($this->session->userdata('username'));
			//Unset User Data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set Message
			$this->session->set_flashdata('user_loggedout', 'Good By <b>'.$test.'</b> Looking Forward to see you Again!');

			redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username)
		{
			$this->form_validation->set_message('check_username_exists', 'That username  is taken. Please choose a different one');
			if ($this->user_model->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
		}

		// Check if Email exists
		public function check_email_exists($email)
		{
			$this->form_validation->set_message('check_email_exists', 'That Email  is taken. Please choose a different one');
			if ($this->user_model->check_email_exists($email)) {
				return true;
			} else {
				return false;
			}
		}
	}