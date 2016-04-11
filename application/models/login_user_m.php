<?php 
/**
* 
*/
class Login_user_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public function regis(){
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['nama'] = $this->input->post('nama');
		
		$data['tgl_lahir'] = $this->input->post('tgllahir');
		//$data['cpassword'] = $this->input->post('Cpassword');

		$data['no_hp'] = $this->input->post('nohp');
		$data['foto_profil'] = "1449645739.png";
		$this->db->insert('member',$data);
		//redirect('login','refresh');
		//$this->login_member();
	}
	public function login_member($email,$password){
		$this->db->where("email",$email);
		$this->db->where("password",$password);
		$query = $this->db->get("member");
		return $query->row_array();
	}
}
?>