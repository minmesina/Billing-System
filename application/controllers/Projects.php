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
			redirect( 'projects' );
		} else {
			$this->project_model->create_project();
			// Set message
			$this->session->set_flashdata('project_created', 'Project has been created!');

			redirect( 'projects' );
		}
	}

	public function clients($id){
		$data['clients'] = $this->project_model->get_clients($id);
		echo json_encode($data['clients']);
	}

	public function single_project($id){
		$data['single_project'] = $this->project_model->get_project($id);
		echo json_encode($data['single_project']);
	}

	public function update(){
		$this->form_validation->set_rules('project_id', 'Project ID', 'required');
		$this->form_validation->set_rules('project_name', 'Project Name', 'required');

		if($this->form_validation->run() === FALSE) {
			redirect('projects');
		}else{
			$this->project_model->update_project();
			// Set message
			$this->session->set_flashdata('update_project', 'Project details has been updated');

			redirect('projects');
		}
	}
}