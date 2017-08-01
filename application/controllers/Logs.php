<?php
	class Logs extends CI_Controller{
		public function index($offset = 0){
			// Pagination Config
			$config['base_url'] = base_url() . 'logs/index/';
			$config['total_rows'] = $this->db->count_all('logs');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Logs';

			$data['logs'] = $this->log_model->get_logs(FALSE, $config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('logs/index', $data);
			$this->load->view('templates/footer');
		}
	}