<?php
include "header.php";
?>
<div class="container" id="banner">
  <img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
  <div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0.9;">
      <h2><center>Edit Profile</center></h2>
  </div>
</div>
<div class="container" id="content">
	<div class="col-md-3">
    <h3><i class="glyphicon glyphicon-briefcase"></i> Dashboard </h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url();?>profile/edit/biodata"><i class="glyphicon glyphicon-flash"></i> Biodata</a></li>
        <li><a href="<?php echo base_url();?>profile/edit/keamanan"><i class="glyphicon glyphicon-plus"></i> Keamanan</a></li>
      </ul>
      
      <hr>
  </div>
  <div class="col-sm-9" style="margin-top:10px;">
    <ul class='breadcrumb'>
        <li><a href='dashboard.php'>Profile</a></li>
        <li class='active'>Edit</li>
        <li class='active'>Biodata</li>
      </ul>
    <hr>
   <?php 
    $i = 1;?>
    <?php foreach ($bio as $profil){

    ?>
    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>profile/update">
  <div class="form-group">
    <label for="Name" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Name" value="<?php echo $profil->nama;?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Email" class="col-sm-2 control-label">Nomer Handphone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hp" placeholder="Nomor Handphone" value="<?php echo $profil->no_hp;?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Password" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="tgllahir" value="<?php echo $profil->tgl_lahir;?>" placeholder="Tanggal Lahir">
    </div>
  </div>
  
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
<?php } ?>
<!-- INI FORM NYA-->
<form method="POST" action="<?php echo base_url();?>profile/do_upload" enctype="multipart/form-data">
  <div class="form-group">
    <label for="ConfirmPassword" class="col-sm-2 control-label">Ganti Foto Akun</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="foto" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <!--<button type="submit" class="btn btn-default">Upload</button>-->
      <input type="submit" value="Upload Image" name="submit" class="btn btn-default">
    </div>
  </div>
</form>
  </div>
</div>
<?php
include "footer.php";
?>