<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Login_Admin extends CI_Controller {
	
		public function __construct() 
		{
			parent::__construct();
			$this->load->model('m_akun');
		}
		
		public function index()
		{
			$this->load->view('v_header');
			$this->load->view('v_login_admin');
		}
		public function masuk()
		{
			extract($_POST);
			$result = $this->m_akun->cek_admin($username,$password);
			if($result->num_rows()>0)
			{
				redirect(base_url().'index.php/c_m_artikel');
			}
			else
			{
				redirect(base_url().'index.php/c_login_admin');
			}	
		}
}
