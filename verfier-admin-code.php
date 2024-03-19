<?php
session_start();
include "./connect.php"; // Include your database connection file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";

// Function to send email
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
if (!isset($phase1)) {
    $phase1=true;
}
if (!isset($_SESSION["expire"])) {
    $_SESSION["expire"]=0;

}



if (isset($_POST["phase1"]) ) {
    $user_reset = $_POST["username_reset"];
    $email_reset = $_POST["email_reset"];
    $_SESSION["username_reset_admin"] = $user_reset;

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
    
    $mail = new PHPMailer(true);
    $user = "spamfake2022@gmail.com";
    $pass = 'gqjxgwtadigppdln';
    $content = $random_code;

    if(sendMail($mail,$user,$pass,$user,$email_reset,"Rest Password admin",$random_code)){
        ?>
            <script>
                window.alert("message sended verify your email")
            </script>
        <?php 
        $_SESSION['code']=$random_code;
        $_SESSION['expire']=time()+(30*60);

    }else{
        $_SESSION['expire']=0;

    }

    $phase1=false;
    $phase2=true;
    unset($_POST);
}
if (isset($_POST["back"]) || $_SESSION["expire"]< time()) {
    if ($_SESSION["expire"]< time()) {
        ?>
            <script>
                window.alert("code expired")
            </script>
        <?php 
    }
    $phase1=true;
    $phase2=false;
    $phase3=false;
    unset($_POST);
}

if (isset($_POST["phase2"])) {
    if (isset($_POST["code_receive"])) {
        $code = $_POST["code_receive"];
        if (trim($code)===trim($_SESSION["code"])) {
            ?>
                <script>
                    window.alert("now reset your password")
                </script>
            <?php
            $phase1=false;
            $phase2=false;
            $phase3=true;
        }else{
            ?>
            <script>
                window.alert("error")
            </script>
            <?php
        }
    }

    unset($_POST);
}
if (isset($_POST["phase3"]) ) {

    $username = $_SESSION["username_reset"];
      
    if (!($_POST['newPassword-confirm']===$_POST['newPassword'])) {
        echo"password are diffrent";
        exit;
    }
    $updateQry = 'UPDATE login_admin SET pass = "'.$_POST["newPassword"].'" WHERE username = "'.$_SESSION['username_reset_admin'].'"';
    $updateStmt = $conn->prepare($updateQry);
    if ($updateStmt->execute()) {
        header("location: index.php");
    }

    $phase1=true;
    $phase2=false;
    $phase3=false;
    unset($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body>
    <?php 
        if($phase1==true):
    ?>
<form action="verfier-admin-code.php" class="form-control p-3 m-3 " method="post">
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
                name="phase1"
                value="true"
                type="submit"
                class="btn btn-primary"
            >
                Submit
            </button>
            
        </form>
    <?php 
        elseif($phase2==true):
    ?>
        <form action="verfier-admin-code.php" class="form-control p-3 m-3 " method="post">
            <div class="mb-3">
                <label for="" class="form-label">verifcation code</label>
                <input
                    type="text"
                    class="form-control"
                    name="code_receive"
                    id="code_receive"
                    aria-describedby="helpId"
                    placeholder=""
                />
                <small id="helpId" class="form-text text-muted">the code in your email</small>
            </div>
           
            <div>
                <input type="text" class="d-none" name="trap">
            </div>

            <button
                type="submit"
                name="phase2"
                class="btn btn-primary"
            >
                Submit
            </button>
            <button
                type="submit"
                name="back"
                class="btn btn-outline-primary"
            >
                back
            </button>
        </form>
    <?php 
        elseif($phase3==true):
    ?>
        <form action="./verfier-admin-code.php" method="post" class="p-3 md-3">
            
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" class="form-control" name="newPassword">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm New Password</label>
              <input type="password" class="form-control" name="newPassword-confirm">
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="phase3" >Change Password</button>
          </form>
    <?php 
        endif;
    ?>
</body>
</html>