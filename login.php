<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
  <?php 
            include "./css/loginstyle.css";
        ?>
  </style>

</head>
<body>
<div id="background"></div> <!-- This will serve as the blurred background -->
  <div id="login-form-wrap">
    <h2>Login</h2>
    <form id="login-form" method="post" action="./authentication.php">
      <p>
      <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
      <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
      <input type="hidden" name="data_type" value="login">
      <input type="submit" name="login" id="login" value="Login">
      
      </p>
    </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="register.php">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
