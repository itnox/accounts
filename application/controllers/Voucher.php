<?php 
	/**
	 * 
	 */
	class Voucher extends CI_Controller
	{
		
		public function index($id)
		{
			$data['title'] = "Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/index', $data);
			$this->load->view('templates/footer');
		}

		public function jv($id)
		{
			$data['title'] = "Journal Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/jv', $data);
			$this->load->view('templates/footer');
		}

		public function crv($id)
		{
			$data['title'] = "Journal Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/crv', $data);
			$this->load->view('templates/footer');
		}

		public function cpv($id)
		{
			$data['title'] = "Cash Payment Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/cpv', $data);
			$this->load->view('templates/footer');
		}

		public function brv($id)
		{
			$data['title'] = "Bank Receipt Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/brv', $data);
			$this->load->view('templates/footer');
		}

		public function bpv($id)
		{
			$data['title'] = "Bank Payment Voucher";

			$data['result'] = $this->voucher_model->get_chart($id);

			$this->load->view('templates/header');
			$this->load->view('voucher/bpv', $data);
			$this->load->view('templates/footer');
		}
	}