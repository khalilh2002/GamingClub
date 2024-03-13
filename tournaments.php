<?php
session_start(); // Start session


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tournaments</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .w-100 {
                width: 100% ;
                height: 75vh;
              }
            .tournamenttext{
                display: flex;
              justify-content: center;
              align-items: center;
              height: 20vh;
              font-size: 10vh;
              margin: 0;
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; /* Changing font */
              color: rgb(4, 20, 71); /* Example color */
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;  /* Different font for tournaments */

            }
            .tournament-items{
              padding: 10px 30px;
            }
            <?php 
              include "./css/style.css" ;
            ?>
        </style>
        
    </head>
<body id="body-index">
 
<header>  

  <?php
    include_once("./navbar.php")
  ?>

</header>
<main >
<h1 class="tournamenttext title">Tournaments</h1>

    <?php
      include "./admin-tournaments/admin-tournaments-show.php";
    ?>
  </div>
  
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
