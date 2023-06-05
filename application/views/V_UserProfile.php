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
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />

  <!-- uniform -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/uniform/css/uniform.default.min.css'); ?>" />

  <!-- animate.css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/wow/animate.css'); ?>" />


  <!-- gallery -->
  <link rel="stylesheet" href="<?php echo base_url('assets/gallery/blueimp-gallery.min.css'); ?>">


  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .tag {
      display: inline-block;
      background-color: #f2f2f2;
      color: #333;
      padding: 5px 10px;
      margin-right: 5px;
      margin-bottom: 5px;
    }

    .tag-delete {
      cursor: pointer;
      margin-left: 5px;
    }
  </style>
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
        <a class="navbar-brand" href="<?php echo site_url('C_StudySociety/index'); ?>"><img src="<?php echo base_url('assets/logo.png'); ?>" style="width:50px;" alt="study society"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
          <li><a href="<?php echo site_url('/'); ?>">HOME</a></li>
          <li><a href="<?php echo site_url('C_StudySociety/home'); ?>">MATERI</a></li>
          <li><a href="<?php echo site_url('C_StudySociety/V_edituserinfo'); ?>">USER INFO</a></li>
          <li><a href="<?php echo site_url('C_StudySociety/login'); ?>">lOGIN</a></li>
        </ul>
      </div><!-- Wnavbar-collapse -->
    </div><!-- container-fluid -->
  </nav>
<div class="container">
<style>
.wrap{
width: 800px;
color:black;
margin: 20px auto;
padding:15px;
}
</style>
</head>
<body style="background-size:cover;background-attachment: fixed;">
<div class="wrap">
<h2 class="class" align="center">INFORMASI DATA DIRI</h2><hr/ align="center" width="100%" style="border-top: 3px double #8c8b8b;">
<table style="padding: 5%;">
<tr><td rowspan="10" width="100px">
<img src="<?=base_url('assets/userFiles/'.$username.'/'.$user_photo)?>" style="display: block;border-radius: 5%;border-color:white;margin-right:30px; width:300px;" border="2px" ></td></tr>
<tr style="padding: 2px;"><td><b>Nama </b></td><td>:</td> <td> <?= $user_fullname?></td></tr>
<tr><td><b>Username </b></td><td>:</td> <td> <?= $username?></td></tr>
<tr><td><b>Jenis Kelamin </b></td><td>:</td> <td> <?= $user_sex?></td></tr>
<tr><td><b>TTL </b></td><td>:</td> <td> <?= $user_birthday?></td></tr>
<tr><td><b>Bio </b></td><td>:</td> <td> <?= $user_bio?></td></tr>
<tr><td><b>Institusi </b></td><td>:</td> <td> <?= $user_institution?></td></tr>
<tr><td><b>Type</b></td><td>:</td> <td><?= $user_type?></td></tr></table>
    <br>
    <br>
<?php
    if($username == $this->session->username){
        echo '<button type="button">';
        echo '<a href="'.site_url('C_StudySociety/V_editUserInfo').'">Edit profil</a>';
        echo '</button>';
    }
    ?>
<br>
<br>
<button><a href="<?php echo site_url('C_StudySociety/V_addpost'); ?>">ADD POST</a></button>
<center>
<h2>Daftar Post</h2>
<ul>
    <?php
        if(gettype($user_posts) != 'array'){
            echo '<p>Kosong</p>';
        }
        else{
            foreach($user_posts as $post){
    ?>
    <li><?= $post->post_title?></li>
    <?php
            }
        }
    ?>
</ul>
<br>
</center>
</div>
</div>
</div>
<?php include "templates/V_footer.php"; ?>