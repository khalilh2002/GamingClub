<?php
    require_once "./connect.php";

    switch ($_POST["data_type"]) {

        case 'admin-tournaments-remove':
            delete_tournament($conn);
            break;

        case 'admin-news-remove':
            delete_news($conn);
                break;
        case 'admin-users-remove':
            delete_user($conn);
                break;
        default:
            # code...
            break;
    }
    function delete_user($cdd){
        include "./connect.php";

        if (isset($_POST['data_type'] , $_POST["user_remove"]) && $_POST['data_type']=='admin-users-remove') {
            
            $id_login = $_POST["user_remove"];
            $qry = "DELETE FROM users WHERE id_login =".$id_login;
            $stmt = $conn->prepare($qry);
            $stmt->execute();

            $qry = "DELETE FROM login WHERE id_login =".$id_login;
            $stmt = $conn->prepare($qry);
            
            if($stmt->execute()){
                header('location: ./admin-users.php');
            }
            
        }elseif(isset($_POST['data_type'] , $_POST["user_super"]) && $_POST['data_type']=='admin-users-remove'){
            $id = $_POST["user_super"];
            $qry = "UPDATE login set super_user=true where id_login=$id";
            $stmt = $conn->prepare($qry);
            if($stmt->execute()){
                header('location: ./admin-users.php');
            }
        }
    }


    function delete_news($conn){
        if (isset($_POST["id_news"])) {
            $id = $_POST["id_news"];

            $qry = 'DELETE FROM news WHERE id_news="'.$id.'"'; 
            $stmt = $conn->prepare($qry);
            if (!$stmt->execute()) {
                echo $stmt->errorInfo();
            }else{
                header('location: admin-news.php');
            }
        }
    }

    function delete_tournament($conn){

        if (isset($_POST["id_tournament"])) {

            $id = $_POST["id_tournament"];
            
            //remove image from folder
            $qry = 'SELECT * FROM tournament_img WHERE id_tournament="'.$id.'"';
            $stmt = $conn->prepare($qry);

            if ($stmt->execute()) {

                $img = $stmt->fetchAll(PDO::FETCH_ASSOC);
                unlink($img[0]['img_path']);
                unlink($img[0]["link"]);

            }else {
                echo $stmt->errorInfo();
            }
            
            //remove from database
            $qry = 'DELETE FROM tournament_img WHERE id_tournament="'.$id.'"'; 
            $stmt = $conn->prepare($qry);
            if (!$stmt->execute()) {
                echo $stmt->errorInfo();
            }else{
                header('location: admin-tournaments.php');
            }
            
        }
    }
    
    
    

?>