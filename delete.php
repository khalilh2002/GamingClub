<?php
    switch ($_POST["data_type"]) {

        case 'admin-tournaments-remove':
            delete_tournament();
            break;

        case 'admin-news-remove':
                delete_news();
                break;
        default:
            # code...
            break;
    }

    function delete_news(){
        if (isset($_POST["id_news"])) {
            $id = $_POST["id_news"];
            include_once "./connect.php";

            $qry = 'DELETE FROM news WHERE id_news="'.$id.'"'; 
            $stmt = $conn->prepare($qry);
            if (!$stmt->execute()) {
                echo $stmt->errorInfo();
            }else{
                header('location: admin-news.php');
            }
        }
    }

    function delete_tournament(){

        if (isset($_POST["id_tournament"])) {

            $id = $_POST["id_tournament"];
            include_once "./connect.php";
            
            //remove image from folder
            $qry = 'SELECT img_path FROM tournament_img WHERE id_tournament="'.$id.'"';
            $stmt = $conn->prepare($qry);

            if ($stmt->execute()) {

                $img = $stmt->fetchAll(PDO::FETCH_ASSOC);
                unlink($img[0]['img_path']);

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