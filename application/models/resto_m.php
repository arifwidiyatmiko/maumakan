<?php 
/**
* 
*/
class resto_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	private $nama;
		private $alamat;
		private $kecamatan;
		private $telp;
		private $harga;
		private $jam_buka;
		private $jam_tutup;
		private $menu;
		private $id_kategori;
		private $status;
		private $idr;
		
		public function set_nama($values){
			$this->nama = $values;
		}
		public function set_alamat($values,$values2){
			$this->alamat = $values.", ".$values2;
		}
		public function set_telp($values){
			$this->telp = $values;
		}
		public function set_harga($values){
			$this->harga = $values;
		}
		public function set_jb($values){
			$this->jam_buka = $values;
		}
		public function set_jt($values){
			$this->jam_tutup = $values;
		}
		public function set_menu($values){
			$this->menu = $values;
		}
		public function set_kategori($values){
			$this->id_kategori = $values;
		}
		public function set_status($values){
			$this->status = $values;
		}
		public function set_idr($values){
			$this->idr = $values;
		}
		
		public function get_nama(){
			return $this->nama;
		}
		public function get_alamat(){
			return $this->alamat;
		}
		public function get_telp(){
			return $this->telp;
		}
		public function get_harga(){
			return $this->harga;
		}
		public function get_jb(){
			return $this->jam_buka;
		}
		public function get_jt(){
			return $this->jam_tutup;
		}
		public function get_menu(){
			return $this->menu;
		}
		public function get_kategori(){
			return $this->id_kategori;
		}
		public function get_status(){
			return $this->status = 0;
		}
		public function get_idr(){
			return $this->idr;
		}
		
		public function lihatresto(){
			$sql = "SELECT * FROM restoran";
			return $this->db->query($sql);
		}
		public function lihat_baru(){
			$sql = "SELECT * FROM restoran ORDER BY id_resto DESC limit 1";
			return $this->db->query($sql);
		}
		public function resto_byid($value){
			$sql = "SELECT * FROM restoran as r INNER JOIN kategori as k on r.id_kategori=k.id_kategori WHERE r.id_resto='".$value."' AND alamat like '%%'";
			return $this->db->query($sql);
		}
		
		public function tambahrestoran(){
			$sql = "INSERT INTO restoran (id_resto,nama,alamat,telp,harga,jam_buka,jam_tutup,menu,id_kategori,status) VALUES('','".$this->input->post('nama')."','".$this->input->post('alamat')." ".$this->input->post('kecamatan')."','".$this->input->post('telp')."','".$this->input->post('harga')."','".$this->input->post('jam_buka')."','".$this->input->post('jam_tutup')."','".$this->input->post('menu')."','".$this->input->post('id_kategori')."','".$this->get_status()."')";
			return $this->db->query($sql);
		}
		public function rekomendasi($t)
		{
			$sql = "SELECT * FROM restoran WHERE jam_buka <= '$t:00:00' AND jam_tutup >= '$t:00:00' ORDER BY rand() LIMIT 1";
			echo $sql;die();
			//return $this->db->query($sql);
		}
		public function editrestoran(){
			$sql = "UPDATE restoran SET nama='".$this->input->post('nama')."',
			alamat='".$this->input->post('alamat')." ".$this->input->post('kecamatan')."',
			telp='".$this->input->post('telp')."',
			harga='".$this->input->post('harga')."',
			jam_buka='".$this->input->post('jam_buka')."',
			jam_tutup='".$this->input->post('jam_tutup')."',
			menu='".$this->input->post('menu')."',
			id_kategori='".$this->input->post('id_kategori')."' 
			WHERE id_resto='".$this->get_idr()."'";
			return $this->db->query($sql);
		}
		
		public function hapusresto(){
			$sql = "DELETE FROM restoran WHERE id_resto='".$this->get_idr()."'";
			return $this->db->query($sql);
		}
		
		public function verify(){
			$sql = "UPDATE restoran SET status='1' WHERE id_resto='".$this->get_idr()."'";
			return $this->db->query($sql);
		}

		public function foto($img,$resto)
	{
		# code...
		$this->db->set('gambar',$img);
		$this->db->set('id_resto',$resto);
		$this->db->insert('gambar');
	}

	public function lihat($asd){
		$this->db->where("id_resto",$asd);
		//$this->db->limit(0,1);
		$query = $this->db->get("restoran");
		return $query->result();
	}
	public function lihat_foto($asd){
		$this->db->where('id_resto',$asd);
		$query = $this->db->get('gambar');
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