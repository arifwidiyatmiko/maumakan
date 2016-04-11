<?php 
/**
* 
*/
class profile_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	
	public function biodata($email){
		$this->db->where("email",$email);
		//$this->db->limit(0,1);
		$query = $this->db->get("member");
		return $query->result();
	}
	public function review($email){
		$this->db->join('restoran','restoran.id_resto = review.id_resto');
		$this->db->where("email",$email);
		//$this->db->limit(0,1);

		$query = $this->db->get("review");
		return $query->result();
	}
	public function riwayat($email)
	{
		$sql = "SELECT COUNT('id_review') as  a FROM review WHERE email = '".$email."'";
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
	public function hapus_member()
	{
		# code...
		$this->db->where('email',$this->session->userdata['email']);
		$this->db->delete('member');
		delete_cookie("member");
		$this->session->unset_userdata('email');
		redirect('login/index','refersh');
	}
	public function foto($img)
	{
		# code...
		$this->db->set('foto_profil',$img);
		$this->db->where('email',$this->session->userdata['email']);
		$this->db->update('member');

	}
	public function update($nama,$hp,$tgllahir)
	{
		# code...
		//$data = array('email' => , );

		$this->db->set('no_hp',$hp);
		$this->db->set('nama',$nama);
		$this->db->set('tgl_lahir',$tgllahir);
		//$this->db->set('foto_profil',$foto);
		$this->db->where('email',$this->session->userdata['email']);
		$this->db->update('member');
		$this->session->userdata('email',$email);
		redirect('profile/index','refersh');
	}
}
?>