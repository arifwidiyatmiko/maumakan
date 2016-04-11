<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Pendaftaran extends CI_Model {
		public function insert_pendaftaran($username,$nama_lengkap,$jabatan,$alamat,$email,$telpon,$produk,$permohonan,$pernyataan,$api,$siup,
		$npwp)
		{
			$query = "insert into tbl_pendaftaran
			values
			('','$username','$nama_lengkap','$jabatan','$alamat','$email','$telpon','$produk',$permohonan,$pernyataan,$api,$siup,$npwp,'');";
			$this->db->query($query);
		}
		//surat permohonan-----------------------------------------------------------------------------------------------------------------------
		public function insert_permohonan($tipe,$data,$nama,$ukuran)
		{
			$query = "insert into tbl_surat_permohonan values ('','$tipe','$data','$nama','$ukuran');";
			$this->db->query($query);
		}
		public function id_permohonan($tipe,$data,$nama,$ukuran)
		{
			$query = "select id from tbl_surat_permohonan where tipe_file = '$tipe' and nama_file = '$nama' and 
					 ukuran_file = $ukuran;";
			return $this->db->query($query);
		}
		//surat pernyataan pertanggung jawaban---------------------------------------------------------------------------------------------------
		public function insert_jawaban($tipe,$data,$nama,$ukuran)
		{
			$query = "insert into tbl_surat_pernyataan_tanggung_jawab values ('','$tipe','$data','$nama','$ukuran');";
			$this->db->query($query);
		}
		public function id_jawaban($tipe,$data,$nama,$ukuran)
		{
			$query = "select id from tbl_surat_pernyataan_tanggung_jawab where tipe_file = '$tipe' and nama_file = '$nama' 
					 and ukuran_file = $ukuran;";
			return $this->db->query($query);
		}
		//API------------------------------------------------------------------------------------------------------------------------------------
		public function insert_api($tipe,$data,$nama,$ukuran)
		{
			$query = "insert into tbl_api values ('','$tipe','$data','$nama','$ukuran');";
			$this->db->query($query);
		}
		public function id_api($tipe,$data,$nama,$ukuran)
		{
			$query = "select id from tbl_api where tipe_file = '$tipe' and nama_file = '$nama' 
					 and ukuran_file = $ukuran;";
			return $this->db->query($query);
		}
		//SIUP-----------------------------------------------------------------------------------------------------------------------------------
		public function insert_siup($tipe,$data,$nama,$ukuran)
		{
			$query = "insert into tbl_siup values ('','$tipe','$data','$nama','$ukuran');";
			$this->db->query($query);
		}
		public function id_siup($tipe,$data,$nama,$ukuran)
		{
			$query = "select id from tbl_siup where tipe_file = '$tipe' and nama_file = '$nama' 
					 and ukuran_file = $ukuran;";
			return $this->db->query($query);
		}
		//NPWP-----------------------------------------------------------------------------------------------------------------------------------
		public function insert_npwp($tipe,$data,$nama,$ukuran)
		{
			$query = "insert into tbl_npwp values ('','$tipe','$data','$nama','$ukuran');";
			$this->db->query($query);
		}
		public function id_npwp($tipe,$data,$nama,$ukuran)
		{
			$query = "select id from tbl_npwp where tipe_file = '$tipe' and nama_file = '$nama' 
					 and ukuran_file = $ukuran;";
			return $this->db->query($query);
		}
	}