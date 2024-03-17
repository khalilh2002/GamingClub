<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";




    if (!empty($_POST["trap"])) {
        
        echo "error 403";
        exit;
    }

    if (isset($_POST["email_reset"] , $_POST["username_reset"])) {
        $user_reset = $_POST["username_reset"];
        $email_reset = $_POST["email_reset"];

        require_once "./connect.php";
        $qry = "SELECT * 
                FROM  users left join login on users.id_login = login.id_login
                WHERE username ='$user_reset' and email = '$email_reset'
                ";
        $stmt = $conn->prepare($qry);
        $stmt->execute();

        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($info)<1) {
            echo "not found";
            exit;
        }

        $n = rand(0,999999);
        $random_code = str_pad($n,6,"0",STR_PAD_LEFT);//send email
        
        
        $_SESSION["code_reset"] = $random_code;
        $_SESSION["reset_status"]=true;
        
        $mail = new PHPMailer(true);
        $user = "spamfake2022@gmail.com";
        $pass = 'gqjxgwtadigppdln';
        $content = $random_code;

        if(sendMail($mail,$user,$pass,$user,$email_reset,"Rest Password",$random_code)){
           ?>
                <script>
                    window.alert("message sended verify your email")
                </script>
           <?php 
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


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</head>
<body>
    <?php
        include_once "./navbar.php"
    ?>
    <form action="forgetPassword.php" class="form-control p-3 m-3 " method="post">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input
                type="text"
                class="form-control"
                name="username_reset"
                id="username_rest"
                aria-describedby="helpId"
                placeholder=""
            />
            <small id="helpId" class="form-text text-muted">your username</small>
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                name="email_reset"
                id="email_rest"
                aria-describedby="emailHelpId"
                placeholder="abc@mail.com"
            />
            <small id="emailHelpId" class="form-text text-muted"
                >your email</small
            >
        </div>
        <div>
            <input type="text" class="d-none" name="trap">
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Submit
        </button>
        
    </form>
   
    
</body>
</html>