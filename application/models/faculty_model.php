<?php
	class Faculty_model extends CI_Model {

		function get_row(){
			$this->db->from('Faculty');
			return $this->db->get()->result();
		}

		function get_supervised_students($id) {

			$sql = 'select first_name, last_name from student where supervisor = (
			select First_name from Faculty where VNumber = ' . $id . ')';
			$supervised_students = $this->db->query($sql)->result();
			return $supervised_students;

		}

		function get_GSSP_given($id) {
			// $sql = 'select * from funding_info where account_holder = (
			// select First_name from Faculty where VNumber = ' . $id . ')';

			$sql = '(select * from funding_info where holder_vnumber = ' . $id .') union 
			(select * from funding_info where account_holder = (
			select First_name from Faculty where VNumber = ' . $id . '))' ;

			return $this->db->query($sql)->result();
		}


	}