<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <style>
  <?php 
            include "./css/registerstyle.css";
        ?>
  </style>
</head>
<body>
  <div id="background"></div> <!-- This will serve as the blurred background -->
  <div id="login-form-wrap">
    <h2>Register</h2>
    <form id="login-form" method="post" action="">
      <div class="input-group">
      <p>
        <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
        </p>
      <p>
        <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
        </p>
      </div>
      <div class="input-group">
      <p>
        <input type="email" id="email" name="email" placeholder="Email Address" required>
      </p>
      <p>
        <input type="text" id="username" name="username" placeholder="Username" required>
      </p>
      </div>
      <div class="input-group">
      <p>
        <input type="password" id="password" name="password" placeholder="Password" required>
      </p>
      <p>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter Password" required>
      </p>
      </div>
      <p>
        <input type="submit" id="register" value="Register">
      </p>
    </form>
    <div id="create-account-wrap">
      <p>Already have an account? <a href="login.php">Login</a></p>
    </div><!--create-account-wrap-->
  </div><!--login-form-wrap-->
</body>
</html>
