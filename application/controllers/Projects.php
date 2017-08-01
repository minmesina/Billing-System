<?php
class Projects extends CI_Controller{
	public function index(){
		$data['projects'] = $this->project_model->get_projects();

		$this->load->view('templates/header');
		$this->load->view('projects/index', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->form_validation->set_rules('project_name', 'Project Name', 'required');
		$this->form_validation->set_rules('project_description', 'Project Description', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('projects/index');
			$this->load->view('templates/footer');
		} else {
			$this->project_model->create_project();
			// Set message
			$this->session->set_flashdata('client_created', 'Project has been created!');

			redirect( 'projects' );
		}
	}

	public function clients($id){
		$data['clients'] = $this->project_model->get_clients($id);
		echo json_encode($data['clients']);
	}
}