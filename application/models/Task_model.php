<?php

	class Task_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_projects_by_client($id){
			$this->db->join( 'Projects', 'projects.id = Clients_projects.project_id');
			$query = $this->db->get_where( 'Clients_projects', array( 'client_id' => $id));
			return $query->result_array();
		}

		public function get_tasks(){
			$client_id = $this->input->post('client');
			$project_id = $this->input->post('project');
			$from_date = $this->input->post('from_date');
			$to_date =  $this->input->post('to_date');

			$query = $this->db->get_where( 'Clients_projects', array( 'client_id' => $client_id, 'project_id' => $project_id));
			$client_project_id = $query->row()->id;

			$query = $this->db->get_where('Tasks', array('client_project_id' => $client_project_id, 'date >=' => $from_date, 'date <=' => $to_date));

			return $query->result_array();
		}
	}