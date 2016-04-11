<!-- CONTENT -->
<!-- ====================================================================================================================================================================== -->
    <div id="content" class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10" style="text-align:justify;">
        	<div class="page-header">
	        	<h1>Daftarkan Produk</h1>
            </div>
            <h5 style="color:#FF0000;">*Anda harus masuk dalam aplikasi agar dapat mendaftarkan produk Anda</h5><br />
            <div class="col-md-6" style="text-align:right;padding-right:50px;">
            	<br  /><br  /><br  /><br  />
            	<h3>Belum Punya Akun ??</h3>
                <a class="btn btn-success btn-sm" 
                	href="<?php echo base_url();?>index.php/c_daftarkan_produk/buat_akun" style="text-decoration:none;color:#FFFFFF;">
                    Buat Akun
                </a>
            </div> 
            <div class="col-md-6" style="padding-left:50px;border-left:double;border-color:#CCCCCC;">
                <div class="form-horizontal">
                   	<h3 style="margin-left:-15px;">Masuk</h3>
                    <hr style="margin-left:-15px;width:510px;"/>   
                    <form role="form" method="post" action="c_daftarkan_produk/login">
						<div class="form-group">
    						<label for="username">Username:</label>
    						<input type="username" class="form-control" name="username" value="">
  						</div>
						<div class="form-group">
    						<label for="pwd">Password:</label>
    						<input type="password" class="form-control" name="password" value="">
  						</div>
  						<button type="submit" class="btn btn-success btn-md" style="margin-left:-15px;">Masuk</button>
					</form>         
                </div>
            </div>           
        </div>
       	<div class="col-md-1"></div>
    </div>
    <div class="row">
    	<div class="col-md-12" style="height:100px;"></div>
    </div>
