<?php
	class Tasks extends CI_Controller{
		public function index(){
			$data['clients'] = $this->client_model->get_clients();

			$this->load->view( 'templates/header' );
			$this->load->view( 'tasks/index', $data );
			$this->load->view( 'templates/footer' );
		}
		public function get_projects_by_client($id) {
			$data['projects'] = $this->task_model->get_projects_by_client($id);
			echo json_encode($data['projects']);
		}

		public function get_tasks() {
			$data['tasks'] = $this->task_model->get_tasks();
			echo json_encode($data['tasks']);
		}

	}