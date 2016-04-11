<?php 
/**
* 
*/
class review_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public function input($asd)
	{
		$this->db->set('email',$this->session->userdata['email']);
		$this->db->set('id_resto',$asd);
		$this->db->set('isi',$this->input->post('review'));
		$this->db->set('tgl_review',date('Y/m/d'));
		$this->db->insert('review');
		# code...
	}
	public function lihat($asd)
	{
		# code...
		$this->db->where('id_resto',$asd);
		$this->db->join('member','member.email = review.email');
		$this->db->order_by('id_review','desc');
		$query = $this->db->get('review');
		return $query->result();
	}
	public function ulasan(){
		$this->db->join('restoran','restoran.id_resto = review.id_resto');
		$query = $this->db->get('review');
		return $query->num_rows();
	}
	public function ulasan_page($sampai,$dari){
		$this->db->join('restoran','restoran.id_resto = review.id_resto');
		$this->db->order_by('id_review','desc');
		$query = $this->db->get('review',$sampai,$dari);
		return $query->result();
	}
	
}
?>