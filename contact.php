<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
        main{
            padding: 30px 40px;
        }
        .contacttext{
            display: flex;
                justify-content: center;
                align-items: center;
                height: 20vh;
                font-size: 48px;
                margin: 0;
                color: white;
                
        }
        <?php 
          include "./css/style.css" ;
        ?>
    </style>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
 
    
</head>
<body id="body-index" >
<header>
    <?php
        include_once("./navbar.php")
    ?>        
</header>

<h1 class="contacttext title">Contact us</h1>

<main >

    <form id="contact-form" action="send.php" method="post" class="row g-3" name="">
        <div class="col-6">
            <div class="form-floating mb-3">
                <input type="text" name="firstName" class="form-control" placeholder="Name"  id="firstNameID">
                <label for="firstNameID">First Name</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-floating mb-3">
                <input type="text" name="lastName" class="form-control" placeholder="Name"  id="lastNameID">
                <label for="lasttNameID">Last Name</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email"  id="emailID">
                <label for="emailID">Email Address</label>  
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" name="sujet" class="form-control" placeholder="Sujet" id="sujetID">
                <label for="sujetID">Sujet</label>  
            </div>
        </div>
        <div class="col-10">
            <textarea name="message" id="message" rows="5" class="form-control" placeholder="write your mesage here"></textarea>
        </div>
        
        <div class="col-6">
            <!-- get captcha responde--->
            <div class="g-recaptcha hide" data-sitekey="6LdvtYkpAAAAANPRBGzc6LZV5ch4nUFW-SfljoPA" data-action="LOGIN"></div>
            <br/>
            <button class=" btn btn-outline-primary btn-lg"  type="submit">Submit</button>
            
        </div>
    </form>
</main>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>