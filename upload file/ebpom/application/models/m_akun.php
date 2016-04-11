<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Akun extends CI_Model {
		
		public function insert_akun($nama_perusahaan, $npwp, $no_api_apiu, $jenis_usaha, $no_izin_usaha, $tgl_izin_usaha, $alamat_perusahaan,
		$telpon_gudang, $username, $password)
		{
			$tahun 	= substr($tgl_izin_usaha,6,4);
			$bulan 	= substr(strrev(substr(strrev($tgl_izin_usaha),5,5)),3,2);
			$tgl     	= strrev(substr(strrev($tgl_izin_usaha),8,2));
			$tgl_lahir_konvert = $bulan."/".$tgl."/".$tahun;
			$t=date('Y/m/d',strtotime($tgl_lahir_konvert));
			$query = "insert into tbl_perusahaan 
					 (username, password, npwp, nama_perusahaan, no_api_apiu, jenis_usaha, no_izin_usaha, tgl_izin_usaha, alamat, no_telpon) 
					 values('$username','$password','$npwp','$nama_perusahaan','$no_api_apiu','$jenis_usaha','$no_izin_usaha','$t',
					 		'$alamat_perusahaan','$telpon_gudang');";
			$this->db->query($query);
		}
		
		public function login($username, $password)
		{
			$query = "select username from tbl_perusahaan where username = '$username' and password = '$password';";
			return $this->db->query($query);
		}
		public function cek_username($username)
		{
			$query = "select username from tbl_perusahaan where username = '$username';";
			return $this->db->query($query);
		}
		public function cek_admin($username,$password)
		{
			$query = "select * from tbl_admin where username = '$username' and password='$password';";
			return $this->db->query($query);
		}
	}
