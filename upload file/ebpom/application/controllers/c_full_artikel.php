<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Full_Artikel extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_artikel');
		}
		public function index()
		{
			$this->load->view('v_header');
			$this->load->view('v_main_menu');
			$this->load->view('v_full_artikel');
			$this->load->view('v_footer');
		}
}
