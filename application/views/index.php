
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
		<h3><i class="glyphicon glyphicon-search"></i> Pencarian Cepat </h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url();?>search/makan_pagi"><h4><img src="<?php echo base_url();?>assets/img/breakfast.jpg" style="width:24%"> Makan Pagi </h4></a></li>
        <li><a href="<?php echo base_url();?>search/makan_siang"><h4><img src="<?php echo base_url();?>assets/img/lunch.jpg" style="width:24%"> Makan Siang </h4></a></li>
        <li><a href="<?php echo base_url();?>search/makan_malam"><h4><img src="<?php echo base_url();?>assets/img/dinner.jpg" style="width:24%">  Makan Malam </h4></a></li>
        <li><a href="<?php echo base_url();?>search/pesan_antar"><h4><img src="<?php echo base_url();?>assets/img/delivery.jpg" style="width:24%">  Pesan Antar </h4></a></li>
      </ul>
      
      <hr>
      <h3><i class="glyphicon glyphicon-cutlery"></i>Jelajah Tipe Restoran</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url();?>search/s_tipe/wkl"> Warung Kaki Lima (28)</a></li>
        <li><a href="<?php echo base_url();?>search/s_tipe/rk"> Restoran Keluarga (15)</a></li>
        <li><a href="<?php echo base_url();?>search/s_tipe/rcs"> Restoran Cepat Saji (19)</a></li>
        <li><a href="<?php echo base_url();?>search/s_tipe/tkm"> Toko Kue $ Minuman (12)</a></li>
        <li><a href="<?php echo base_url();?>search/s_tipe/kaf"> Kafe (18)</a></li>
      </ul>
      
      <hr>
  </div>
	<div class="col-md-6">
		<div class="jumbotron">
    <label><h3>Selamat Datang di MauMakan.com</h3></label><br/>
      <span><center>Website ini adalah tempat dimana anda bisa mencari berbagai restoran dengan berbagai jenis menu makanan yang layak anda nikmati.
      Gunakan Kolom Search di bagian atas, atau konten disebelah kiri dan kanan untuk mencari restoran yang sesuai.</center></span>
    </div>
    <?php 
    foreach ($review as $rev) {

     ?>
    <div id="rev">
      <span><h2><?php echo $rev->nama;?></h2></span><br/>
      <span ><img  class="pull-right" src="<?php echo base_url();?>assets/img/breakfast.jpg" style="width:24%"></span><br/>
      <span><?php echo $rev->isi;?></span><br/>
      <span class="pull-right">- <address><i><?php echo $rev->email;?></i></address></span>
    </div><br/>
    <?php 
    }
    echo $this->pagination->create_links(); ?>
	</div>
	<div class="col-md-3">
    <?php 
    //date_default_timezone_set('GMT');
    if ($this->session->userdata('email') != '') {
      # code...
    
        $t = date('H:i:s') + '07:00:00';
        //echo $t ;
        if ($t <= '09:00:00') {
            $hari = "Pagi";
            $k = "makan_pagi";
        }elseif ($t >= '09:00:01' AND $t <= '16:59:00' ) {
            $hari = "Siang";
            $k = "makan_siang";
        }else{
            $hari = "Malam";
            $k = "makan_malam";
        }   
      ?>
        <h3><i class="glyphicon glyphicon-map-marker"></i> Sudah Makan <?php echo $hari; ?> belum ? </h3>
        <hr>
        <div><center>
          <img src="<?php echo base_url();?>assets/img/breakfast.jpg" style="width:60%;">
        </center>
        <?php foreach ($resto as $key) {
         ?>
        <label><h4><?php echo $key->nama; ?></h4></label><br/>
        <a href="<?php echo base_url();?>restoran/lihat/<?php echo $key->id_resto;?>">Klik Lebih Lanjut</a>
        <?php } ?>
      </div>

      <?php 

      } ?>
      
     
		
      <h3><i class="glyphicon glyphicon-apple"></i> Makanan Populer </h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url();?>search/s_makanan/chicken"><h4><img src="<?php echo base_url();?>assets/img/breakfast.jpg" style="width:24%"> Chicken </h4></a></li>
        <li><a href="<?php echo base_url();?>search/s_makanan/sate"><h4><img src="<?php echo base_url();?>assets/img/lunch.jpg" style="width:24%"> Sate </h4></a></li>
        <li><a href="<?php echo base_url();?>search/s_makanan/mie"><h4><img src="<?php echo base_url();?>assets/img/dinner.jpg" style="width:24%">  Mie </h4></a></li>
        <li><a href="<?php echo base_url();?>search/s_makanan/rendang"><h4><img src="<?php echo base_url();?>assets/img/delivery.jpg" style="width:24%">  Rendang </h4></a></li>
      </ul>
      
      <hr>
  </div>
</div>