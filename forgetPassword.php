<?php
    session_start();
    require_once "./connect.php";

    unset($_SESSION["change_password"]);

    if (!isset($_SESSION["reset_status"] , $_SESSION["reset_date_expire"] , $_SESSION["send_once"] , $_SESSION["change_password"])) {
        $_SESSION["reset_status"]=false ;
        $_SESSION["reset_date_expire"]=0;
        $_SESSION["send_once"]=false;
        $_SESSION["change_password"]=false;
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";




    if (!empty($_POST["trap"])) {
        
        echo "error 403";
        exit;
    }

    if (isset($_GET["back"])) {
        session_destroy();
        header("location:forgetPassword.php");
    }



    if (isset($_GET["code_receive"])) {
        $code = $_GET["code_receive"];
        if (trim($code)===trim($_SESSION["code_reset"])) {
            ?>
                <script>
                    window.alert("now reset your password")
                </script>
            <?php
            $_SESSION["change_password"]=true;
        }
    }

    if (isset($_POST["email_reset"] , $_POST["username_reset"],$_SESSION["send_once"]) && $_SESSION["send_once"]==false) {
        $user_reset = $_POST["username_reset"];
        $email_reset = $_POST["email_reset"];
        $_SESSION["username_reset"] = $user_reset;

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
        $_SESSION["reset_date_expire"]=time()+(60*15);
        
        $mail = new PHPMailer(true);
        $user = "spamfake2022@gmail.com";
        $pass = 'gqjxgwtadigppdln';
        $content = $random_code;

        if(sendMail($mail,$user,$pass,$user,$email_reset,"Rest Password",$random_code)){
            $_SESSION["send_once"]=true;
            ?>
                <script>
                    window.alert("message sended verify your email")
                </script>
           <?php 
        }

    }


    if (isset($_POST['changePassword'] ,$_POST['newPassword'],$_POST['newPassword-confirm']) && $_POST["changePassword"]==="change") 
    {
        if (!isset($_SESSION["username_reset"])) {
            session_destroy();
            header("location:forgetPassword.php") ;  
        }
      $username = $_SESSION["username_reset"];
      
      if (!($_POST['newPassword-confirm']===$_POST['newPassword'])) {
        echo"password are diffrent";
        exit;
      }
      $updateQry = 'UPDATE login SET pass = "'.$_POST["newPassword"].'" WHERE username = "'.$_SESSION['username_reset'].'"';
      $updateStmt = $conn->prepare($updateQry);
      if ($updateStmt->execute()) {
        header("location: login.php");
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
        include_once "./navbar.php";
    ?>

    <?php if( $_SESSION["change_password"]==true):?>
        <form action="forgetPassword.php" method="post">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        Change Password
                        </div>
                        <div class="card-body">
                        <form action="./admin-change-password.php" method="post" class="p-3 md-3">
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" name="newPassword">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" name="newPassword-confirm">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="changePassword" value="change">Change Password</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>

        <?php
        $_SESSION["change_password"]=false;

    ?>

    <?php elseif ($_SESSION["reset_status"]===false || ($_SESSION["reset_date_expire"] < time()) ):?>
       
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

    <?php
        elseif($_SESSION["reset_status"]===true && ($_SESSION["reset_date_expire"] >= time()) ):
            
    ?>
        <form action="forgetPassword.php" class="form-control p-3 m-3 " method="get">
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
                name="submit"
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
        
    ?>        
        
        
    <?php
        endif;
    ?>
    
</body>
</html>