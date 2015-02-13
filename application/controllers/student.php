<?php

	class Student extends CI_Controller {

		function index() {
			$this->load->model('m_std') ;

			$record = $this->m_std->getStdList();
			$field = $this->m_std->getFieldName('Applicant') ;
			
			$data['record'] = $record;
			$data['field'] = $field ;

			$this->load->view('v_std', $data) ;
		}

		function detail() {
			$last = $this->uri->total_segments();
			$id = $this->uri->segment($last);

			$this->load->view('v_stdDetails');
		}

		function funding() {
			$this->load->model('m_std');
			$record = $this->m_std->getFundList();
			$field = $this->m_std->getFieldName('Fundlist_v');

			$data['record'] = $record;
			$data['field'] = $field;

			$this->load->view('v_funding', $data);



		}
	}



?>