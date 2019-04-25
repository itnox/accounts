<?php 
	/**
	 * 
	 */
	class LevelTwo extends CI_Controller
	{
		
		public function index($id)
		{
			if ($this->session->userdata('logged_in') == true)
			{

				$data['title'] = $this->levelone_model->get_levelone_title($id);
				$data['masterTitle'] = $this->chart_model->get_master_title($id);

				$data['result'] = $this->leveltwo_model->get_leveltwo($id);

				$this->load->view('templates/header');
				$this->load->view('leveltwo/index', $data);
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
				$page_title = $this->levelone_model->get_levelone_title($id);
				$data['title'] = $page_title;
				$data['result'] = $this->leveltwo_model->get_leveltwo($id);

				$name = $this->input->post('name');
				$this->form_validation->set_rules('name', $name, 'required|callback_check_leveltwo_exists');

				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('callback_check_leveltwo_exists', "This <b>".$name."</b> is Already Added");
					$this->session->set_flashdata('required', "This <b>".$page_title."</b> is Requied");
					redirect('leveltwo/index/'.$id, $data, 'refresh');
				}
				else
				{
					
					$this->leveltwo_model->create_leveltwo($id);
					
					$name = $this->input->post('name');
					// Set Message
					$this->session->set_flashdata('leveltwo_added', "This <b>".$name."</b> is Added");

					redirect('leveltwo/index/'.$id, 'refresh');
				}	
			}
			else
			{
				redirect('users/login');
			}
		}

		// Check if Equity exists
		public function check_leveltwo_exists($name)
		{
			$this->form_validation->set_message('check_leveltwo_exists', "That <b>".$name."</b> is already Added");
			if ($this->leveltwo_model->check_leveltwo_exists($name))
			{
				return true;
			} else {
				return false;
			}
		}
	}