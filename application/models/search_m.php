<?php 
/**
* 
*/
class search_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	
	public function tipe_s($asd){
		$this->db->where("id_kategori",$asd);
		//$this->db->limit(0,1);
		$query = $this->db->get("restoran");
		return $query->result();
	}
	public function makanan_s($asd){
		$sql = "SELECT * FROM restoran WHERE menu LIKE '%".$asd."%' ";
		//$this->db->limit(0,1);
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function set_kueri($value){
			$this->kueri = $value;
		}
		
	public function get_kueri(){
		return $this->kueri;
	}
		
	public function makan_pagi()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '08:00:00' AND status = '1' ORDER BY rand() ";
			$query = $this->db->query($sql);
			return $query->result();
		}
	public function makan_siang()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '13:00:00' AND status = '1' ORDER BY rand()";
			$query = $this->db->query($sql);
			return $query->result();
		}
	public function makan_malam()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '17:00:00' AND status = '1' ORDER BY rand()";
			$query = $this->db->query($sql);
			return $query->result();
		}	
	public function rek_pagi()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '08:00:00' AND status = '1' ORDER BY rand() LIMIT 1";
			$query = $this->db->query($sql);
			return $query->result();
		}
	public function rek_siang()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '13:00:00' AND status = '1' ORDER BY rand() LIMIT 1";
			$query = $this->db->query($sql);
			return $query->result();
		}
	public function rek_malam()
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '17:00:00' AND status = '1' ORDER BY rand() LIMIT 1";
			$query = $this->db->query($sql);
			return $query->result();
		}	
	public function pesan_antar()
		{
			$sql = "SELECT * FROM restoran WHERE id_kategori = 'rcs' AND status = '1' ORDER BY rand()";
			$query = $this->db->query($sql);
			return $query->result();
		}
	public function pencarian_utama(){
		$sql = "SELECT * FROM restoran WHERE menu like'%".$this->input->post('kueri')."%' OR nama like'%".$this->input->post('kueri')."%' AND status = '1'";
		$query = $this->db->query($sql);
		//$query = $this->db->get("restoran");
		return $query->result();
	}
	public function pencarian_filter(){
		$sql = "SELECT r.*,k.kategori FROM restoran as r INNER JOIN kategori as k on r.id_kategori = k.id_kategori 
			WHERE r.menu like '%".$this->input->post('kueri')."%' AND r.harga <= ".$this->input->post('harga')." 
			AND r.alamat like '%".$this->input->post('area')."%' AND r.id_kategori = '".$this->input->post('id_kategori')."'
			AND r.jam_buka <= '".$this->input->post('waktu')."' AND r.status='1' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function update_password($pass)
	{
		# code...
		$this->db->set('password',$pass);
		$this->db->where('email',$this->session->userdata['email']);
		$this->db->update('member');
		redirect('profile/index','refersh');
	}
	
}
?>