<?php
    require_once("./connect.php");

    switch ($_POST["data_type"]) {
        case 'login':
            normal_login($conn);
            break;
        case 'login-admin':
            admin_login($conn);
        default:
            # code...
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
            header("location: ./admin.php");
        }else{
            header("location: ./admin-login/admin-login.php");
            
        }

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
                header('location: index.php');
            }
            
        }
    }  
}
    
?>