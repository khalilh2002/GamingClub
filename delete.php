<?php
    if (isset($_POST["btn"])) {
        echo "<h1>btn  id ".$_POST["btn"]."</h1>";
        $id = $_POST["btn"];
        include "./connect.php";
        $qry = 'DELETE FROM tournament_img where id_tournament="'.$id.'"'; 
        $stmt = $conn->prepare($qry);
        $stmt->execute();
        header('location: admin-tournaments.php');
    }

?>