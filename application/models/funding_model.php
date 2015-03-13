<?php

	class Funding_model extends CI_Model {

		private $table = "Funding";

		function get_row() {
			$this->db->from($this->table) ;
			$result = $this->db->get()->result() ;

			/** $result is an two-dimensional array **/ 
			return $result ;
		}

		function get_field() {
			return $this->db->list_fields($this->table) ;
		}
	}




?>





