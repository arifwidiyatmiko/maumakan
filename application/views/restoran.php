<?php
include "header.php";
?>
<div class="container" id="banner">
	<img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
	<div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0.9;">
		<?php 
  foreach ($restoran as $resto) {
    # code...
  switch ($resto->id_kategori) {
    case 'rcs':
      # code...
    $kategori = "Restoran Cepat Saji";
      break;
     case 'kaf':
      # code...
     $kategori = "Kafe";
      break;
     case 'rk':
      # code...
     $kategori = "Restoran keluarga";
      break;
     case 'wkl':
      # code...
     $kategori = "Warung Kaki Lima";
      break;
     case 'pa':
      # code...
     $kategori = "Pesan Antar";
      break;
     case 'tkm':
      # code...
     $kategori = "Toko Kue & Minuman";
      break;
    
    default:
      # code...
      break;
  }
?>
    <h2><center><?php echo $resto->nama?></center></h2>
	</div>
</div>
<div class="container" id="content">
	<div class="col-md-4"><br>
    <span>
      <?php foreach ($foto as $key) {?>
      <img style="width:90%;" src="<?php echo base_url();?>/assets/upload/<?php echo $key->gambar?>">
      <?php }?>
    </span><br/>
    Alamat : <br>
    <span><h4><?php echo $resto->alamat?></h4></span>
    Harga untuk Berdua : <br>
    <span><h4>Rp. <?php echo $resto->harga?></h4></span>
    Jenis Makanan : <br>
    <span><h4><?php echo $kategori?></h4></span>
    Menu Makanan : <br>
    <span><h4><?php echo $resto->menu?></h4></span>
    
    <a href="<?php echo base_url();?>Restoran/eksporpdf/<?php echo $resto->id_resto;?>" class="btn btn-default" target="_blank" style="margin-top:80px">Export to PDF</a>
  </div>
  <?php  } ?>
	<div class="col-md-8">
	   <div class="row">
       <span><h3>Tulis Review mengenai restoran ini</h3></span>
     <form class="" method="POST" action="<?php echo base_url();?>review/input/<?php echo $resto->id_resto;?>">
       <textarea class="form-control" rows="5" name="review" placeholder="Silahkan tulis pengalaman pribadi Anda di restoran ini setidaknya sebanyak 140 karakter. Sebut juga didalam ulasan Anda apabila restoran ini mengundang dan mengharapkan ulasan pribadi dari Anda.."></textarea>
       <input type="submit" value="Kirim" style="margin-bottom:35px;"  class="btn btn-primary">
     </form>
     </div>
     <span><h3>Review </h3></span>
     <?php 
     foreach ($review as $ulasan) {
     ?>
     <div class="">
       <blockquote>
         <?php echo $ulasan->isi?>
         <span><h4>- <?php echo $ulasan->nama?></h4><h5>-<?php echo $ulasan->tgl_review?></h5></span>
       </blockquote>
     </div>
     <?php } ?>
	</div>
	
</div>
<?php
include "footer.php";
?>