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
            width: 100%;
            height: 75vh;
        } 
        .aboutus-content {
            text-align: left;
            
        
        }
        .staff-member {
    display: inline-block;
    vertical-align: top;
    margin-left: 80px; /* Adjust as needed */
    margin-bottom: 40px;
    margin-right: 80px;
    margin-top: 40px;
    align-items: center;
     /* Add margin between each staff member */
}

        .staff-img {
            width: 150px; /* Adjust the width of the images */
            height: auto;
            
        }

        .staff-info {
            font-size: 14px;
             margin-top: 5px;
        }
        .homepage-txt {
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
    
    <!--bootstrap offline-->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    
    <!--- font --->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&family=Protest+Strike&display=swap" rel="stylesheet">
</head>
<body id="body-index">
    <header>
        <?php include_once("./navbar.php"); ?>
    </header>
    
    <section id="home">
        <div class="container-xl pt-5 mt-5">
            <div class="row gap-4">
                <!-- Introduction Section -->
                <div id="intro" class="col-7">
                    <h3 class="font-honk">FST Tanger Gaming Club</h3>
                    <p class="font-roboto">
                        Discover the world of gaming with us. From tournaments to casual play, find everything you need right here.
                        Join us for events, connect with fellow gamers, and explore our diverse gaming library.
                        What are you waiting for? Join us right now!!
                    </p>
                    <div class="d-grid d-md-flex gap-2 justify-content-md-end pt-3" id="bouttonHome">
                        <a href="#contactus" class="z-3 btn btn-lg btn-primary">Contact Us</a>
                        <a href="#aboutus" class="z-3 btn btn-lg btn-primary">About Us</a>
                    </div>
                </div>

                <!-- Logo Section -->
                <div class="col-4">
                    <img src="./img/logoclub.png"  alt="Logo" id="mainlogo1" class="img-thumbnail bg-transparent border-0">
                </div>
            </div>
        </div>
    </section>

    <!-- Other content -->
    <div style="height: 250px;"> <!-- Adjust the height according to your needs -->
        <!-- This will create space for scrolling -->
    </div>

    <section id="aboutus">
    <div class="container">
        <h2  class="homepage-txt title">About Us</h2>
        <div class="aboutus-content">
            <div class="font-roboto">
                <p>
                    <h2>Welcome to the FST Tanger Gaming Club!</h2>
                    <p>
                        At FST Tanger Gaming Club, we're dedicated to fostering a vibrant gaming community within our school. Our club provides a platform for students who share a passion for gaming to come together, connect, and engage in various gaming-related activities.
                    </p>

                    <!-- Staff Members -->
                    <h3>Meet Our Staff :</h3>

                    <!-- Staff Member 1 -->
                    <div class="staff-member">
                        <img src="./img/generic3.png" alt="Staff Member 1" class="staff-img">
                        <p class="staff-info">John Doe<br>Position: President</p>
                    </div>

                    <!-- Staff Member 2 -->
                    <div class="staff-member">
                        <img src="./img/generic3.png" alt="Staff Member 2" class="staff-img">
                        <p class="staff-info">Jane Smith<br>Position: Vice President</p>
                    </div>

                    <!-- Staff Member 3 -->
                    <div class="staff-member">
                        <img src="./img/generic3.png" alt="Staff Member 2" class="staff-img">
                        <p class="staff-info">Jordy Alba<br>Position: Vice President</p>
                    </div>

                    <!-- Add more staff members as needed -->

                    <!-- Rest of the About Us content -->
                    <!-- Include your existing About Us content here -->

                </p>
            </div>
        </div>
    </div>
    </section>
    <section id="contactus">
    <?php
        include_once "./contact.php";
    ?>
    </section>


    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
