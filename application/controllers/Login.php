<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('login_user_m');
		$this->load->helper('cookie');
	}
	public function index()
	{
		if ($this->session->userdata('email') == '') {
		$this->load->view('login');
		}else{
			redirect(base_url()."profile");
		}
	}
	public function register()
	{
		# code...

		$data['password'] = $this->input->post('password');
		$data['cpassword'] = $this->input->post('Cpassword');
		if ($data['password'] == $data['cpassword']) {
			# code...
			$this->login_user_m->regis();
			$this->login();
		}
		else
		{
			$this->load->view('login');
		}
		
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		delete_cookie("member");
		redirect(base_url().'login');
	}
	public function login()
	{
		$email= $this->input->post('email');
		$pass = $this->input->post('password');
		$data = $this->login_user_m->login_member($email,$pass);
		if (empty($data)) {
			# code...
			$this->load->view('login');
		}
		else
		{
			//$this->load->view('admin_tambah');
			$nama = $data['nama'];
			if($this->input->post('ingat') == 1){
				set_cookie("member",$email,14400);
			}
			echo $this->session->set_userdata('email',$email);
			echo $this->session->set_userdata('nama',$nama);
			redirect(base_url().'profile');
		}	
	}
}
