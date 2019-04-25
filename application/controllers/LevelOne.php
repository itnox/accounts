<?php 
	/**
	 * 
	 */
	class LevelOne extends CI_Controller
	{

		public function index($id)
		{
			if ($this->session->userdata('logged_in') == true)
			{

				$data['title'] = $this->chart_model->get_chart_title($id);

				$data['result'] = $this->levelone_model->get_levelone($id);

				$this->load->view('templates/header');
				$this->load->view('levelone/index', $data);
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
				$page_title = $this->chart_model->get_chart_title($id)->name;
				$data['title'] = $page_title;
				$data['result'] = $this->levelone_model->get_levelone($id);

				$name = $this->input->post('name');
				$this->form_validation->set_rules('name', $name, 'required|callback_check_levelone_exists');

				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('callback_check_levelone_exists', "This <b>".$name."</b> is Already Added");
					$this->session->set_flashdata('required', "This <b>".$page_title."</b> is Requied");
					redirect('levelone/index/'.$id, $data, 'refresh');
				}
				else
				{
					
					$this->levelone_model->create_levelone($id);
					
					$name = $this->input->post('name');
					// Set Message
					$this->session->set_flashdata('levelone_added', "This <b>".$name."</b> is Added");

					redirect('levelone/index/'.$id, 'refresh');
				}	
			}
			else
			{
				redirect('users/login');
			}
		}

		// Check if Equity exists
		public function check_levelone_exists($name)
		{
			$this->form_validation->set_message('check_levelone_exists', "That <b>".$name."</b> is already Added");
			if ($this->levelone_model->check_levelone_exists($name))
			{
				return true;
			} else {
				return false;
			}
		}
	}