<?php

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		// verify_session();
		$this->load->model('login_model');
	}

	function index() {

		$this->load->view('login_form');

	}

	function validate(){
		if($this->login_model->validate()) {
			redirect('home');

		} else {
			
			$data['error'] = "No such user or password is wrong" ;
			$this->load->view("login_form", $data);
		}
	}
 }

?>