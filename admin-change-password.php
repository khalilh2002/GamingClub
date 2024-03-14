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
      header("location: admin-change-password.php");
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
  <form action="./admin-change-password.php" method="post" class="p-3 md-3">
    <div>
      <label for="oldPassword" class="form-control bg-secondary">Old Password</label>
      <input type="password" class="form-control" name="oldPassword">
    </div>
    <div>
      <label for="newPassword" class="form-control bg-secondary">New Password</label>
      <input type="password" class="form-control" name="newPassword">
    </div>
    <div>
      <label for="newPassword-confirm" class="form-control bg-secondary">Confirm Password</label>
      <input type="password" class="form-control" name="newPassword-confirm">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="changePassword" value="change" >Submit</button>
    </div>
  </form>
</main>
</body>