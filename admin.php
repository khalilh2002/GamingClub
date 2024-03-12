

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
<main >
<?php
if (isset($_SESSION["id"])){
    $id = $_SESSION["id"];

    $stmt = $conn->prepare("SELECT * FROM login_admin WHERE id_login_admin = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) == 0) {
      echo "no id found";
      exit;
    }
    ?>
    <div class="d-none">
    <h1 style="font-family: 'roboto'; display: flex;
              justify-content: center;
              align-items: center;
              color:blue;
              margin-top:30px;">Admin Control Panel</h1>
    <h2 style="font-family: 'roboto';display: flex;
              justify-content: center;
              align-items: center;
              margin-top:25px;
              margin-bottom:20px"><p>Welcome Admin :</p><p style="width: 5px;";> </p> <p style="color: red;" > <?= $result[0]["username"] ?> </p></h2>
    
    </div>
    <h1 style="font-family: 'roboto'; display: flex;
              justify-content: center;
              align-items: center;
              
              margin-top:30px;" class="text-primary h2">Admin Control Panel</h1>
    <div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
      <img class="align-self-center justify-self-center" src="./img/profile.png" alt="" srcset="" width="150px">
        <div class="card-header">
          <h3 class="text-center">Profile : <?= $result[0]["username"]  ?> </h3>
        </div>
        <div class="card-body">
          <form>
          <div class="mb-3">
              <label for="username" class="form-label">id:</label>
              <label name="username" class="form-label"><?=  $result[0]["id_login_admin"] ;?></label>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <label name="username" class="form-label"><?=  $result[0]["username"] ;?></label>
            </div>
            

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

   
    
</main>
       
</body>
</html>
