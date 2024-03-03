<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        main{
            padding: 30px 40px;
        }
    </style>
</head>
<body >
<header>
    <nav class="navbar navbar-expand-lg bg-dark  border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="controller.png" alt="Gaming Club" width="30" height="24">
                FSTT Gaming Club
            </a>
            <div class="collapse navbar-collapse navbar-brand" id="navbar001">
                <ul class="navbar-nav mb-2 me-auto mb-lg-0 ">
                    <li class="nav-item">
                        <a href="index.html" aria-current="page" class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="news.html" aria-current="page" class="nav-link">News</a>
                    </li>
                    <li class="nav-item">
                        <a href="tournaments.html" aria-current="page" class="nav-link">Tournaments</a>
                    <li class="nav-item">
                        <a href="contact.html" aria-current="page" class="nav-link active">Contact Us</a>                        </li>
                </ul>
            </div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar001">Click me</button>
                
        </div>
    </nav>
</header>
<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

<main >

    <form id="contact-form" action="contact.php" method="post" class="row g-3" name="submit-to-google-sheet">
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
            <a class="btn btn-outline-primary btn-lg" onclick="document.getElementById('contact-form').submit() ;"
            type="submit" name="send">Send</a>
        </div>
    </form>
</main>
    
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require "phpmailer/src/Exception.php";
        require "phpmailer/src/PHPMailer.php";
        require "phpmailer/src/SMTP.php";

        //include_once("php/connect.php");
        if ( isset($_POST["firstName"]) ) {
            $firstName = $_POST["firstName"];
        }
        if ( isset($_POST["lastName"]) ) {
            $lastName = $_POST["lastName"];
        }
        if ( isset($_POST["email"]) ) {
            $email = $_POST["email"];
        }
        if ( isset($_POST["message"]) ) {
            $message = $_POST["message"];
        }
        if ( isset($_POST["sujet"]) ) {
            $sujet = $_POST["sujet"];
        }

        if (isset($_POST["email"]) ) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username = 'gggspamfake2022@gil.com';
                $mail->Password ='gqjxgwtadigppdln';
                $mail->SMTPSecure = 'ssl';
                $mail->Port= 465;
                $mail->setFrom("spamfake2022@gmailcom");
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject=$sujet;
                $mail->Body=$message;
                $mail->send(); 
            } catch (\Throwable $th) {
                echo"".$th->getMessage()."";
            }
            
            echo"
            <script>
                alert('send ok');
            </script>
            ";


            
        }
        

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</script>

</body>
</html>