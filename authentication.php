<?php
    session_start();
?>

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
    if (isset($_POST["username"] , $_POST["password"] , $_POST["data_type"]) && $_POST["data_type"]=="login-admin") {
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

    }else{
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
            if ($username=="admin") {

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
    
?>