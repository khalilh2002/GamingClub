<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";


    //hadi katsift email
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
    
    
    session_start();
    $random_code= null; //had howa l var li raywli random

    //had if ktchof whach les donner 3amrin
    if (isset($_POST["first_name"] , $_POST["email"] , $_POST["username"] , $_POST["password"] , $_POST["last_name"])) {
        
        $_SESSION["first_name"]=$_POST["first_name"];
        $_SESSION["last_name"]=$_POST["last_name"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["username"]=$_POST["username"];
        $_SESSION["password"]=$_POST["password"];


    }
    

    //if lwla katsift email ila m3mro tsift "ou" katsifto ila sal 'expire_date'
    if (!isset($_SESSION["verfier"],$_SESSION["expire_date"]) ||$_SESSION["verfier"]==false || ($_SESSION["expire_date"] < time()) ){

        $n = rand(0,999999);
        $random_code = str_pad($n,6,"0",STR_PAD_LEFT);//send email

        $mail = new PHPMailer(true);
        $user = "spamfake2022@gmail.com";
        $pass = 'gqjxgwtadigppdln';
        $toemail = $_SESSION["email"];
        $content_ = $random_code;

        if(sendMail($mail , $user , $pass , $user ,$toemail ,"verfication code",$content_)){
            echo "send";
            $_SESSION["verfier"]=true;
            $_SESSION["expire_date"]=time()+(60 * 30);
            $_SESSION["code"]=$random_code;
        }else {
            echo "not send";
            $_SESSION["verfier"]=false;

        }
        header("location:verfier.php");

    //hadi kat verfier wach l code li ktbo howa nit li sifto lih       
    }else if(isset($_SESSION["verfier"],$_SESSION["expire_date"] , $_SESSION["code"]) && $_SESSION["verfier"]==true && ($_SESSION["expire_date"] >= time()) ){
            if (isset($_POST["verfier_code_input"])) {
                $input = $_POST["verfier_code_input"];

                if ($input===$_SESSION["code"]) {

                    $_SESSION["verfier"]=false;
                    $_SESSION["expire_date"]=0;
                    $_SESSION["code"]=null;
                    session_write_close();
                    header("location: upload.php?n=200");
                }
            }
            
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        <?php include "./css/verify.css"; ?>
    </style>
</head>
<body>
    <div id="background"></div> <!-- This will serve as the blurred background -->
    <div id="login-form-wrap">
        <h2>Email Verification</h2>
        <h5>Please Check your E-mail and Send the code that was sent to your inbox</h5>
        <form action="verfier.php" method="post" id="login-form">
            <input type="text" name="verfier_code_input" placeholder="Verification Code">
            <input type="submit" value="Submit">
        </form>
    </div>
    </div>
</body>
</html>
