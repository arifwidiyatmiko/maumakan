<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Pendaftaran extends CI_Model {
		public function insert_pendaftaran($username,$nama_lengkap,$jabatan,$alamat,$email,$telpon,$produk,$permohonan,$pernyataan,$api,$siup,
		$npwp)
		{
			$query = "insert into tbl_pendaftaran values
					('','$username','$nama_lengkap','$jabatan','$alamat','$email','$telpon','$produk',
					'$permohonan','$pernyataan','$api','$siup','$npwp','');";
			$this->db->query($query);
		}
		
		public function cek_ada_sudah_ada($username,$produk){
			$query = "select username from tbl_pendaftaran where username='$username' and nama_produk='$produk';";
			return $this->db->query($query);
		}
	}