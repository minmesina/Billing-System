<?php
	class Clients extends CI_Controller{
		public function index(){
			$data['clients'] = $this->client_model->get_clients();
			$data['currencies'] = $this->client_model->get_currencies();

			$this->load->view('templates/header');
			$this->load->view('clients/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$this->form_validation->set_rules('client_id', 'Client ID', 'required');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'required');
			$this->form_validation->set_rules('currency', 'Currency', 'required');
			$this->form_validation->set_rules('mode_payment', 'Mode Payment', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('clients/index');
				$this->load->view('templates/footer');
			} else {
				$this->client_model->create_client();
				// Set message
				$this->session->set_flashdata('client_created', 'Client has been added!');

				redirect( 'clients' );
			}
		}

		public function single_client($id){
			$data['single_client'] = $this->client_model->get_client($id);
			echo json_encode($data['single_client']);
		}

		public function update(){
			$this->form_validation->set_rules('client_id', 'Client ID', 'required');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'required');
			$this->form_validation->set_rules('currency', 'Currency', 'required');
			$this->form_validation->set_rules('mode_payment', 'Mode Payment', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('clients/index');
				$this->load->view('templates/footer');
			}else{
				$this->client_model->update_client();
				// Set message
				$this->session->set_flashdata('update_client', 'Client info has been updated');

				redirect('clients');
			}
		}

		public function add_currency(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$this->form_validation->set_rules('abbr', 'Abbreviation', 'required');
			$this->form_validation->set_rules('acronym', 'Acronym', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('clients/index');
				$this->load->view('templates/footer');
			} else {
				$this->client_model->add_currency();
				// Set message
				$this->session->set_flashdata('currency_added', 'Currency has been created!');

				redirect( 'clients' );
			}
		}

		public function project($id){
			$data['project'] = $this->client_model->get_projects($id);
			echo json_encode($data['project']);
		}
	}