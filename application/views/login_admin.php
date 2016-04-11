<?php
$this->load->view('header_admin');
?>
<div class="container" id="banner">
	<img src="<?php echo base_url();?>assets/img/restaurant.jpeg" class="header-image" style="float:left;">
	<div class="" style="opacity:60%;float:left;width:500px;margin-left:5%;margin-top:-130px;height:100px;background-color:white;opacity:0;">
		<h2><center></center></h2>
	</div>
</div>
<div class="container" id="content">
	<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="glyphicon glyphicon-log-in"></i> Form Login Administrator
        </h3>
      </div>
      <div class="panel-body">
        <!--<form method="post" role="form" action="<?php //echo site_url();?>pengguna/login" id="form_login">-->
        
        <?php //echo validation_erros(); ?>
        <?php echo form_open('Administrator/login',['name'=>'form_login','class'=> '','role'=>'form']);?>
          <div class="form-group">
            <label for="username" class="visible-lg visible-md">Username</label>
           <!-- <input type="text" class="form-control" name="userid" placeholder="username">-->
           <?php echo form_input(['class'=>'form-control','type'=>'text','name'=>'username','placeholder'=>'Username']);?>
          </div>
          <div class="form-group">
            <label for="password" class="visible-lg visible-md">Password</label>
            <!--<input type="password" class="form-control" name="passid" placeholder="password">-->
            <?php echo form_input(['class'=>'form-control','type'=>'password','name'=>'password','placeholder'=>'Password']);?>
          </div>

      </div>
      <div class="panel-footer">
        <?php echo form_submit(['type'=>'submit','value'=>'Masuk']);?>
        <?php echo form_close();?>
      </div>
    </div>
</div>
<?php
$this->load->view('footer_admin');
?>