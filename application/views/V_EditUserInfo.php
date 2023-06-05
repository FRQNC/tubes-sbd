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
          <li><a href="<?php echo site_url('C_StudySociety/V_addpost'); ?>">POST</a></li>
          <li><a href="<?php echo site_url('C_StudySociety/login'); ?>">lOGIN</a></li>
        </ul>
      </div><!-- Wnavbar-collapse -->
    </div><!-- container-fluid -->
  </nav>

<div class="container">
    <br />
<center>
    <p><?=$this->session->flashdata('msg');?></p>
</center>
<fieldset style="border-color: black;">
<legend><h2>Informasi Data Pribadi</h2></legend>
<fieldset>
    <form action="<?= site_url('C_StudySociety/editUserInfo')?>" method="POST" id="registrationForm" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="user_login_id" value="<?= $this->session->user_login_id?>">
        <br />
        <label for="user_type" class="form-label">Nama Lengkap  </label>
        <input class="form-control" type="text" name="user_fullname" id="user_fullname" placeholder="Nama Lengkap" value="<?= $user_fullname?>" required> <br>
        <br />
        <label for="user_type" class="form-label">tanggal Lahir  </label>
        <input class="form-control" type="date" name="user_birthday" id="user_birthday" placeholder="Tanggal Lahir" value="<?= $user_birthday?>" required> <br>
        <br />
        <label  class="form-label" for="user_sex">Jenis kelamin</label>
        <br />
        <?php
        echo '<input class="form-control" type="radio" name="user_sex" id="user_sex_l" value="L"';
        if($user_sex == 'L'){
            echo 'checked';
        }
        echo "> Laki-laki ";
        echo '<input class="form-control" type="radio" name="user_sex" id="user_sex_p" value="P"';
        if($user_sex == 'P'){
            echo 'checked';
        }
        echo "> Perempuan <br>";
        ?>
        <br />
        <label for="user_type">Termasuk kategori manakah anda </label>
        <br />
        <?php
        echo '<input class="form-control" type="radio" name="user_type" id="user_type_pelajar" value="Pelajar"';
        if($user_type =="Pelajar"){
            echo 'checked';
        }
        echo '> Pelajar';
        echo '<input class="form-control" type="radio" name="user_type" id="user_type_mahasiswa" value="Mahasiswa"';
        if($user_type =="Mahasiswa"){
            echo 'checked';
        }
        echo '> Mahasiswa';
        echo '<input class="form-control" type="radio" name="user_type" id="user_type_umum" value="Umum"';
        if($user_type =="Umum"){
            echo 'checked';
        }
        echo '> Umum <br>';
        ?>
    
    <br />
    <label for="user_type" class="form-label">Asal Institusi  </label>
    <input class="form-control" type="text" name="user_institution" id="user_institution" placeholder="Institusi (contoh Universitas Pendidikan Indonesia)" value="<?= $user_institution?>"> <br>
    <br />
    <label for="user_type" class="form-label">Bio  </label>
    <input class="form-control" type="text" name="user_bio" id="user_bio" placeholder="Bio" value="<?= $user_bio?>"> <br>
    <br />
    <label class="form-label" for="user_photo">Foto</label>
    <img src="<?=base_url('assets/userFiles/'.$this->session->username.'/'.$user_photo)?>" alt="">
    <input class="form-control" type="file" name="user_photo" id="user_photo" accept="image/*">
    <br />
    <br>
    <button type="submit">Simpan</button>
    <br>
</form>
</fieldset>
</fieldset>
<br>
</div>
<?php include "templates/V_footer.php"; ?>