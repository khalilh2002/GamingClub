<?php
    if (isset($_FILES["image"]) && isset($_POST["submit"])) {
        $filepath = "./img/upload/";
        $fileName = basename($_FILES["image"]["name"]);
        $filepath = $filepath."".$fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'],$filepath)) {
            echo"its okey it move";
        }else{
            echo"oh noooooooooooooooooo";
            echo 'Here is some more debugging info:';
            print_r($_FILES);

        }    
    }else{
        echo"
                its not okey;
        ";
    }
    
?>