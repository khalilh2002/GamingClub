<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Admin</title>
     
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>

</head>
<body>

<header>
  <?php
    include "./admin-navbar.php";
  ?>
</header>
<main>
    <?php
        include "./admin-news/news-tab.php";
    ?>
</main>
</body>
</html>