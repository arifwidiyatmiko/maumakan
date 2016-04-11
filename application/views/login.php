<?php
include "header.php";
?>
<div class="container" id="banner" style="padding-bottom:10px;">
	<img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
	<div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0.9;">
		<h2><center>LOGIN atau DAFTAR</center></h2>
	</div>
</div>

<div class="container" id="content">
	<div class="col-sm-6" >
    <h3><i class="glyphicon glyphicon-pushpin"></i> Sudah punya akun ? Login </h3>
      <hr> 
    <!--<form class="form-horizontal">-->
    <?php echo form_open('login/login',['name'=>'form_login','class'=> 'form-horizontal','role'=>'form']);?>
  <div class="form-group">
    <label for="Email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="ingat" value="1"> Ingat Saya
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">Sign in</button>&nbsp;<a href="" style="color:grey;"> Lupa Password ?</a>
    </div>
  </div>

</form>
  </div>
  <div class="col-sm-6" style="border-left:3px solid grey;">
    <h3><i class="glyphicon glyphicon-flag"></i> Belum punya akun ? daftar </h3>
      <hr>
      <?php echo form_open('login/register',['name'=>'form_register','class'=> 'form-horizontal','role'=>'form']);?>
  <div class="form-group">
    <label for="Name" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="Email" name="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group form-horizontal">
    <label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="date" name="tgllahir" class="form-control">
     </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Nomor Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor Handphone" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="ConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="Cpassword" name="Cpassword" placeholder="Confirm Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="setuju" required> Setuju dengan <a href="">ketentuan yang berlaku</a>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>
  </div>
</form>
  </div>
</div>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
<?php
include "footer.php";
?>