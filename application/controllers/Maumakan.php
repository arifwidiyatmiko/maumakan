<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maumakan extends CI_Controller {

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
	public function index()
	{

		$this->load->model('search_m');
		$this->load->model('review_m');

		$jumlah= $this->review_m->ulasan();
 
		$config['base_url'] = base_url().'index.php/maumakan/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 	

		$this->load->view('header');
		$dari = $this->uri->segment('3');
		$t = date('H:i:s') + '07:00:00';
        //echo $t ;
        if ($t <= '09:00:00') {
            $rekomendasi['resto'] = $this->search_m->rek_pagi();
        }elseif ($t >= '09:00:01' AND $t <= '16:59:00' ) {
            $rekomendasi['resto'] = $this->search_m->rek_siang();
        }else{
            $rekomendasi['resto'] = $this->search_m->rek_malam();
        }  
		
		$rekomendasi['review'] = $this->review_m->ulasan_page($config['per_page'],$dari);
		$this->pagination->initialize($config);
		if ($rekomendasi) {
			$this->load->view('index',$rekomendasi);
		}
		
		$this->load->view('footer');
		
	}
}
