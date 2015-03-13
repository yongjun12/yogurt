<?php

	class Student extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('student_model');
			verify_session();
		}

		function index() {
			$this->get_list();
		}

		function get_list() {

			$row = $this->student_model->get_row('stnlist_v');
			$field = $this->student_model->get_field('stnlist_v');

			$data['record'] = $row;
			$data['field'] = $field;

			$this->load->view('student_list', $data);
		}

		function get_detail() {

			$last = $this->uri->total_segments();
			$vno = $this->uri->segment($last);

			$row = $this->student_model->get_row('student', array('VNumber'=>$vno));
			$field = $this->student_model->get_field('student');

			// foreach ($row[0] as $key => $value) {
			// 	$data[$key] = $value;
			// }
			// print_r($data);
			$data['row'] = $row[0];
			// $data['field'] = $field;
			$this->load->view('student_details', $data);

		}

		function edit_info() {
			// $key = $this->input->post('id');
			// $value = $this->input->post('data');
			// $vunmber = $this->input->post('id');

			// echo $key . $value . $vunmber ;
		
			$this->student_model->update_info('student');

		}
	}



?>