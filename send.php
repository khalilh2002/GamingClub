    
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

    function captchaVerfie(){
        
        $secret_key = "6Ld7k4kpAAAAADrtgyeU39WbZ2XLCb6oYt6m7fgn";
        
        // Your secret key provided by Google
        $secret = "6LdvtYkpAAAAAOL_FjtgvIeXyO1KNADuhviy2N0U";

        // User's response from the reCAPTCHA widget
        $response = $_POST['g-recaptcha-response'];

        // Verify the reCAPTCHA response
        $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
        $data = array(
            'secret' => $secret,
            'response' => $response
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $response = file_get_contents($verifyUrl, false, $context);
        $result = json_decode($response, true);

        // Check if the verification was successful
        if ($result['success']) {
            // Captcha verification successful, proceed with your code
            echo "Captcha verification successful!";
            return true;
        } else {
            // Captcha verification failed
            echo "Captcha verification failed. Please try again.";
            return false;
        }

    }
    

        

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
    if (isset($_POST["g-recaptcha"])) {
        $captcha = $_POST["g-recaptcha"];
        echo"ok check captcha";
    }
    
    
    if (!captchaVerfie() && isset($email , $firstName ,$lastName,$sujet,$message,$captcha) ) {
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
        }  
    }else {
        echo"
        <script>
            alert('error');
            window.location.href='contact.html';

        </script>
        "; 
    }
?>
    