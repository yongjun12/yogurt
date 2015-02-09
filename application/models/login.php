<?php

	class Login extends CI_Model {

		function validate( $username, $passwd ) {

			$this->db->from('user') ;
			$this->db->where('password', md5($passwd)) ;
			$this->db->where( 'username', $username ) ;

			$query = $this->db->get()->result() ;

			if( is_array($query) && count($query) == 1 ) {
				
				$this->session->set_userdata( 
					array('username' => $username,
						   'isLoggedIn' => true) );
				$this->session->sess_expiration = '2' ;

				return true;

			} else 
				return false;
		}

	}


?>