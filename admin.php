

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
    <h2>Welcome Admin : <?= $result[0]["username"] ?></h2>
    <div>
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
