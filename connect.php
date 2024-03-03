<?php
    $username="root";
    $password="";
    $serverName = "localhost";
    $dbName = "gaming_club";

    $conn;
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$username , $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connected successful";
    } catch (\Throwable $th) {
        echo "". $th->getMessage() ."";
    }

    
?>