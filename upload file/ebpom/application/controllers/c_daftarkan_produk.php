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
			$file_permohonan = $tmp_permohonan = $size_permohonan = $tipe_permohonan = "";
			$file_pernyataan = $tmp_pernyataan = $size_pernyataan = $tipe_pernyataan = "";
			$file_api 		 = $tmp_api		   = $size_api		  = $tipe_api		 = "";
			$file_siup		 = $tmp_siup	   = $size_siup		  = $tipe_siup		 = "";
			$file_npwp		 = $tmp_npwp	   = $size_npwp		  = $tipe_npwp		 = "";  
			extract($_POST);
			//permohonan
				$file_permohonan = $_FILES["permohonan"]["name"];    
				$tmp_permohonan = $_FILES["permohonan"]["tmp_name"];    
				$size_permohonan = $_FILES["permohonan"]["size"];    
				$tipe_permohonan = $_FILES["permohonan"]["type"];
			//pernyataan
				$file_pernyataan = $_FILES["pernyataan"]["name"];    
				$tmp_pernyataan = $_FILES["pernyataan"]["tmp_name"];    
				$size_pernyataan = $_FILES["pernyataan"]["size"];    
				$tipe_pernyataan = $_FILES["pernyataan"]["type"];
			//api
				$file_api = $_FILES["api"]["name"];    
				$tmp_api = $_FILES["api"]["tmp_name"];    
				$size_api = $_FILES["api"]["size"];    
				$tipe_api = $_FILES["api"]["type"];
			//siup
				$file_siup = $_FILES["siup"]["name"];    
				$tmp_siup = $_FILES["siup"]["tmp_name"];    
				$size_siup = $_FILES["siup"]["size"];    
				$tipe_siup = $_FILES["siup"]["type"];
			//npwp
				$file_npwp = $_FILES["npwp"]["name"];    
				$tmp_npwp = $_FILES["npwp"]["tmp_name"];    
				$size_npwp = $_FILES["npwp"]["size"];    
				$tipe_npwp = $_FILES["npwp"]["type"];
			if($nama_lengkap!="" && $jabatan!="" && $alamat!="" && $email!="" && $telpon!="" && $produk!="" && $file_permohonan!="" && 
				$file_pernyataan!="" && $file_api!="" && $file_siup!="" && $file_npwp!="")
			{
				$error=0;
				//set direktori upload
				$dir_upload = "C:/xampp/htdocs/ebpom/assets/upload_image/";
				$permohonan_upload = $dir_upload . basename($file_permohonan);
				$pernyataan_upload = $dir_upload . basename($file_pernyataan);
				$api_upload        = $dir_upload . basename($file_api);
				$siup_upload       = $dir_upload . basename($file_siup);
				$npwp_upload       = $dir_upload . basename($file_npwp);
				$pesan1=$pesan2=$pesan3="";
				//cek file sudah ada atau belum
				if( file_exists($permohonan_upload) || file_exists($pernyataan_upload) || file_exists($api_upload) ||
					file_exists($siup_upload) || file_exists($npwp_upload))    
				{    
					 $error=1;$pesan1="file yang diupload sudah ada, ";   
				}  
				$max_size_upload=10000000000; 
				//cek size file upload
				if( $size_permohonan > $max_size_upload || $size_pernyataan > $max_size_upload || $size_api > $max_size_upload ||
					$size_siup > $max_size_upload || $size_npwp > $max_size_upload)    
				{        
					 $error=1;$pesan2="ukuran file upload melebihi ketentuan, ";  
				}  
				//cek tile file upload
				if( (($tipe_permohonan!="image/jpeg") && ($tipe_permohonan!="application/")) && 
					(($tipe_pernyataan!="image/jpeg") && ($tipe_pernyataan!="application/")) && 
					(($tipe_api!="image/jpeg")        && ($tipe_api!="application/")) && 
					(($tipe_siup!="image/jpeg")       && ($tipe_siup!="application/")) && 
					(($tipe_npwp!="image/jpeg")       && ($tipe_npwp!="application/")))    
				{    
     				$error=1;$pesan3="tipe file yang diupload tidak sesuai"; 
				}  
				if($error==0)
				{
					$username = $this->session->userdata('username');
					$result = $this->m_pendaftaran->cek_ada_sudah_ada($username,$produk);
				 	if($result->num_rows()>0)
					{
						$this->load->view('v_header');
						$this->load->view('v_main_menu');
						$this->load->view('v_form_pendaftaran');
						$this->load->view('v_footer');
						?>
                			<script language="javascript">
							window.alert('Sudah terdapat nama produk yaang sama');
							</script>
                		<?php
					}
					else
					{
						$this->m_pendaftaran->insert_pendaftaran($username,$nama_lengkap,$jabatan,$alamat,$email,$telpon,$produk,
						$file_permohonan,$file_pernyataan,$file_api,$file_siup,$file_npwp);
						move_uploaded_file($tmp_permohonan,$permohonan_upload);
						move_uploaded_file($tmp_pernyataan,$pernyataan_upload);
						move_uploaded_file($tmp_api,$api_upload);
						move_uploaded_file($tmp_siup,$siup_upload);
						move_uploaded_file($tmp_npwp,$npwp_upload);
						$this->load->view('v_header');
						$this->load->view('v_main_menu');
						$this->load->view('v_form_pendaftaran');
						$this->load->view('v_footer');
						?>
                			<script language="javascript">
							window.alert('Data berhasil disimpan');
							</script>
                		<?php
						
					}
				}
				elseif($error==1)
				{
					$this->load->view('v_header');
					$this->load->view('v_main_menu');
					$this->load->view('v_form_pendaftaran');
					$this->load->view('v_footer');
					?>
                		<script language="javascript">
						window.alert('File yang diaupload tidak sesuai ketentuan, '<?php echo $pesan1.$pesan2.$pesan3;?>);
						</script>
                	<?php
				}			}
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
