<?php 
	/**
	 * 
	 */
	class LevelThree extends CI_Controller
	{
		
		public function index($id)
		{
			if ($this->session->userdata('logged_in') == true)
			{

				$data['title'] = $this->leveltwo_model->get_leveltwo_title($id);
				$data['masterTitle'] = $this->chart_model->get_master_title($id);

				$data['result'] = $this->levelthree_model->get_levelthree($id);

				$this->load->view('templates/header');
				$this->load->view('levelthree/index', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('users/login');
			}
		}

		public function add()
		{
			if ($this->session->userdata('logged_in') == true)
			{
				$id = $this->input->post('id');
				$page_title = $this->leveltwo_model->get_leveltwo_title($id);
				$data['title'] = $page_title;
				$data['result'] = $this->levelthree_model->get_levelthree($id);

				$name = $this->input->post('name');
				$this->form_validation->set_rules('name', $name, 'required|callback_check_levelthree_exists');

				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('callback_check_levelthree_exists', "This <b>".$name."</b> is Already Added");
					$this->session->set_flashdata('required', "This <b>".$page_title."</b> is Requied");
					redirect('levelthree/index/'.$id, $data, 'refresh');
				}
				else
				{
					
					$this->levelthree_model->create_levelthree($id);
					
					$name = $this->input->post('name');
					// Set Message
					$this->session->set_flashdata('levelthree_added', "This <b>".$name."</b> is Added");

					redirect('levelthree/index/'.$id, 'refresh');
				}	
			}
			else
			{
				redirect('users/login');
			}
		}

		// Check if Equity exists
		public function check_levelthree_exists($name)
		{
			$this->form_validation->set_message('check_levelthree_exists', "That <b>".$name."</b> is already Added");
			if ($this->levelthree_model->check_levelthree_exists($name))
			{
				return true;
			} else {
				return false;
			}
		}
	}