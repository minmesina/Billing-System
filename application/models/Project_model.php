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

	public function create_project(){
		$data = array(
			'project_name' => $this->input->post('project_name'),
			'description' => $this->input->post('project_description')
		);

		return $this->db->insert( 'Projects', $data);
	}

	public function get_clients($id){
		$this->db->join( 'Projects', 'projects.id = Clients_projects.project_id');
		$this->db->join( 'Clients', 'clients.id = Clients_projects.client_id');
		$query = $this->db->get_where( 'Clients_projects', array( 'project_id' => $id));
		return $query->result_array();
	}
}