<?php
    
    require "./connect.php";
    session_start();

    if (isset($_SESSION['id_user'] , $_SESSION['username_user'])) {
        $qry = "SELECT id_login , username FROM login WHERE id_login = ".$_SESSION['id_user']." and  username = \"".$_SESSION["username_user"]."\" ";
        
        $stmt = $conn->prepare($qry);
        if($stmt->execute()){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result)==0) {
            header("location: ./login.php");
        }else{
            $qry = "SELECT * FROM users WHERE id_login = ".$_SESSION['id_user']." ";
        
            $stmt = $conn->prepare($qry);
            if($stmt->execute()){
                $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                header("location: ./login.php");
            }
        }
        }
    }else {
        header("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body>
    <header>
        <?php
            include "./navbar.php";

            
        ?>
         
    </header>
    <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }else if(isset($_SESSION["id_user"] , $_SESSION["username_user"])){
            $id = $_SESSION["id_user"];
        }else{
            header("location: ./login.php");
        }
    ?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
      <img class="align-self-center justify-self-center" src="./img/profile.png" alt="" srcset="" width="150px">
        <div class="card-header">
          <h3 class="text-center">My Profile</h3>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <label name="username" class="form-label"><?= $result[0]["username"] ?></label>

            </div>
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name:</label>
              <label name="username" class="form-label"><?= $result2[0]["first_name"] ?></label>

            </div>
            <div class="mb-3">
              <label for="lastName" class="form-label">Last Name:</label>
              <label name="username" class="form-label"><?= $result2[0]["last_name"] ?></label>

            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <label name="username" class="form-label"><?= $result2[0]["email"] ?></label>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>