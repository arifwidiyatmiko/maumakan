<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
		$this->load->view('header');
		$this->load->model('search_m');
		
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('search');
		$this->load->view('footer');
	}
	public function s_tipe($asd)
	{
		# code...
		$data['restoran'] = $this->search_m->tipe_s($asd);
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function s_makanan($asd)
	{
		# code...
		$data['restoran'] = $this->search_m->makanan_s($asd);
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function makan_pagi()
	{
		$data['restoran'] = $this->search_m->makan_pagi();
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function makan_siang()
	{
		$data['restoran'] = $this->search_m->makan_siang();
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function makan_malam()
	{
		$data['restoran'] = $this->search_m->makan_malam();
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function pesan_antar()
	{
		$data['restoran'] = $this->search_m->pesan_antar();
		if ($data) {
			# code...
			$this->load->view('search',$data);
		}
	}
	public function cariresto(){
		//$this->search_m->set_kueri($this->input->post('masukan'));
		$data['restoran'] = $this->search_m->pencarian_utama();
		if($data){
			$this->load->view('search',$data);
		}
		//redirect(site_url().'search');
	}
	
	public function carifilter(){
		$data['restoran'] = $this->search_m->pencarian_filter();
		if($data){
			$this->load->view('search',$data);
		}
	}
}
