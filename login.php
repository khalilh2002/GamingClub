<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
  body {
      position: relative; /* Make sure body has relative position */
    }
    #home-button {
      position: absolute;
      top: -100px;
      left: 20px;
      cursor: pointer;
      z-index: 9999; /* Ensure it's above other content */
    }
    #home-button .fa-door-closed {
      color: #037ffc; /* Change color to black on hover */
    }
    #home-button:hover .fa-door-closed {
      color: gray; /* Change color to black on hover */
    }
  <?php 
            include "./css/loginstyle.css";
        ?>
  </style>

</head>
<body>
<a href="./index.php" id="home-button">
    <i class="fas fa-door-closed"></i>
  </a>
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
    <p>Forget password? <a href="forgetPassword.php">reset</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
<script src="https://kit.fontawesome.com/2c68a7a0e8.js" crossorigin="anonymous"></script>
  
</body>
</html>
