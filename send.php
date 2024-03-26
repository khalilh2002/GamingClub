    
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

    function sendMail($mail , $username , $password , $fromEmail , $toEmail , $subject , $message){
        try {
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username = $username;
            $mail->Password =$password;
            $mail->SMTPSecure = 'ssl';
            $mail->Port= 465;
            $mail->setFrom($fromEmail);
            $mail->addAddress($toEmail);
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body=$message;


            $mail->send(); 
            return true;

        } catch (\Throwable $th) {
            echo"".$th->getMessage()."";
            return false;
        }
    }

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
    
    
    
    if (isset($email , $firstName ,$lastName,$sujet,$message) ) {
        $mail = new PHPMailer(true);
        $user = "email@gmail.com";
        $pass = 'azertyuiokjhgfds';

        $content = "From : $firstName $lastName \r\n objet : $sujet \r\n".$message."\n";
        
        if (sendMail($mail , $user,$pass,$user,$user,$sujet,$content)) {
            ?>
            <script>
                alert('send ok');
                window.location.href='index.php';

            </script>
            <?php

            sendMail($mail,$user ,$pass ,$user ,$email,"message bien reussit","nous avons reussit votre message \n nous sommes tres heureux :)");
            
        }  
    }else {
        ?>
        <script>
            alert('error');
            window.location.href='./contact';
        </script>

        <h1></h1>
        <?php
    }


?>
    
