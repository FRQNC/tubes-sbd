<?php include "templates/V_header.php"; ?>

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