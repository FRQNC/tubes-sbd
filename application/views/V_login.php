<?php include "templates/V_header.php"; ?>
<form action="<?= site_url('C_StudySociety/confirmLogin')?>" method="POST">
<input type="text" name="username" id="username" placeholder="Username"> <br>
<input type="password" name="user_login_password" id="user_login_password" placeholder="Password"> <br>
<button type="submit">Log In</button>
</form>
<?php include "templates/V_footer.php"; ?>