<?php include "templates/V_header.php"; ?>
<form action="<?= site_url('C_StudySociety/confirmRegistration')?>" method="POST" id="registrationForm">
<input type="text" name="username" id="username" placeholder="Username" required> <br>
<input type="email" name="user_login_email" id="user_login_email" placeholder="Email" required> <br>
<input type="password" name="user_login_password" id="user_login_password" placeholder="Password" required> <br>
<input type="password" name="retype_password" id="retype_password" placeholder="Ketik ulang password" required>
<button type="submit">Register</button>
</form>

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