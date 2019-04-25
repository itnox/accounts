<?php 
	/**
	 * Chart Of Accounts
	 */
	class Chart extends CI_Controller
	{
		
		public function index()
		{
			if ($this->session->userdata('logged_in') == true)
			{
				$data['title'] = 'Chart Of Accounts';

				$data['result'] = $this->chart_model->get_chart();

				$this->load->view('templates/header');
				$this->load->view('chart/index', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('users/login');
			}
		}
	}