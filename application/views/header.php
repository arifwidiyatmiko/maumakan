<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
	<title>MauMakan.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/zomato.jpg">
<meta name="description" content="">
<meta name="author" content="">
<!-- Custom CSS -->
<link href="<?php echo base_url();?>assets/css/one-page-wonder.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="<?php echo base_url();?>assets/img/zomato.jpg" class="navbar-brand">
      <a class="navbar-brand" href="<?php echo base_url();?>">MauMakan.com</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php 
          if ($this->session->userdata('email') != '') {
            # code...
            ?>
            <li><a href="<?php echo base_url();?>profile"><?php echo $this->session->userdata('email'); ?></a></li>
            <li><a href="<?php echo base_url();?>login/logout">Log Out</a></li>
            <?php
          }else
          {
            ?>
            <li><a href="<?php echo base_url();?>login">Masuk/ Daftar</a></li>
            <?php
          }
        ?>
        
      </ul>
    </div>
  </div>
</nav>
