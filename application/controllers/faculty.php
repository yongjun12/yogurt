<?php
	class Faculty extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('faculty_model');
			verify_session();
		}

		function index(){
			$this->get_list();
		}

		function get_list(){

			$row = $this->faculty_model->get_row();

			$data['record'] = $row;

			$this->load->view('faculty_list', $data);
		}

		function get_details() {

			$last = $this->uri->total_segments();
			$id = $this->uri->segment($last);
			
			$students = $this->faculty_model->get_supervised_students($id);
			$GSSP = $this->faculty_model->get_GSSP_given($id);

			$data['students'] = $students;
			$data['GSSP'] = $GSSP;

			$this->load->view('faculty_details', $data);

		}

	}