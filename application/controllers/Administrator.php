<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	
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
		$this->load->model('resto_m');
	}
	public function index()
	{	
		if ($this->session->userdata('admin') == '') {
			$this->load->view('login_admin');
		}else{
				redirect('Administrator/dashboard/admin');
				
		};
	}
	
	public function logout()
	{
		$this->session->unset_userdata('admin');
		//delete_cookie("member");
		redirect(base_url().'Administrator');
	}
	
	public function login()
	{
		$this->load->model('login_admin_m');
		//$this->load->library('form_validation');
		//$this->form_validation->set_rules('userid','required|email');
		//$this->form_validation->set_rules('passid','min_length[5]','required');
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data = $this->login_admin_m->login($data['username'],$data['password']);
		if (empty($data)) {
			# code...
			redirect('Administrator/login');
		}
		else
		{
			$username = $data['username'];
			$this->session->set_userdata('admin',$username);
			$this->load->view('dashboard');
		}
		
	}
	
	
	
	public function tambahresto(){
		$data['restoran'] = $this->resto_m->tambahrestoran();
		if($data){
			//$this->load->view('tambah',$data);
			redirect(site_url().'Administrator/dashboard/tambah');
		}
		/*$this->resto_m->set_nama($this->input->post('nama'));
		$this->resto_m->set_kategori($this->input->post('id_kategori'));
		$this->resto_m->set_alamat($this->input->post('alamat','kecamatan'));
		$this->resto_m->set_telp($this->input->post('telp'));
		$this->resto_m->set_harga($this->input->post('harga'));
		$this->resto_m->set_jb($this->input->post('jam_buka'));
		$this->resto_m->set_jt($this->input->post('jam_tutup'));
		$this->resto_m->set_menu($this->input->post('menu'));
		$this->resto_m->set_status(0);
		
		$this->resto_m->tambahresto();
		redirect(site_url().'Administrator/dashboard/tambah');*/
	}
	
	public function editresto(){
		$id = $_GET['u'];
		$this->resto_m->set_idr($id);
		$data['restoran'] = $this->resto_m->editrestoran();
		if($data){
			redirect(site_url().'Administrator/dashboard/update');
		}
		/*$id = $_GET['u'];
		$this->resto_m->set_idr($id);
		$this->resto_m->set_nama($this->input->post('nama'));
		$this->resto_m->set_kategori($this->input->post('id_kategori'));
		$this->resto_m->set_alamat($this->input->post('alamat','kecamatan'));
		$this->resto_m->set_telp($this->input->post('telp'));
		$this->resto_m->set_harga($this->input->post('harga'));
		$this->resto_m->set_jb($this->input->post('jam_buka'));
		$this->resto_m->set_jt($this->input->post('jam_tutup'));
		$this->resto_m->set_menu($this->input->post('menu'));
		//$this->resto_m->set_status(0);
		
		$this->resto_m->editresto();
		redirect(site_url().'Administrator/dashboard/update');*/
	}
	
	public function hapusresto(){
		$id = $_GET['i'];
		$this->resto_m->set_idr($id);
		$this->resto_m->hapusresto();
		redirect(site_url().'Administrator/dashboard/hapus');
	}
	
	public function verifikasi(){
		$id = $_GET['u'];
		$this->resto_m->set_idr($id);
		$this->resto_m->verify();
		redirect(site_url().'Administrator/dashboard/update');
	}

	public function do_upload($id)
        {
       		extract($_POST);
       		$file_gambar = $temp_gambar = $tipe_gambar = $temp = $cek = "";
       		$temp = explode(".", $_FILES["foto"]['name']);
       		$file_gambar = round(microtime(true)) . '.' . end($temp);

       		$temp_gambar = $_FILES["foto"]["tmp_name"];
       		$tipe_gambar = $_FILES["foto"]["type"];
       		$dir_upload = "C:/xampp/htdocs/maumakan/assets/upload/";
       		$gambar_upload = $dir_upload . basename($file_gambar);
       		move_uploaded_file($temp_gambar, $gambar_upload);
       		//echo $file_gambar;
       		$this->resto_m->foto($file_gambar,$id);
       		redirect(site_url().'Administrator/dashboard/update','refresh');
        }
	
	/*public function tes(){
		$this->load->view('dashboard/tambah');
	}*/
	
	public function dashboard($param)
	{
			$data['do'] = $param;
		
		$this->load->view('dashboard',$data);
	}
}
