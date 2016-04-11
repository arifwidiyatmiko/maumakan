<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Daftarkan_Produk extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_akun');
			$this->load->model('m_pendaftaran');
		}
		public function index()
		{
			if($this->session->userdata('username') == "")
			{
				$this->load->view('v_header');
				$this->load->view('v_main_menu');
				$this->load->view('v_daftarkan_produk');
				$this->load->view('v_footer');
			}
			else 
				redirect(base_url().'index.php/c_daftarkan_produk/form_pendaftaran');
		}
		public function buat_akun()
		{
			$this->load->view('v_header');
			$this->load->view('v_main_menu');
			$this->load->view('v_buat_akun');
			$this->load->view('v_footer');
		}
		
		public function form_pendaftaran()
		{
			$this->load->view('v_header');
			$this->load->view('v_main_menu');
			$this->load->view('v_form_pendaftaran');
			$this->load->view('v_footer');
		}
		public function login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$query = $this->m_akun->login($username,$password);
			if ($query->num_rows()) {
				# code...
			$row = $query->row();
			$this->session->set_userdata('username',$row->username);
			redirect(base_url().'index.php/c_daftarkan_produk/form_pendaftaran');
			}
			else{
				redirect(base_url().'index.php/c_daftarkan_produk');
			}
		}
		public function keluar()
		{
			$this->session->sess_destroy();
			$this->session->userdata('username','');
			redirect(base_url().'index.php/c_daftarkan_produk');
		}
		public function validasi_buat_akun()
		{
			extract($_POST);
			if($nama_perusahaan!="" && $npwp!="" && $no_api_apiu!="" && $no_izin_usaha!="" && $tgl_izin_usaha!="" && $alamat_perusahaan!="" 
				&& $telpon_gudang!="" && $username!="" && $password!="")
			{
				$query = $this->m_akun->cek_username($username);
				if($query == "")
				{			
					$this->m_akun->insert_akun($nama_perusahaan,$npwp,$no_api_apiu,$jenis_usaha,$no_izin_usaha,$tgl_izin_usaha,$alamat_perusahaan,
					$telpon_gudang,$username,$password);
					redirect(base_url().'index.php/c_daftarkan_produk');
				}
				else
				{
					$this->load->view('v_header');
					$this->load->view('v_main_menu');
					$this->load->view('v_buat_akun');
					$this->load->view('v_footer');
				?>
                	<script language="javascript">
						window.alert('Ganti username, username telah digunakan');
					</script>
                <?php
				}
			}
			else
			{
				$this->load->view('v_header');
				$this->load->view('v_main_menu');
				$this->load->view('v_buat_akun');
				$this->load->view('v_footer');
				?>
                	<script language="javascript">
						window.alert('Masih terdapat field yang belum diisi');
					</script>
                <?php
			}
		}
		public function validasi_pendaftaran()
		{
			 extract($_POST);
			 if($nama_lengkap!="" && $jabatan!="" && $alamat!="" && $email!="" && $telpon!="" && $produk!="")
			 {
				 //Surat permohonan
				 	$filedata 	= addslashes(fread(fopen($_FILES['permohonan']['tmp_name'], 'r'), $_FILES['permohonan']['size']));
				 	$tipe 		= $_FILES['permohonan']['type'];
				 	$ukuran 	= $_FILES['permohonan']['size'];
				 	$nama	 	= $_FILES['permohonan']['name'];
				 	$this->m_pendaftaran->insert_permohonan($tipe,$filedata,$nama,$ukuran);
				 	$result = $this->m_pendaftaran->id_permohonan($tipe,$filedata,$nama,$ukuran);
				 	foreach($result->result() as $row)
				 	$permohonan = $row->id;
				 //surat pernyataan pertanggung jawaban
				 	$filedata 	= addslashes(fread(fopen($_FILES['pernyataan']['tmp_name'], 'r'), $_FILES['pernyataan']['size']));
				 	$tipe  	= $_FILES['pernyataan']['type'];
				 	$ukuran 	= $_FILES['pernyataan']['size'];
				 	$nama		= $_FILES['pernyataan']['name'];
				 	$this->m_pendaftaran->insert_jawaban($tipe,$filedata,$nama,$ukuran);
				 	$result = $this->m_pendaftaran->id_jawaban($tipe,$filedata,$nama,$ukuran);
				 	foreach($result->result() as $row)
				 	$pernyataan = $row->id;
				 //API
				 	$filedata	= addslashes(fread(fopen($_FILES['api']['tmp_name'], 'r'), $_FILES['api']['size']));
				 	$tipe  	= $_FILES['api']['type'];
				 	$ukuran 	= $_FILES['api']['size'];
				 	$nama		= $_FILES['api']['name'];
				  	$this->m_pendaftaran->insert_api($tipe,$filedata,$nama,$ukuran);
				 	$result = $this->m_pendaftaran->id_api($tipe,$filedata,$nama,$ukuran);
				 	foreach($result->result() as $row)
				 	$api = $row->id;
				 //SIUP
				 	$filedata	= addslashes(fread(fopen($_FILES['siup']['tmp_name'], 'r'), $_FILES['siup']['size']));
				 	$tipe  	= $_FILES['siup']['type'];
				 	$ukuran 	= $_FILES['siup']['size'];
				 	$nama		= $_FILES['siup']['name'];
				  	$this->m_pendaftaran->insert_siup($tipe,$filedata,$nama,$ukuran);
				 	$result = $this->m_pendaftaran->id_siup($tipe,$filedata,$nama,$ukuran);
				 	foreach($result->result() as $row)
				 	$siup = $row->id;
				 //NPWP
				 	$filedata	= addslashes(fread(fopen($_FILES['npwp']['tmp_name'], 'r'), $_FILES['npwp']['size']));
				 	$tipe		= $_FILES['npwp']['type'];
				 	$ukuran	= $_FILES['npwp']['size'];
				 	$nama		= $_FILES['npwp']['name'];
				  	$this->m_pendaftaran->insert_npwp($tipe,$filedata,$nama,$ukuran);
				 	$result = $this->m_pendaftaran->id_npwp($tipe,$filedata,$nama,$ukuran);
				 	foreach($result->result() as $row)
				 	$npwp = $row->id;
				 //cek file upload
					if($permohonan!="" && $pernyataan!="" && $api!="" && $siup!="" && $npwp!="")
					{
			 			$username = $this->session->userdata('username');
			 			$this->m_pendaftaran->insert_pendaftaran($username,$nama_lengkap,$jabatan,$alamat,$email,$telpon,$produk,$permohonan,
						$pernyataan,$api,$siup,$npwp);
						redirect(base_url().'index.php/c_daftarkan_produk');
					}
					else
			 		{
			 			$this->load->view('v_header');
						$this->load->view('v_main_menu');
						$this->load->view('v_form_pendaftaran');
						$this->load->view('v_footer');
						?>
                			<script language="javascript">
							window.alert('Masih terdapat field yang kosong');
							</script>
                		<?php
			 		}
			 }
			 else
			 {
			 	$this->load->view('v_header');
				$this->load->view('v_main_menu');
				$this->load->view('v_form_pendaftaran');
				$this->load->view('v_footer');
				?>
                	<script language="javascript">
						window.alert('Masih terdapat field yang kosong');
					</script>
               	<?php
			 }
		}
}
