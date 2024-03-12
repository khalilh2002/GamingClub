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
                    <input type="hidden" name="data_type" value="login-admin">
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://kit.fontawesome.com/2c68a7a0e8.js" crossorigin="anonymous"></script>
    
</body>
</html>
