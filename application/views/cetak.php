		<?php
			foreach ($restoran as $resto) {
				# code...
				foreach ($foto as $f){
		?>
		<div align="center"><img src="<?php echo base_url();?>/assets/upload/<?php echo $f->gambar; }?>" style="width:280px;" />
		<h1><?php echo $resto->nama?></h1>
		<p>
		<b>Harga</b> : <i>Rp. <?php echo $resto->harga?> / 2 Orang</i><br>
		<b>Menu</b> : <i><?php echo $resto->menu?></i><br>
		<b>Alamat</b> : <i><?php echo $resto->alamat?>, <?php echo $resto->telp?></i><br>
		</p></div>
		<?php } ?>
		
