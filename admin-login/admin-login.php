<?php
    session_start();
    require_once "../connect.php";  
?>

<?php
    if (isset($_POST['data_type'] , $_POST['password'] , $_POST["password_confirm"]) && $_POST['data_type']==="change_password_first_time" ) {
        if ($_POST['password']  != $_POST["password_confirm"] ) {
            unset($_POST);
            ?>
                <script>
                    window.alert(" error passwords are different");
                </script>
            <?php
}else{
            $username = $_SESSION["username"];
            $password = $_POST["password"];
            $qry = "INSERT INTO  login_admin(username , pass)
                VALUES('$username','$password')
            ";
            $stmt = $conn->prepare($qry);
            $stmt->execute();

            $qry = "UPDATE login set first_time=false WHERE username = '$username'";
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            
            $_SESSION["first_time"]=false;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #home-button {
      position: absolute;
      top: 20px;
      left: 20px;
      cursor: pointer;
      z-index: 9999;
      font-size: 26px; /* Ensure it's above other content */
    }
    #home-button .fa-door-closed {
      color: #037ffc; /* Change color to black on hover */
    }
    #home-button:hover .fa-door-closed {
      color: gray; /* Change color to black on hover */
    }
    </style>
</head>
<body >
<?php 
    if ($_SESSION["first_time"]==false):
?>
<a href="../index.php" id="home-button">
    <i class="fas fa-door-closed"></i>
  </a>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Admin</h2>
                <form action="../authentication.php" method="post" >
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="">forget password</a>
                    </div>
                    <div>
                    <input type="hidden" name="data_type" value="login-admin">
                    <button type="submit" class="btn btn-primary">Login</button>    
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

<?php 
    elseif ($_SESSION["first_time"]==true):
?>

<a href="../index.php" id="home-button">
    <i class="fas fa-door-closed"></i>
  </a>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Create New Password for Admin</h2>
                <form action="admin-login.php" method="post" >
                    <div class="mb-3">
                        <label for="username" class="form-label">Password_old</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password_New</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>
                    
                    <input type="hidden" name="data_type" value="change_password_first_time">
                    <button type="submit" class="btn btn-primary">change password</button>
                </form>
            </div>
        </div>
    </div>

<?php 
    endif;
?>


    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://kit.fontawesome.com/2c68a7a0e8.js" crossorigin="anonymous"></script>
    
</body>
</html>
