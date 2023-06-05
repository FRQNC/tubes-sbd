<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>study society</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- bootstrap -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/uniform/css/uniform.default.min.css');?>" />

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo base_url('assets/wow/animate.css');?>" />


<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url('assets/gallery/blueimp-gallery.min.css');?>">


<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">

</head>

<body id="home">

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('C_StudySociety/index');?>"><img src="<?php echo base_url('assets/logo.png'); ?>" style="width:50px;" alt="study society"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">   
        <li>
          <br>
          <br>
          <div>
          <form action="" method="get">
            <div>
              <input type="search" name="keyword" style="width: 360px;" placeholder="Keyword.." value="<?= html_escape($keyword) ?>" required maxlength="32" />
              <input type="submit" class="button button-primary" value="Cari">
            </div>
          </form>
        </div>
        </li>          
        <li><a href="<?php echo site_url('/');?>">HOME</a></li>            
        <li><a href="<?php echo site_url('C_StudySociety/home');?>">MATERI</a></li>        
        <li><a href="<?php echo site_url('C_StudySociety/login');?>">lOGIN</a></li>        
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->