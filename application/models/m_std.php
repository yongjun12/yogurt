<?php

	class M_Std extends CI_Model{

		function getStdBasic() {
			$this->db->from('Applicant') ;
			$result = $this->db->get()->result() ;

			/** $result is an two-dimensional array **/ 
			return $result ;
		
		}

		function getFieldName() {
			return $this->db->list_fields('Applicant') ;
		}
	}



?>