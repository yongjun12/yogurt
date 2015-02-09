<?php

	class Student extends CI_Controller {

		function index() {
			$this->load->model('m_std') ;

			$record = $this->m_std->getStdBasic();
			$field = $this->m_std->getFieldName() ;
			
			$data['record'] = $record;
			$data['field'] = $field ;

			$this->load->view('v_std', $data) ;
		}

		
	}



?>