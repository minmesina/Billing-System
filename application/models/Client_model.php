<?php
	class Client_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_clients(){
			$this->db->order_by('company_name');
			$query = $this->db->get_where( 'Clients', array( 'status' => 0));
			return $query->result_array();
		}

		public function get_currencies(){
			$this->db->order_by('abbr');
			$query = $this->db->get( 'currencies' );
			return $query->result_array();
		}

		public function add_currency(){
			$data = array(
				'abbr' => $this->input->post('abbr'),
				'acronym' => $this->input->post('acronym')
			);

			return $this->db->insert( 'Currencies', $data);
		}

		public function create_client(){
			$data = array(
				'company_name' => $this->input->post('company_name'),
				'location' => $this->input->post('location'),
				'contact_person' => $this->input->post('contact_person'),
				'email_address' => $this->input->post('email_address'),
				'currency_id' => $this->input->post('currency'),
				'mode_of_payment' => $this->input->post('mode_payment')
			);

			return $this->db->insert( 'Clients', $data);
		}

		public function get_client($id){
			$query = $this->db->get_where( 'Clients', array( 'id' => $id));
			return $query->row();
		}

		public function update_client(){
			$data = array(
				'company_name' => $this->input->post('company_name'),
				'location' => $this->input->post('location'),
				'contact_person' => $this->input->post('contact_person'),
				'email_address' => $this->input->post('email_address'),
				'currency_id' => $this->input->post('currency'),
				'mode_of_payment' => $this->input->post('mode_payment'),
				'status' => $this->input->post('status')
			);

			$this->db->where('id', $this->input->post('client_id'));
			return $this->db->update('Clients', $data);
		}

		public function get_projects($id){
			$this->db->join( 'Projects', 'projects.id = Clients_projects.project_id');
			$this->db->join( 'Clients', 'clients.id = Clients_projects.client_id');
			$query = $this->db->get_where( 'Clients_projects', array( 'client_id' => $id));
			return $query->result_array();
		}
	}