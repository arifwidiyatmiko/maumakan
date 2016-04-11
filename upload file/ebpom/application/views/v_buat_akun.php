<?php 
	//$kontak = "";
	$nama_perusahaan = $npwp = $no_api_apiu = $jenis_usaha = $no_izin_usaha = $tgl_izin_usaha = $alamat_perusahaan = $telpon_gudang = $username = 					    $password = "";	
?>
<!-- CONTENT -->
<!-- ====================================================================================================================================================================== -->
    <div id="content" class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10" style="text-align:justify;">
        	<div class="page-header">
	        	<h1>Form Buat Akun</h1>
            </div>
            <h3>Perhatikan :</h3>
            <ul type="disc">
            	<li>Harap isi data dengan benar sesuai dengan dokumen atau berkas resmi yang Anda miliki</li>
                <li>Data dengan tanda bintang (*) harus diisi</li>
            </ul>
        </div>           
       	<div class="col-md-1"></div>
    </div>
    <div id="content" class="row">
    	<div class="col-md-2"></div>
		<div class="col-md-8" style="text-align:justify;background-color:#00CC33;border-radius:15px;padding-left:50px;padding-right:50px;">
            <div class="form-horizontal" style="padding-left:20px;padding-right:20px;">
            	<?php extract($_POST);//echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
                <form method="post" action="validasi_buat_akun">
                	<div class="page-header">
               			<h3>Data Perusahaan</h3>
            		</div>
                	<div class="form-group">
                    	<label for="nama_perusahaan">Nama Perusahaan*</label>
                        <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $nama_perusahaan;?>">
                    </div>
                    <div class="form-group">
                    	<label for="npwp">NPWP*</label>
                        <input type="text" class="form-control" name="npwp" value="<?php echo $npwp;?>">
                    </div>
                    <div class="form-group">
                    	<label for="no_api_apiu">No. API/APIU*</label>
                        <input type="text" class="form-control" name="no_api_apiu" value="<?php echo $no_api_apiu;?>">
                    </div>
                    <div class="form-group">
                    	<label for="jenis_usaha">Jenis Usaha*</label>
                       	<select class="form-control" name="jenis_usaha">
    						<option value="pbf" <?php if($jenis_usaha =="pbf") echo "selected";?>>
                                PBF / Penyalur Badan Obat
                            </option>
    						<option value="farmasi" <?php if($jenis_usaha =="farmasi") echo "selected";?>>
                            	Industri Farmasi
                            </option>
    						<option value="usaha_lainnya" <?php if($jenis_usaha =="usaha_lainnya") echo "selected";?>>
                            	Usaha Lainnya
                            </option>
  						</select>
                    </div>
                    <div class="form-group">
                    	<label for="no_api_apiu">No. Izin Usaha*</label>
                        <input type="text" class="form-control" name="no_izin_usaha" value="<?php echo $no_izin_usaha;?>">
                    </div>
                    <div class="form-group">
                    	<label for="tgl_izin_usaha">Tanggal Izin Usaha (Contoh : 18/10/2010)*</label>
                        <input type="text" class="form-control" name="tgl_izin_usaha" value="<?php echo $tgl_izin_usaha;?>">
                    </div>
                    <div class="form-group">
                    	<label for="alamat_perusahaan">Alamat Perusahaan*</label>
                         <textarea class="form-control" rows="3" name="alamat_perusahaan"><?php echo $alamat_perusahaan;?></textarea>
                    </div>
                    <div class="form-group">
                    	<label for="telpon_gudang">Nomor Telpon Gudang</label>
                        <input type="text" class="form-control" name="telpon_gudang" value="<?php echo $telpon_gudang;?>">
                    </div>
                    <div class="page-header">
               			<h3>Username dan Password</h3>
            		</div>
                    <div class="form-group">
                    	<label for="username">Username*</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username;?>">
                    </div>
                    <div class="form-group">
                    	<label for="password">Password*</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $password;?>">
                    </div>
                    <div style="margin-left:-15px;margin-bottom:30px;">
                    	<button type="submit" class="btn btn-default">Buat Akun</button>
                    	<button type="reset" class="btn btn-default">Hapus Semua</button>
                	</div>
                </form>                
            </div>
        </div>           
       	<div class="col-md-2"></div>
    </div>
    <div class="row">
    	<div class="col-md-12" style="height:50px;"></div>
    </div>
