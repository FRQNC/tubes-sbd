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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
        <li> <br><br><form class="form-inline my-2 my-lg-0 ml-auto" role="search" method = "post" action="<?php echo site_url('C_StudySociety/navbarcari/');?>"">
          <input class="form-control mr-sm-2" type="search" id="cari" name="cari" placeholder="Search" aria-label="Search" autofocus autocomplete="off">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form></li>
          <li><a href="<?php echo site_url('/');?>">HOME</a></li>            
          <li><a href="<?php echo site_url('C_StudySociety/home');?>">MATERI</a></li>        
          <li><a href="<?php echo site_url('C_StudySociety/topic');?>">TOPIC</a></li>        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              GRADE
            </a>
            <ul class="dropdown-menu">
              <?php
              foreach ($grade as $g) { ?>
                  <li><a class="dropdown-item" href="<?php echo site_url('C_StudySociety/materigrade/').$g->grade_id;?>"><?= $g->grade_name ?></a></li>
                <?php
                }
                ?>
            </ul>
          </li>
          <?php if($this->session->is_logged_in){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url('assets/profile.webp'); ?>" style="width:50px;" alt="study society">
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo site_url('C_StudySociety/V_addpost');?>">ADD POST</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('C_StudySociety/V_userProfile/?username='). $this->session->username;?>">USER INFO</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('C_StudySociety/V_edituserinfo');?>">EDIT INFO</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('C_StudySociety/logout');?>">LOGOUT</a></li>
            </ul>
          </li>
        </ul>
        <?php } else { ?>
            <li><a href="<?php echo site_url('C_StudySociety/login');?>">lOGIN</a></li>        
          </ul>
          <?php } ?>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>



<!-- header -->