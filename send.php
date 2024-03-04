    
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

    if (isset($_POST["email"]) ) {
        $mail = new PHPMailer(true);
        
        $user = "spamfake2022@gmail.com";
        $pass = 'gqjxgwtadigppdln';

        if (sendMail($mail , $user,$pass,$user,$email,$sujet,$message)) {
            echo"
            <script>
                alert('send ok');
                window.location.href='contact.html';

            </script>
            "; 
        }else {
            echo"
            <script>
                alert('i not sended');
                window.location.href='contact.html';

            </script>
            "; 
        }
        
        
    }
?>
    
