<?php
  if($kueri = null){
    $kueri= '';
  }
  extract($_POST);
?>  
<div class="container" id="banner">
	<img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
	<div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0.9;">
		<h2><center>Hasil Pencarian dari "<?php echo $kueri;?>"</center></h2>
	</div>
</div>
<div class="container" id="content">
	<div class="col-md-4">
		<h3><i class="glyphicon glyphicon-search"></i> Filter Pencarian </h3>
      <hr>
      <form method="POST" action="<?php echo base_url();?>search/carifilter">
        <div class="form-group">
          <label>Kata Kunci</label> :
          <input type="text" class="input-sm" name="kueri" placeholder="Menu Makanan" value="" required>  
        </div>
        <div class="form-group">
          <label>Harga untuk Berdua</label> :
          <input type="text" class="input-sm" name="harga" placeholder="Harga" value="" required>  
        </div>
        <div class="form-group">
          <label>Area </label> :
          <select class="form-control" name="area">
            <option value="Bogor Barat">Bogor Barat</option>
            <option value="Bogor Selatan">Bogor Selatan</option>
			<option value="Bogor Tengah">Bogor Tengah</option>
			<option value="Bogor Timur">Bogor Timur</option>
			<option value="Bogor Utara">Bogor Utara</option>  
          </select>
        </div>
        <div class="form-group">
          <label>Jenis Restoran</label>
          <div class="checkbox" required>
            <label>
            <input name="id_kategori" type="checkbox" value="wkl">Warung Kaki Lima<br/>
            <input name="id_kategori" type="checkbox" value="rk">Restoran Keluarga<br/>
            <input name="id_kategori" type="checkbox" value="kaf">Kafe<br/>
            <input name="id_kategori" type="checkbox" value="rcs">Restoran Cepat Saji<br/>
            <input name="id_kategori" type="checkbox" value="tkm">Toko Kue & Minuman<br/>
          </div>
        </div>
         <div class="form-group">
          <label>Waktu Makan</label>
          <div class="checkbox" required>
            <label>
            <input type="checkbox" name="waktu" value="07:00">Sarapan<br/>
            <input type="checkbox" name="waktu" value="12:00">Makan Siang<br/>
            <input type="checkbox" name="waktu" value="19:00">Makan Malam<br/>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Cari">
        </div>
      </form>
      <hr>
    </div>
	<div class="col-md-8">
	 	<hr>
    <?php 
        foreach ($restoran as $resto) {
  # code...
    ?>
      <div id="restoran" class="row">
        <div class="col-md-6">
          <label><h3><?php echo $resto->nama?></h3></label>
          <span><h4><?php echo $resto->alamat?></h4></span>
          <span><h4>Jenis Makanan : <?php echo $resto->menu?></h4></span>
          <span><h4>Harga 2 Orang : Rp. <?php echo $resto->harga?></h4></span><a href="<?php echo base_url();?>restoran/lihat/<?php echo $resto->id_resto?>" class="alert">Lihat Restoran</a>
        </div>
        <div class="col-md-6">
          <img src="<?php echo base_url();?>/assets/img/delivery.jpg"  class="img-thumbnail">
        </div>
      </div>
      <hr>
      <?php  } ?>
      <!--<div id="restoran" class="row">
        <div class="col-md-6">
          <label><h3>Dapur String</h3></label>
          <span><h4>Jl. Taman Ratu Indah No. 33, Red Ville, Bogor</h4></span>
          <span><h4>Jenis Makanan : Kue, Makanan Ringan</h4></span>
          <span><h4>Harga 2 Orang : Rp. 120.000</h4></span><a href="" class="alert">Lihat Restoran</a>
        </div>
        <div class="col-md-6">
          <img src="<?php echo base_url();?>/assets/img/breakfast.jpg"  class="img-thumbnail">
        </div>
      </div>-->
	</div>
</div>
<?php 

    $this->load->view('footer');
?>
