<?php
class Projects extends CI_Controller{
	public function index(){
		$data['projects'] = $this->project_model->get_projects();

		$this->load->view('templates/header');
		$this->load->view('projects/index', $data);
		$this->load->view('templates/footer');
	}

	public function create(){ //edit
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Project';

		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required');
		$this->form_validation->set_rules('mode_payment', 'Mode Payment', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('clients/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->client_model->create_client();

			// Set message
			$this->session->set_flashdata('client_created', 'Project has been created!');

			redirect( 'clients' );
		}
	}

	public function clients($id){
		$data['clients'] = $this->project_model->get_clients($id);
		echo json_encode($data['clients']);
	}
}