<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

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
<body class="p-4">
    


<?php
    require_once("./connect.php");
    switch ($_POST["data_type"]) {
        case 'login':
            normal_login($conn);
            break;
        case 'login-admin':
            
            admin_login($conn);
            break;
        default:
            echo " <script> window.alert('the data_type is not been recognized please check the form'); </script> ";
            header("location: ./index.php");
            break;
    }
    

function admin_login($conn){
    if (isset($_POST["username"] , $_POST["password"] , $_POST["data_type"],) && !isset($_POST["reset"]) && $_POST["data_type"]=="login-admin") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $qry = 'SELECT * FROM login_admin where username = "'.$username.'" and pass="'.$password.'";';
        $stmt = $conn->prepare($qry);
        if (!$stmt->execute()) {
            echo " <script> window.alert('there is a problem in db'); </script> ";
            exit;
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result)==1) {
            $_SESSION['id']=$result[0]["id_login_admin"];
            $_SESSION['username']=$result[0]["username"];
            $_SESSION['last_activity'] = time();

            header("location: ./admin.php?id=".$result[0]["id_login_admin"]."");
        }else{
            header("location: ./admin-login/admin-login.php");
            
        }

    }
    else{
        print_r($_POST);
    }
}


function normal_login($conn){
    if (isset($_POST["username"] , $_POST["password"] , $_POST["data_type"]) && $_POST["data_type"]=="login") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $qry = 'SELECT * FROM login where username = "'.$username.'" and pass="'.$password.'";';
        $stmt = $conn->prepare($qry);
        if (!$stmt->execute()) {
            echo " <script> window.alert('there is a problem in db'); </script> ";
            exit;
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) >= 1) {
            //echo " <script> window.alert('you ara in the db'); </script> ";
            if ($username=="admin" || $result[0]["super_user"]==true) {


                $_SESSION["first_time"]=$result[0]["first_time"];
                $_SESSION["username"]=$result[0]["username"];

                
                //admin
                header('location: ./admin-login/admin-login.php');
            }else{
                $_SESSION['id_user']=$result[0]["id_login"];
                $_SESSION['username_user']=$result[0]["username"];
                $_SESSION['logged_in'] = true;
                
                header('location: ./profile.php?id='.$result[0]["id_login"]);
            }
            
        }else{
            header("location: login.php");
        }
    }else{
        print_r($_POST);
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
</body>
</html>