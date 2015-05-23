<?php

	class Login_model extends CI_Model {

		function validate() {

			$username = $this->input->post("username");
			$passwd = $this->input->post("password");

			$this->db->from('user') ;
			$this->db->where('password', md5($passwd)) ;
			$this->db->where( 'username', $username ) ;

			$query = $this->db->get()->result() ;

			if( is_array($query) && count($query) == 1 ) {
				
				$this->session->set_userdata( 
					array('username' => $username,
						   'isLoggedIn' => True,
						   'stn_detail_tabs' => 0,
						   'fund_detail_tabs' => 0));
				return True;

			} else 
				return False;
		}

	}


?>