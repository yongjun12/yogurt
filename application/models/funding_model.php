<?php

	class Funding_model extends CI_Model {

		private $table = "Funding";

		function get_row() {
			$this->db->from($this->table) ;
			$result = $this->db->get()->result() ;

			/** $result is an two-dimensional array **/ 
			return $result ;
		}

		function get_field($t) {
			return $this->db->list_fields($t) ;
		}

		function get_details($id) {
			$this->db->from('Funding_info');
			$this->db->where('VNumber', $id);
			/** Except holder_vnumber column **/
			// return $this->db->query('select 
			// 							VNumber,
			// 							Funding_source,
			// 							Account_holder,
			// 							Title_of_scholarship,
			// 							Title_of_Award,
			// 							Start_date,
			// 							End_date,
			// 							Monthly_amount,
			// 							Fast_code from Funding_info');
			return $this->db->get()->result();
		}

		function insert() {
			$field = $this->get_field("Funding_info");
			$value = $this->input->post('newFunding');
			// Creates an array by using the values from $value and key from $field
			$new_record = array_combine( $field, $value);

			$this->db->insert('Funding_info', $new_record);
		}

		function edit() {
			$name = $this->input->post('name');
			$value = $this->input->post('value');
			$id = $this->input->post('pk');

			$this->db->from('Funding_info');
			$this->db->where('VNumber', $id);
			
		}
	}




?>





