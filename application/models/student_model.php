<?php

	class Student_model extends CI_Model{

		function get_row($table, $condition=null) {
			$this->db->from($table) ;
			if($condition) {
				foreach ($condition as $key => $value) {
					$this->db->where($key, $value);
				}
			}
			$result = $this->db->get()->result() ;

			/** $result is an two-dimensional array **/ 
			return $result ;
		}

		function get_field($table) {
			return $this->db->list_fields($table) ;
		}

		function update_info($table) {
			$key = $this->input->post('name');
			$value = $this->input->post('value');
			$vnumber = $this->input->post('pk');

			// print $key . $value	. $vnumber;
			$data = array($key => $value);

			$this->db->where('VNumber', $vnumber);
			$this->db->update($table, $data);

			return true;

		}
	}



?>