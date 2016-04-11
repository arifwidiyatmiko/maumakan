<?php 
/**
* 
*/
class Login_admin_m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public function login($userid,$passid){
		$this->db->where("username",$userid);
		$this->db->where("password",$passid);
		$query = $this->db->get("admin");
		return $query->row_array();
	}
}
?>