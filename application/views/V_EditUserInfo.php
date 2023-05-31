<?php include "templates/V_header.php"; ?>
<form action="<?= site_url('C_StudySociety/confirmRegistration')?>" method="POST" id="registrationForm">
<input type="text" name="user_fullname" id="user_fullname" placeholder="Nama Lengkap" required> <br>
<input type="date" name="user_birthday" id="user_birthday" placeholder="Tanggal Lahir" required> <br>
<input type="radio" name="user_sex" id="user_sex_l" value="L" required> Laki-laki <br>
<input type="radio" name="user_sex" id="user_sex_p" value="P" required> Perempuan <br>
<input type="radio" name="user_type" id="user_type_pelajar" value="Pelajar"> Pelajar <br>
<input type="radio" name="user_type" id="user_type_mahasiswa" value="Mahasiswa"> Mahasiswa <br>
<input type="radio" name="user_type" id="user_type_umum" value="Umum"> Umum <br>
<input type="text" name="user_institution" id="user_institution" placeholder="Institusi (contoh Universitas Pendidikan Indonesia)"> <br>
<input type="text" name="user_bio" id="user_bio" placeholder="Bio"> <br>
<label for="user_photo">Foto</label>
<input type="file" name="user_photo" id="user_photo">
<button type="submit">Register</button>
</form>
<?php include "templates/V_footer.php"; ?>