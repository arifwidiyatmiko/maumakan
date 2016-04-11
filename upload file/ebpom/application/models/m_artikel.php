<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Artikel extends CI_Model {
		/*private $judul;
		private $isi;
		private $tgl_buat;
		private $nama_pembuat;
		private $gambar;*/
		
		public function get_header_artikel()
		{
			$query="select judul, gambar from tbl_artikel;";
			return $this->db->query($query);
		}
		
		public function get_full_artikel($judul)
		{
			$query = "select judul, isi, tgl_buat, nama_pembuat, gambar from tbl_artikel where judul = '$judul';";
			return $this->db->query($query);
		}
	}
