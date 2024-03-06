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
            include_once("./navbar.php")
        ?>
    </header>
    <main style="display: none;">
        <div class="carousel slide" id="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" ></button>
                
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"  aria-label="Slide 2" ></button>
                
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"  aria-label="Slide 3" ></button>   
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/gamingclub.jpg" alt="homepageimg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to The Official Website of The FSTT Gaming Club</h5>
                        <p>
                        </p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="img/about-us.jpg" alt="aboutusimage" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>At FST Tanger Gaming Club</h5>
                        <p>, we are passionate about bringing together students who share a love for gaming in all its forms. Whether you're a casual player looking for some fun during breaks or a competitive gamer seeking challenges, our club provides a welcoming and inclusive environment for all.</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="img/gamingsetup.jpg" alt="descimage" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>What Do We Offer??</h5>
                        <p> Heres Your Answer: In Our Club we can Discuss Everything thats Related to Gaming . Also, we Host Competitions on all Different Types of Games and we can also participate in Tournaments whether they re Local,Regional or National Even. So What are you Waiting For?? Contact Us right now if you are Interested to be a Part of this Family!!</p>
                    </div>
                </div>
            </div>
            
        </div>
    
    </main>
    <section id="home">
        <div class="container-xl pt-5">
            <div class="row gap-4">
                <div id="intro" class="col-7">
                    <h1 class="h1 font-dredd">Gaming CLUB 🎮</h1>
                    <h3 class="font-honk">FST Tangier Gaming club!!🔥⚡!</h3>
                    <p class="lead lh-3">
                        Discover the world of gaming with us. From tournaments to casual play, find everything you need right here. Join us for events, connect with fellow gamers, and explore our diverse gaming library. so What are you Waiting for?? Join us right now!!
                    </p>
                    <div class="d-grid d-md-flex gap-2 justify-content-md-end pt-3" id="bouttonHome">
                        <a href="" class="z-3 btn btn-lg btn-primary ">Contact Us</a>
                        <a href="" class="z-3 btn btn-lg btn-primary ">About Us</a>
                    </div>
                </div>
                <div class="col-4  ">
                    <img src="/img/background.png" class="img-fluid shadow-lg" alt="" id="main-logo">
                </div>
            </div>
            
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>