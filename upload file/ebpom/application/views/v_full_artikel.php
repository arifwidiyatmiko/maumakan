<!-- Artikel -->
<!-- ====================================================================================================================================================================== -->
	<?php 
		$judul = $_GET['parameter'];
		$result = $this->m_artikel->get_full_artikel($judul);
	?>
    <div class="row">
    	<div class="col-md-1"></div>
        <div class="col-md-10" style="text-align:justify;">
        	<?php 
				foreach($result->result() as $row) :?>
                	<div class="page-header">
						<h1><?php echo $row->judul;?></h1>
    				</div>
                    <p><?php echo date('d/m/Y',strtotime($row->tgl_buat))." , ".$row->nama_pembuat;?></p>
                    <img src="<?php echo base_url().$row->gambar; ?>" style="width:300px;margin-right:20px;margin-bottom:20px;float:left;"/>
                    <?php echo $row->isi;?>
                                    
			<?php
            	endforeach;
			?>
        </div>
        <div class="col-md-1"></div>
    </div>
