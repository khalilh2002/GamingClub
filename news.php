<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .accordion-container {
            max-width: 800px; /* Adjust as needed */
            margin: 0 auto; /* Center the container */
        }

        .accordion-item {
            margin-bottom: 20px; /* Add margin between accordion items */
        }

        .w-100 {
            width: 100%;
            height: 75vh;
        }

        .newstext {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20vh;
            font-size: 48px;
            margin: 0;
        }

        <?php 
            include "./css/style.css";
        ?>
    </style>
</head>
<body id="body-index">
    <header>
        <?php
            include_once("./navbar.php");
        ?>
    </header>
    <main>
        <h1 class="newstext title">News</h1>
        <?php
            include "./admin-news/admin-news-show.php";
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
