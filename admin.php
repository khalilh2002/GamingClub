

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body>

<header>
  <?php
    include_once "./admin-navbar.php";
    
  ?>
</header>
<main>
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
    <div>
      <h4 style="font-family: 'roboto';
      margin-left: 10px;">List of Admins:</h4>
      <table class="table">
        <thead class="table-dark">
          <td>Id</td>
          <td>Username</td>
        </thead>
        <tbody>
          <td><?=  $result[0]["id_login_admin"] ;?></td>
          <td><?=  $result[0]["username"] ;?></td>

        </tbody>
      </table>    
    </div>

<?php } ?>

   
    
</main>
       
</body>
</html>
