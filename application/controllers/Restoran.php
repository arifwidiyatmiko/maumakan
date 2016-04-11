<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran extends CI_Controller {

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
		$this->load->model('resto_m');
		$this->load->model('review_m');
	}
	public function index()
	{
		$this->load->view('restoran');
	}
	public function lihat($id)
	{
		$data['restoran'] = $this->resto_m->lihat($id);
		$data['review'] = $this->review_m->lihat($id);
		$data['foto'] = $this->resto_m->lihat_foto($id);
		if ($data) {
			# code...
			$this->load->view('restoran',$data);
		}
		
	}
	public function tambahresto(){
		if ($this->session->userdata('email') == '') {
			# code...
			redirect(base_url()."login");
		}else{
			$this->load->view('tambahrestoran');
			$data['restoran'] = $this->resto_m->tambahrestoran();
			if($data){
				redirect(site_url().'');
			}
		}
	}
	public function eksporpdf($id)
	{
		$data['restoran'] = $this->resto_m->lihat($id);
		$data['foto'] = $this->resto_m->lihat_foto($id);
		if ($data) {
			# code...
			//$this->load->view('restoran',$data);
			$this->load->library('tcpdf');
			$this->load->library('parser');
		
			$pdf = new tcpdf();
			$orientation = 'P';
			$format = 'A4';
			$keepmargins = false;
			$tocpage = false;
			$pdf->Addpage($orientation,$format,$keepmargins,$tocpage);
			$family = "helvetica";
			$style = "";
			$size="12";
			$pdf->SetFont($family,$style,$size);
		
			$html = $this->parser->parse('cetak',$data);
			$ln=true;
			$fill=false;
			$reset = false;
			$cell=false;
			$align='';
		
			$pdf->writeHTML($html,$ln,$fill,$reset,$align);
			$pdf->Output();
		
			$path = "./assets/pdf/datarestoran.pdf";
			$dest = "F";
			$pdf->Output($path,$dest);
		}
		

	}
}
