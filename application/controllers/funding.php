<?php
	class Funding extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('funding_model');
			verify_session();
		}

		function index() {
			$this->get_list();
		}

		function get_list() {

			$row = $this->funding_model->get_row();
			$field = $this->funding_model->get_field();

			$data['record'] = $row;
			$data['field'] = $field;

			$this->load->view('funding_list', $data);
		}

		function get_detail() {

			$last = $this->uri->total_segments();
			$id = $this->uri->segment($last);

			$this->load->view('student_details');
		}
	}

?>


