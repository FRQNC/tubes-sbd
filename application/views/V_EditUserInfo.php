<?php include "templates/V_header.php"; ?>
<form action="<?= site_url('C_StudySociety/editUserInfo')?>" method="POST" id="registrationForm" enctype="multipart/form-data">
<input type="hidden" name="user_login_id" value="<?= $this->session->user_login_id?>">
<input type="text" name="user_fullname" id="user_fullname" placeholder="Nama Lengkap" value="<?= $user_fullname?>" required> <br>
<input type="date" name="user_birthday" id="user_birthday" placeholder="Tanggal Lahir" value="<?= $user_birthday?>" required> <br>
<label for="user_sex">Jenis kelamin : </label>
<?php
    echo '<input type="radio" name="user_sex" id="user_sex_l" value="L"';
    if($user_sex == 'L'){
        echo 'checked';
    }
    echo "> Laki-laki";
    echo '<input type="radio" name="user_sex" id="user_sex_p" value="P"';
    if($user_sex == 'P'){
        echo "checked";
    }
    echo "> Perempuan <br>";
?>
<label for="user_type">Termasuk kategori manakah anda : </label>
<?php
    echo '<input type="radio" name="user_type" id="user_type_pelajar" value="Pelajar"';
    if($user_type =="Pelajar"){
        echo 'checked';
    }
    echo '> Pelajar';
    echo '<input type="radio" name="user_type" id="user_type_mahasiswa" value="Mahasiswa"';
    if($user_type =="Mahasiswa"){
        echo 'checked';
    }
    echo '> Mahasiswa';
    echo '<input type="radio" name="user_type" id="user_type_umum" value="Umum"';
    if($user_type =="Umum"){
        echo 'checked';
    }
    echo '> Umum <br>';
?>
<input type="text" name="user_institution" id="user_institution" placeholder="Institusi (contoh Universitas Pendidikan Indonesia)" value="<?= $user_institution?>"> <br>
<input type="text" name="user_bio" id="user_bio" placeholder="Bio" value="<?= $user_bio?>"> <br>
<label for="user_photo">Foto</label>
<input type="file" name="user_photo" id="user_photo">
<button type="submit">Simpan</button>
</form>
<?php include "templates/V_footer.php"; ?>