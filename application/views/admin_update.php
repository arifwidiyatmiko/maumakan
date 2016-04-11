<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  $proses = $_GET['p'];
  switch($proses){
    default : 
?>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama Restoran</th>
      <th>Alamat</th>
      <th>Telp</th>
      <th>Uploader</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
        $query = $this->resto_m->lihatresto();
        foreach($query->result() as $row) : 
      ?>
      <td><?php echo $row->id_resto?></td>
      <td><?php echo $row->nama?></td>
      <td><?php echo $row->alamat?></td>
      <td><?php echo $row->telp?></td>
      <td>Admin 1</td>
      <?php
        if($row->status != 0){
          $k = "<td><a href='?p=edit&u=".$row->id_resto."'><i class='glyphicon glyphicon-briefcase'></i></a></td>";
        }
        else{
          $k = null;
      ?>
      <td><a href="?p=edit&u=<?php echo $row->id_resto; ?>"><i class="glyphicon glyphicon-briefcase"></i></a> | <a href="<?php echo site_url(); ?>Administrator/verifikasi/?u=<?php echo $row->id_resto; ?>"><i class="glyphicon glyphicon-check"></i></a></td>
      <?php } 
        echo $k;
      ?>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php 
  break;
  case "edit" :
  $id = $_GET['u'];
      $query = $this->resto_m->resto_byid($id);
      foreach($query->result() as $row) : 
      //$this->Restoran_m->lihatresto();
      //foreach($restoran as $row) : 
?>
  <form class="form-horizontal"  action="<?php echo site_url(); ?>Administrator/editresto" method="POST"><br/>
    <div class="form-group">
      <label class="control-label">Nama Restoran</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="nama" value="<?php echo $row->nama; ?>" required>
      </div>
    </div>
  <div class="form-group">
      <label class="control-label">Alamat</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat; ?>" required>
      </div>
    </div>
  <div class="col-xs-6">
  <div class="form-group">
      <label class="control-label">Kategori</label>
      <div class="col-sm-12">
        <select class="form-control" name="id_kategori">
        <?php
       
          switch ($row->id_kategori){
             case 'rcs':
        ?>
            <option value="rcs" selected>Restoran Cepat Saji</option>
            <option value="rk">Restoran Keluarga</option>
            <option value="kaf">Kafe</option>
            <option value="wkl">Warung Kaki Lima</option>
            <option value="tkm">Toko Kue & Minuman</option>
        <?php
            break;
            case 'rk':
        ?>
            <option value="rcs">Restoran Cepat Saji</option>
            <option value="rk" selected>Restoran Keluarga</option>
            <option value="kaf">Kafe</option>
            <option value="wkl">Warung Kaki Lima</option>
            <option value="tkm">Toko Kue & Minuman</option>
        <?php
              break;
              case 'kaf':
         ?>
            <option value="rcs">Restoran Cepat Saji</option>
            <option value="rk">Restoran Keluarga</option>
            <option value="kaf" selected>Kafe</option>
            <option value="wkl">Warung Kaki Lima</option>
            <option value="tkm">Toko Kue & Minuman</option>
        <?php
              break;
              case 'wkl':
         ?>
            <option value="rcs">Restoran Cepat Saji</option>
            <option value="rk">Restoran Keluarga</option>
            <option value="kaf">Kafe</option>
            <option value="wkl" selected>Warung Kaki Lima</option>
            <option value="tkm">Toko Kue & Minuman</option>
          <?php
              break;
              case 'tkm':
         ?>
            <option value="rcs">Restoran Cepat Saji</option>
            <option value="rk">Restoran Keluarga</option>
            <option value="kaf">Kafe</option>
            <option value="wkl">Warung Kaki Lima</option>
            <option value="tkm" selected>Toko Kue & Minuman</option>
        <?php
              break;
        }
        ?>
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
          <input type="text" class="form-control" name="telp" value="<?php echo $row->telp; ?>" required>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Harga</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" name="harga" value="<?php echo $row->harga; ?>" required>
        </div>
      </div>
    </div>
  <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Jam Buka</label>
        <div class="col-sm-12">
          <input type="time" class="form-control" name="jam_buka" value="<?php echo $row->jam_buka; ?>" required>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label class="control-label">Jam Tutup</label>
        <div class="col-sm-12">
          <input type="time" class="form-control" name="jam_tutup" value="<?php echo $row->jam_tutup; ?>" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label">Menu Makanan</label>
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="menu"  required><?php echo $row->menu; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <input type="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
  </form>
  <form method="POST" action="<?php echo base_url();?>Administrator/do_upload/<?php echo $row->id_resto;?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="ConfirmPassword" class="col-sm-2 control-label">Foto Restoran</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="foto" require>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <!--<button type="submit" class="btn btn-default">Upload</button>-->
      <input type="submit" value="Upload Image" name="submit" class="btn btn-default">
    </div>
  </div>
</form>
<?php
  endforeach;
  break;
  }
?>