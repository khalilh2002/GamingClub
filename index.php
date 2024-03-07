<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gaming Club</title>
    <link rel="website icon" href="/img/g.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .w-100 {
            width: 100% ;
            height: 75vh;
        } 

        <?php 
            include "./css/style.css" ;
        ?>
    </style>
    
    <!--bootstrap offline-->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
    
    <!--- font --->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&family=Protest+Strike&display=swap" rel="stylesheet">
</head>
<body id="body-index">
    <header>
        <?php
            include("./navbar.php")
        ?>
    </header>
    
    <section id="home">
        <div class="container-xl pt-5">
            <div class="row gap-4">
                <!-- Introduction Section -->
                <div id="intro" class="col-7">
                    <h1 class="h1 font-dredd">Gaming CLUB 🎮</h1>
                    <h3 class="font-honk">FST Tangier Gaming Club!!🔥⚡!</h3>
                    <p class="lead lh-3">
                        Discover the world of gaming with us. From tournaments to casual play, find everything you need right here.
                        Join us for events, connect with fellow gamers, and explore our diverse gaming library.
                        What are you waiting for? Join us right now!!
                    </p>
                    <div class="d-grid d-md-flex gap-2 justify-content-md-end pt-3" id="bouttonHome">
                        <a href="" class="z-3 btn btn-lg btn-primary">Contact Us</a>
                        <a href="" class="z-3 btn btn-lg btn-primary">About Us</a>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="col-4">
                    <img src="./img/background.png" class="img-fluid shadow-lg" alt="" id="main-logo">
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
