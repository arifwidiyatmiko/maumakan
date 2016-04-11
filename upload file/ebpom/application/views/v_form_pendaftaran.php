<?php
	$nama_lengkap = $jabatan = $alamat = $email = $telpon = $permohonan = $pernyataan = $api = $siup = $npwp = $produk = "";
?>
<!-- CONTENT -->
<!-- ====================================================================================================================================================================== -->
    <div id="content" class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10" style="text-align:justify;">
        	<div class="page-header">
	        	<h1>Form Pendaftaran Produk</h1>
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
            	<form role="form" action="validasi_pendaftaran" enctype="multipart/form-data" method="post">
                	<div class="page-header">
               			<h3>Data Penanggung Jawab</h3>
            		</div>
                	<div class="form-group">
                    	<label for="nama_lengkap">Nama Lengkap*</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $nama_lengkap;?>">
                    </div>
                    <div class="form-group">
                    	<label for="jabatan">Jabatan*</label>
                        <input type="text" class="form-control" name="jabatan" value="<?php $jabatan;?>">
                    </div>
                    <div class="form-group">
                    	<label for="alamat">Alamat*</label>
                        <textarea class="form-control" rows="3" name="alamat"><?php echo $alamat;?></textarea>
                    </div>
                    <div class="form-group">
                    	<label for="email">E-mail*</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group">
                    	<label for="telpon">Nomor Telpon*</label>
                        <input type="text" class="form-control" name="telpon" value="<?php echo $telpon;?>">
                    </div>
                    <div class="page-header">
               			<h3>Dokumen Persyaratan</h3>
            		</div>
                    <strong>
                    	<p>*) Format yang diizinkan adalah *.pdf dan *.jpg (Maksimal 1 MB)</p>
                        <p>**) Harap meng-upload dokumen asli (Bukan fotocopy)</p>                    
                    </strong>
                    <br />
                    <div class="form-group">
                    	<label for="telpon">Nama Produk*</label>
                        <input type="text" class="form-control" name="produk" value="<?php echo $produk;?>">
                    </div>
                    <div class="form-group">
                    	<label>1. Surat Permohonan Yang Ditandatangani Oleh Direktur Atau Kuasa Direksi</label><br />
                        <div class="form-control" style="height:50px;">
                        	<input type="file" class="" id="satu" style="margin-left:20px;" name="permohonan">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label>2. Surat Pernyataan Penanggung Jawab</label><br />
                        <div class="form-control" style="height:50px;">
                        	<input type="file" class="" id="satu" style="margin-left:20px;" name="pernyataan">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label>3. Angka Pengenal Impor (API) / Angka Pengenal Impor Umum (APIU)</label><br />
                        <div class="form-control" style="height:50px;">
                        	<input type="file" class="" id="satu" style="margin-left:20px;" name="api">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label>4. Surat Izin Usaha Perdagangan (SIUP)</label><br />
                        <div class="form-control" style="height:50px;">
                        	<input type="file" class="" id="satu" style="margin-left:20px;" name="siup">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label>5. Nomor Pokok Wajib Pajak (NPWP)</label><br />
                        <div class="form-control" style="height:50px;">
                        	<input type="file" class="" id="satu" style="margin-left:20px;" name="npwp">
                    	</div>
                    </div>
                    <div style="margin-left:-15px;margin-bottom:30px;">
                    	<button type="submit" class="btn btn-default">Simpan</button>
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
