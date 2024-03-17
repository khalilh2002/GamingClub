<?php
session_start();
require "./connect.php";

  if (isset($_POST['changePassword'] , $_POST['oldPassword'] ,
  $_POST['newPassword'],$_POST['newPassword-confirm']) && $_POST["changePassword"]==="change") 
  {
    $username = $_SESSION["username"];
    $password = $_POST["oldPassword"];
    $qry = 'SELECT * FROM login_admin where username = "'.$username.'" and pass="'.$password.'";';
    $stmt = $conn->prepare($qry);
    if (!$stmt->execute()) {
      exit;
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);
    if (count($result)!=1) {
      echo"count";
      exit;
    }
    if (!($_POST['newPassword-confirm']===$_POST['newPassword'])) {
      echo"count 2";
      exit;
    }
    $updateQry = 'UPDATE login_admin SET pass = "'.$_POST["newPassword"].'" WHERE id_login_admin = '.$_SESSION['id'];
    echo $updateQry;
    
    $updateStmt = $conn->prepare($updateQry);
    if ($updateStmt->execute()) {
      ?>
      <script>
        window.alert("password changed susseccfuly");
      </script>
      <?php
      header("location: admin.php");
    }
    
  }
  session_write_close();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body >

<header>
  <?php
    include_once "./admin-navbar.php";
    
  ?>
</header>

<main>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Change Password
        </div>
        <div class="card-body">
          <form action="./admin-change-password.php" method="post" class="p-3 md-3">
            <div class="form-group">
              <label for="currentPassword">Current Password</label>
              <input type="password" class="form-control" name="oldPassword" >
            </div>
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" class="form-control" name="newPassword">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm New Password</label>
              <input type="password" class="form-control" name="newPassword-confirm">
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="changePassword" value="change">Change Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</main>
</body>