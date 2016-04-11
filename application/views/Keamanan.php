<?php
include "header.php";
?>
<div class="container" id="banner">
  <img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
  <div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0.9;">
    <form class="form-inline" action="<?php echo base_url();;?>search/cariresto" method="POST" style="margin-left:5%;margin-top:4.9%;">
      <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
            <input type="text" class="form-control" name="kueri" style="width:300px;" placeholder="Ketik nama restoran atau jenis masakan">
          </div>&nbsp;&nbsp;
          <input type="submit" class="btn btn-danger" value="Cari">
    </form>
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
        <li class='active'>Keamanan</li>
      </ul>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>profile/pass">
  
  <div class="form-group" >
    <label for="Password" class="col-sm-2 control-label">Password Baru</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" placeholder="Password Baru">
    </div>
  </div>
  <div class="form-group">
    <label for="ConfirmPassword" class="col-sm-2 control-label">Konfirmasi Password Baru</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="cpass" placeholder="Konfirmasi Password Baru">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary" value="Ganti">
    </div>
  </div>
</form>

    <input class="btn btn-danger btn-sm" type="button" onclick="ConfirmDelete()" value="Hapus Akun"><span class="alert">(*Pastikan jika anda benar-benar ingin menghapus akun !!)</span>
  </div>
   <script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Yakinkah anda bahwa akan menghapus akun ini ? "))
                 location.href="<?php echo base_url();?>profile/hapus?>";
      }
  </script>
</div>
<?php
include "footer.php";
?>