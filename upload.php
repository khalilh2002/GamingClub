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
    if (isset($_FILES["image"], $_POST["card_title"],
        $_POST["card_text"] , $_POST["link"] ,$_POST["submit"] )) 
        {

        $filepath = "./img/upload/";
        $fileName = basename($_FILES["image"]["name"]);
        $filepath = $filepath."".$fileName;


        if (move_uploaded_file($_FILES['image']['tmp_name'],$filepath)) {
            
            $card_title = $_POST["card_title"];
            $card_text = $_POST["card_text"] ;
            $card_link = $_POST["link"] ;
            $card_img = $filepath;
          
            echo"its okey it move";
            include "./connect.php";
            $qry = 'INSERT into tournament_img (card_title , card_text , link, img_name ,img_path)
                     VALUES("'.$card_title.'","'.$card_text.'","'.$card_link.'","'.$fileName.'","'.$filepath.'");';

            $stmt = $conn->prepare($qry);
            $stmt->execute();


            echo'
            <div class="row">
                <div class="col-4">
                    <div class="card h-100">
                    <img src="'.$card_img.'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">'.$card_title.'</h5>
                    <p class="card-text">'.$card_text.'
                    <a href="'.$card_link.'" class="btn btn-primary">Visit Link</a>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">'.$card_img.'</small>
                    </div>
                </div>
                </div>
            </div>
          ';
          



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
    
</body>
</html>
