<?php if( !defined('BASEPATH') ) exit('No direct script access allowed');


	function verify_session() {
		$ci = & get_instance() ;
		$isLoggedIn = $ci->session->userdata('isLoggedIn');
		if ( $isLoggedIn == True )  {
			 return true;
		} else {
			redirect('login');
			return false;
		}
		
	}



?>