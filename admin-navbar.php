<?php
  require "./connect.php";
  session_start();

  if (isset($_SESSION['id'] , $_SESSION['username'])) {
    $qry = "SELECT id_login_admin , username FROM login_admin WHERE id_login_admin = ".$_SESSION['id']." and  username = \"".$_SESSION["username"]."\" ";
    
    $stmt = $conn->prepare($qry);
    if($stmt->execute()){
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($result)==0) {
        header("location: ./login.php");
      }
    }
  }else {
    header("location: ./admin-login/admin-login.php");
  }
  
?>
<style><?php 
            include "./css/admnavbar.css";
        ?>
    </style>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a style = "font-family: 'roboto';" class="navbar-brand" href="./admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="font-family: 'roboto';">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./admin-tournaments.php">tournaments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin-news.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">USERS</a>
        </li>
      </ul>
      
    </div>
    <form action="./admin-navbar.php" method="post">
      <button class="btn btn-primary" name="logout" value = "end">Logout</button>
    </form>
  </div>
</nav>

<?php
  if (isset($_POST["logout"]) && $_POST["logout"] == "end" && $_SERVER['REQUEST_METHOD']=='POST') {
      session_destroy();
      header("location: ./admin.php");
      exit();
  }
?>