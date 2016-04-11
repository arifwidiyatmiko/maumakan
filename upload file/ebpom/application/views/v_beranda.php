<!-- CONTENT -->
<!-- ====================================================================================================================================================================== -->
    <div id="content" class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10" style="text-align:justify;">
        	<div class="page-header">
	        	<h1>Selamat Datang</h1>
    		</div>
            <p>Aplikasi e-BPOM adalah aplikasi untuk memfasilitasi layanan publik dalam proses perizinan Importasi Obat Jadi, Bahan Baku Obat, 
            	Bahan Baku dan Produk Obat Tradisional, Kosmetika, Produk Komplemen, Bahan Baku Pangan, Bahan Tambahan Pangan dan Produk Pangan 
                di lingkungan Badan Pengawas Obat dan Makanan Republik Indonesia. 
            </p>
        </div>
        <div class="col-md-1"></div>
    </div>
<!-- Artikel -->
<!-- ====================================================================================================================================================================== -->
	<div id="artikel">
    	<div class="row">
        	<div class="col-md-1"></div>
        	<div class="col-md-10">
            	<div class="page-header">
                	<h1>Artikel</h1>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
	<?php 
		$result = $this->m_artikel->get_header_artikel();
	?>
    	<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
    	<?php 
        	foreach($result->result() as $row) :?>
               <div class="col-md-2" style="text-align:center;">
    	        	<a href=""><img src="<?php echo $row->gambar;?>" class="img-circle" width="150" height="150" /></a>
        	    	<a href="<?php base_url();?>index.php/c_full_artikel?parameter=<?php echo $row->judul;?>"><h4><?php echo $row->judul; ?></h4></a>
                    <br />
        	    </div>
        <?php endforeach ?>
            </div>
            <div class="col-md-1"></div>
        </div> 
    </div>