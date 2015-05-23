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
			$field = $this->funding_model->get_field("Funding");

			$data['record'] = $row;
			$data['field'] = $field;

			$this->load->view('funding_list', $data);
		}

		function get_details() {

			$existing_tab = $this->session->get_userdata('fund_detail_tabs') ;

			if($existing_tab > $this->config->item('fund_detail_tab_cnts')) {
				$data['error_msg'] = 'You have reach the maximum tab count.';
				$this->load->view('error', $data);
				return ;
			}
			$last = $this->uri->total_segments();
			$id = $this->uri->segment($last);

			$fund_arr = $this->funding_model->get_details($id);
			$field = $this->funding_model->get_field("Funding_info");
			$data['field'] = $field;
			$data['fund_arr'] = $fund_arr;
			$this->load->view('funding_details', $data);
		}

		function add_entry() {
			$this->funding_model->insert();
			$this->index();

		}

		function edit() {
			$this->funding_model->edit();
		}
	}

?>


