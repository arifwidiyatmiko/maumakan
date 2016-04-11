<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Profil extends CI_Controller {
		public function index()
		{
			$this->load->view('v_header');
			$this->load->view('v_main_menu');
			$this->load->view('v_profil');
			$this->load->view('v_footer');
		}
}
