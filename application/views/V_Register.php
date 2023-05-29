<?php include "templates/V_header.php"; ?>
<style>
  body {
	background-color: #545B77;
}
.form-container{
    background: linear-gradient(150deg,#1B394D 33%,#2D9DA7 34%,#2D9DA7 66%,#EC5F20 67%);
    font-family: 'Raleway', sans-serif;
    text-align: center;
    padding: 30px 20px 50px;
}
.form-container .title{
    color: #fff;
    font-size: 23px;
    text-transform: capitalize;
    letter-spacing: 1px;
    margin: 0 0 60px;
}
.form-container .form-horizontal{
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0,0,0,0.4);
}
.form-horizontal .form-icon{
    color: #fff;
    background-color: #93bfcf;
    font-size: 75px;
    line-height: 92px;
    height: 90px;
    width: 90px;
    margin: -65px auto 10px;
    border-radius: 50%;
}
.form-horizontal .form-group{
    margin: 0 0 10px;
    position: relative;
}
.form-horizontal .form-group:nth-child(3){ margin-bottom: 30px; }
.form-horizontal .form-group .input-icon{
    color: #e7e7e7;
    font-size: 23px;
    position: absolute;
    left: 0;
    top: 10px;
}
.form-horizontal .form-control{
    color: #000;
    font-size: 16px;
    font-weight: 600;
    height: 50px;
    padding: 10px 10px 10px 40px;
    margin: 0 0 5px;
    border: none;
    border-bottom: 2px solid #e7e7e7;
    border-radius: 0px;
    box-shadow: none;
}
.form-horizontal .form-control:focus{
    box-shadow: none;
    border-bottom-color: #EC5F20;
}
.form-horizontal .form-control::placeholder{
    color: #000;
    font-size: 16px;
    font-weight: 600;
}
.form-horizontal .forgot{
    font-size: 13px;
    font-weight: 600;
    text-align: right;
    display: block;
}
.form-horizontal .forgot a{
    color: #777;
    transition: all 0.3s ease 0s;
}
.form-horizontal .forgot a:hover{
    color: #777;
    text-decoration:  underline;
}
.form-horizontal .signin{
    color: #fff;
    background-color: #EC5F20;
    font-size: 17px;
    text-transform: capitalize;
    letter-spacing: 2px;
    width: 100%;
    padding: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    transition: all 0.4s ease 0s;
}
.form-horizontal .signin:hover,
.form-horizontal .signin:focus{
    font-weight: 600;
    letter-spacing: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3) inset;
}
</style>
<br>
<div class="form-bg" >
  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
        <div class="form-container">
          <h3 class="title">Register</h3>
          <form class="form-horizontal" action="<?= site_url('C_StudySociety/confirmRegistration')?>" method="POST" id="registrationForm">
            <div class="form-icon">
              <i class="fa fa-user-circle"></i>
            </div>
            <div class="form-group">
              <span class="input-icon"><i class="fa fa-user"></i></span>
              <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <span class="input-icon"><i class="fa fa-user"></i></span>
              <input class="form-control" type="email" name="user_login_email" id="user_login_email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <span class="input-icon"><i class="fa fa-lock"></i></span>
              <input class="form-control" type="password" name="user_login_password" id="user_login_password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <span class="input-icon"><i class="fa fa-lock"></i></span>
              <input class="form-control" type="password" name="retype_password" id="retype_password" placeholder="Ketik ulang password" required>
            </div>
            <br/>
            <button class="btn signin" type="submit">Register</button>
            <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
<script>
    var passwordInput = document.getElementById("user_login_password");
var confirmPasswordInput = document.getElementById("retype_password");

function validatePassword() {
  var password = passwordInput.value;
  var confirmPassword = confirmPasswordInput.value;

  if (password !== confirmPassword) {
    // Passwords don't match
    alert("Passwords do not match!");
    return false;
  }

  // Passwords match
  return true;
}

// Example usage: You can call the validatePassword() function when the user submits the form.
// For example, assuming you have a form with the ID "registrationForm":
var form = document.getElementById("registrationForm");

form.addEventListener("submit", function (event) {
  if (!validatePassword()) {
    // Prevent the form from being submitted if the passwords don't match
    event.preventDefault();
  }
});
</script>
<?php include "templates/V_footer.php"; ?>