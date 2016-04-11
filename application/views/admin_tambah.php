
<form class="form-horizontal" action="<?php echo site_url(); ?>Administrator/tambahresto" method="POST"><br/>
    <div class="form-group">
      <label class="control-label">Nama Restoran</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="nama" placeholder="Nama Restoran" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label">Alamat</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="alamat" placeholder="Alamat Restoran" required>
      </div>
    </div>
	<div class="col-xs-6">
	<div class="form-group">
      <label class="control-label">Kategori</label>
      <div class="col-sm-12">
        <select class="form-control" name="id_kategori">
            <option value="rcs">Restoran Cepat Saji</option>
            <option value="rk">Restoran Keluarga</option>
            <option value="kaf">Kafe</option>
            <option value="wkl">Warung Kaki Lima</option>
            <option value="tkm">Toko Kue & Minuman</option>
          </select>
      </div>
    </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Kecamatan</label>
        <div class="col-sm-12">
          <select class="form-control" name="kecamatan">
            <option value="Bogor Barat">Bogor Barat</option>
            <option value="Bogor Selatan">Bogor Selatan</option>
			<option value="Bogor Tengah">Bogor Tengah</option>
			<option value="Bogor Timur">Bogor Timur</option>
			<option value="Bogor Utara">Bogor Utara</option>   
          </select>
        </div>
      </div>
    </div>
	<div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Telp</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="telp" placeholder="Telp" required>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Harga</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="harga" placeholder="Harga" required>
        </div>
      </div>
    </div>
	<div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Jam Buka</label>
        <div class="col-sm-12">
          <input type="time" class="form-control" name="jam_buka" placeholder="Jam Buka" required>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Jam Tutup</label>
        <div class="col-sm-12">
          <input type="time" class="form-control" name="jam_tutup" placeholder="Jam Tutup" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Menu Makanan</label>
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="menu" placeholder="Menu" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Foto Makanan</label>
      <div class="col-sm-12">
        <input type="file">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <input type="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
  </form>