<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Terintegrasi extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_produk');
		}
		public function index()
		{
			$this->load->view('v_header');
			$this->load->view('v_main_menu');
			$this->load->view('v_terintegrasi');
			$this->load->view('v_footer');
		}
}
