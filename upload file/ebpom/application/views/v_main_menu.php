<!-- MAIN MENU -->
<!-- ====================================================================================================================================================================== -->
    <div id="mainmenu" class="row">
    	<div class="bs-component">
              <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                      <li class="<?php if($this->uri->segment(1)=="") echo "active"; ?>" style="margin-left:150px;">
                      	<a href="<?php echo base_url();?>">Beranda<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="<?php if($this->uri->segment(1)=="c_profil") echo "active";?>">
					  	<?php echo anchor('c_profil','Profil')?>
                      </li>
                      <li class="dropdown 
					  	<?php 	if($this->uri->segment(1)=="c_terintegrasi" || $this->uri->segment(1)=="c_dibatalkan") 
								echo "active";
						?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        	Produk<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><?php echo anchor('c_terintegrasi','Terintegrasi')?></li>
                          <li><?php echo anchor('c_dibatalkan','Dibatalkan')?></li>
                        </ul>
                      </li>
                      <li class="<?php if($this->uri->segment(1)=="c_daftarkan_produk") echo "active"; ?>">
					  	<?php echo anchor('c_daftarkan_produk','Daftarkan Produk')?>
                      </li>
                      <li class="<?php if($this->uri->segment(1)=="c_petunjuk") echo "active"; ?>">
					  	<?php echo anchor('c_petunjuk','Petunjuk')?>
                      </li>
                      <li class="<?php if($this->uri->segment(1)=="c_kontak") echo "active";?>">
					  	<?php echo anchor('c_kontak','Kontak')?>
                      </li>
                      <li class="<?php if($this->uri->segment(1)=="c_masuk") echo "active";?>">
					  	<?php 
							if(($this->session->userdata('username')!=""))
								echo anchor('c_daftarkan_produk/keluar','Keluar');	
						?>
                      </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" style="margin-left:90px;">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cari Artikel">
                      </div>
                      <button type="submit" class="btn btn-default">Cari</button>
                    </form>
                  </div>
                </div>
              </nav>
            </div>
    </div>
