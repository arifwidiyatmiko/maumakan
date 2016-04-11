<?php
error_reporting(E_ALL & ~E_NOTICE);
include "header_admin.php";
//$this->load->view('header_admin');
?>
<div class="container" id="banner">
	<img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
	<div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0;">
		<h2><center></center></h2>
	</div>
	<div class="col-sm-8">
  <?php 
    switch ($do) {
      default:
        
      break;
      case 'tambah':
        $this->load->view('admin_tambah');
		$stats = "Tambah Data";
        break;
      case 'update':
        $this->load->view('admin_update');
		$stats = "Update Data";
        break;
      case 'hapus':
        $this->load->view('admin_hapus');
		$stats = "Hapus Data";
        break;
      case 'admin':
        # code...
      ?>
        <div class="jumbotron" style="background:#f3f3f3">
			<h2><i class="glyphicon glyphicon-user"></i> Selamat datang di Administrator</h2>
		</div>
      <?php
      break;
    }
  ?>
    
  </div>
  <div class="col-sm-4">
  <ul class='breadcrumb'>
        <li><a href='dashboard.php'>Dashboard</a></li>
        <li class='active'><?php echo $stats;?></li>
      </ul>
    <h3><i class="glyphicon glyphicon-briefcase"></i> Dashboard </h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url();?>Administrator/dashboard/tambah"><i class="glyphicon glyphicon-plus"></i> Tambah Data Restoran</a></li>
        <li><a href="<?php echo base_url();?>Administrator/dashboard/update"><i class="glyphicon glyphicon-flash"></i> Update Data Restoran</a></li>
        <li><a href="<?php echo base_url();?>Administrator/dashboard/hapus"><i class="glyphicon glyphicon-minus"></i> Hapus  Data Restoran</a></li>
      </ul>
      
      <hr>
      <span style="text-align:right;">
        <a href="<?php echo base_url();?>Administrator/logout">Log Out</a>
      </span>
  </div>
</div>
<?php
$this->load->view('footer_admin');
?>