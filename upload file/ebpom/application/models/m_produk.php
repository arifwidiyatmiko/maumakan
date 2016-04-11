<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Produk extends CI_Model {
		
		public function get_produk_terintegrasi($status)
		{
			$query="select nomor_registrasi,nama_produk,nama_penanggung_jawab,nama_perusahaan from tbl_pendaftaran as a inner join tbl_perusahaan
			as b on a.username = b.username where a.status = '$status';";
			return $this->db->query($query);
		}
		
		public function get_nomor_registrasi($nomor_registrasi,$status)
		{
			$query="select nomor_registrasi,nama_produk,nama_penanggung_jawab,nama_perusahaan from tbl_pendaftaran as a inner join tbl_perusahaan
			as b on a.username = b.username where a.status = '$status' and a.nomor_registrasi = $nomor_registrasi;";
			return $this->db->query($query);
		}
		
		public function get_nama_produk($nama_produk,$status)
		{
			$query="select nomor_registrasi,nama_produk,nama_penanggung_jawab,nama_perusahaan from tbl_pendaftaran as a inner join tbl_perusahaan
			as b on a.username = b.username where a.status = '$status' and a.nama_produk = '$nama_produk';";
			return $this->db->query($query);
		}
		
		public function get_penanggung_jawab($penanggung_jawab,$status)
		{
			$query="select nomor_registrasi,nama_produk,nama_penanggung_jawab,nama_perusahaan from tbl_pendaftaran as a inner join tbl_perusahaan
			as b on a.username = b.username where a.status = '$status' and a.nama_penanggung_jawab = '$penanggung_jawab';";
			return $this->db->query($query);
		} 
		
		public function get_nama_perusahaan($nama_perusahaan,$status)
		{
			$query="select nomor_registrasi,nama_produk,nama_penanggung_jawab,nama_perusahaan from tbl_pendaftaran as a inner join tbl_perusahaan
			as b on a.username = b.username where a.status = '$status' and b.nama_perusahaan = '$nama_perusahaan';";
			return $this->db->query($query);
		}

		
	}
