<?php

class Pages extends CI_Controller {

	function index () {

	  	if( $this->session->userdata('isLoggedIn') ) {
			$this->load->view('home') ;
		} else {
			//log_message('debug', 'message') ;
			$this->load->view('signin') ;
		}

 	}


	function userCheck() {

		/**** For refresh ****/
		if( $this->session->userdata('isLoggedIn') ) {
			$this->load->view('home') ;
			return ;
		}

		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->load->model('login') ;

		if( $this->login->validate($username, $password) ) {

			$this->index() ;
		} else if( $username != "" && $password != "" ){
			
			$data['error'] = "No such user or password is wrong" ;
			$this->load->view('signin', $data) ;
		} else {
			$this->load->view('signin') ;
		}
	
			
	}

	function logout() {

		$user_data = $this->session->all_userdata() ;
		foreach($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy() ;
	/*	print_r($this->session->all_userdata()) ;
		die() ;*/
		$this->load->view('signin') ;
	}
	

	
}

?>