<?php
class Project_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_projects(){
		$this->db->order_by('project_name');
		$query = $this->db->get( 'projects' );
		return $query->result_array();
	}

	public function create_client(){ //edit
		$data = array(
			'company_name' => $this->input->post('company_name'),
			'location' => $this->input->post('location'),
			'contact_person' => $this->input->post('contact_person'),
			'email_address' => $this->input->post('email_address'),
			'mode_of_payment' => $this->input->post('mode_payment')
		);

		return $this->db->insert( 'Clients', $data);
	}

	public function get_clients($id){
		$this->db->join( 'Projects', 'projects.id = Clients_projects.project_id');
		$this->db->join( 'Clients', 'clients.id = Clients_projects.client_id');
		$query = $this->db->get_where( 'Clients_projects', array( 'project_id' => $id));
		return $query->result_array();
	}
}