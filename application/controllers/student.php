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
			$reg = $this->student_model->get_row('registration', array('VNumber'=>$vno));
			$field = $this->student_model->get_field('student');
			
			/* remove VNumber on registration */
			$reg_arr = (array)$reg[0];
			unset($reg_arr['VNumber']);

			$data['basic'] = (array)$row[0];
			$data['registration'] =  $reg_arr;
			// $data['field'] = $field;
			$this->load->view('student_details', $data);

		}

		function edit_basic_info() {
		
			$this->student_model->update_info('student');

		}
		function edit_reg_info() {
		
			$this->student_model->update_info('registration');

		}
	}



?>