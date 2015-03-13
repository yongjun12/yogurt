<?php

class Home extends CI_Controller {

	function __construct() {
		parent::__construct() ;
		print "call verify sesion";
		verify_session();
	}
	
	function index () {

		$this->load->view('home_page');

 	}

	function logout() {

		$user_data = $this->session->all_userdata() ;
		
		foreach($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy() ;
		redirect('login');

	}
	

	
}

?>