<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('profile_m');
	}
	public function index()
	{
		if ($this->session->userdata('email') == '') {
			redirect(base_url()."login");
		}else{
			$data['bio'] = $this->profile_m->biodata($this->session->userdata('email'));
			$data['review'] = $this->profile_m->review($this->session->userdata('email'));
			$data['riwayat'] = $this->profile_m->riwayat($this->session->userdata('email'));
			if ($data) {
				# code...
				$this->load->view('profile',$data);
			}
				
		};
	}
	public function do_upload()
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
       		$this->profile_m->foto($file_gambar);
       		redirect('profile/index','refersh');
        }
	public function update()
	{

		$nama = $this->input->post('nama');
		$hp = $this->input->post('hp');
		$tgllahir = $this->input->post('tgllahir');
		//$foto = $this->input->post('foto');
		//echo $nama;
		//$this->uploaddo_upload('foto');
		$this->profile_m->update($nama,$hp,$tgllahir);
	}
	public function pass()
	{
		//$pass1 = $this->input->post('pass');
		//$pass2 = $this->input->post('cpass');
		if ($this->input->post('pass') != $this->input->post('cpass')) {
			$this->load->view('keamanan');
		}else
		{
			$this->profile_m->update_password($this->input->post('pass'));
		}
	}
	public function hapus()
	{
		# code...

		$this->profile_m->hapus_member();

	}
	public function edit($param)
	{
		if ($param == 'biodata') {
			$data['bio'] = $this->profile_m->biodata($this->session->userdata('email'));
			if ($data) {
				# code...
				$this->load->view('editProfile',$data);
			}
		}
		elseif ($param == 'keamanan') {
			# code...
			$this->load->view('Keamanan');
		}
		else{
			$this->load->view('error_404');
		}
	}
}
