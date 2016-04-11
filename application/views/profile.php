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
	<div class="col-sm-4" style="margin-top:20px;border-right:solid 2px grey;"><center>
   <?php 
    $i = 1;?>
    <?php foreach ($bio as $profil){
    ?>
    <div id="photo-profile">
      <img src="<?php echo base_url(); ?>assets/upload/<?php echo $profil->foto_profil;?>" style="width:60%;max-width:100%;height:220px;display:block;border-radius:120px;" class="img-responsive">
    </div>&nbsp;
   
    <div id="bio" style="text-align:left;">
      <label><h4><?php echo $profil->nama;?></h4></label><br/>
      <blockquote>
        <div class="row">
          <label>Email :</label> <?php echo $profil->email;?>
        </div>
        <div class="row">
          <label>Tanggal Lahir :</label> <?php echo date("d-F-Y",strtotime($profil->tgl_lahir));?>
        </div>
      </blockquote>
      <div class="alert alert-info" role="alert">
        <a href="<?php echo base_url();?>profile/edit/biodata" class="alert-link">Edit Profile</a>
      </div>
    </div>
    </center>
  <?php } ?>
  </div>
  <div class="col-sm-8">
  <?php 
     foreach ($riwayat as $rwt) {
     ?>
    <label style="color:grey;text-align"><h2>Riwayat Review : <?php echo $rwt->a;?></h2></label>
    <?php
    } 
     foreach ($review as $ulasan) {
     ?>
     <div class="">
       <blockquote>
         <span><?php echo $ulasan->isi?></span>
         <span class="pull-right"><h4>- <?php echo $ulasan->nama?></h4></span><span><h5>-<?php echo $ulasan->tgl_review?></h5></span>
       </blockquote>
     </div>
     <?php } ?>
  </div>
</div>
<?php
include "footer.php";
?>