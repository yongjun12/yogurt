<?php

	class M_Std extends CI_Model{

		function getStdList() {
			$this->db->from('Applicant') ;
			$result = $this->db->get()->result() ;

			/** $result is an two-dimensional array **/ 
			return $result ;
		
		}

		function getFieldName($table) {
			return $this->db->list_fields($table) ;
		}

		function getFundList() {
			$this->db->from('fundlist_v');
			return $this->db->get()->result();
		}
	}



?>