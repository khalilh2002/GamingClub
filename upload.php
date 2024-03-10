
<?php
    switch ($_POST["data_type"]) {
        case 'admin-tournaments-add':
            add_tournament();
            break;
        case 'admin-news-add':
            add_news();
            break;
        default:
            # code...
            break;
    }

    function add_news(){
        if (isset($_POST["news_title"] , $_POST["news_body"] , $_POST["submit"])) {
            $title = $_POST["news_title"];
            $body = $_POST["news_body"];
            $currentTime = date('d-m-Y');


            include_once "./connect.php";
            $qry = 'INSERT INTO news (news_title, news_body, news_date)
                    VALUES("'.$title.'", "'.$body.'", STR_TO_DATE("'.$currentTime.'", "%d-%m-%Y"));';
                
            $stmt = $conn->prepare($qry);

            if ($stmt->execute()) {
                echo"query executed";
                
            }else{
                echo"query error";
            }
            
        }
        header('location: admin-news.php');
    }

    function add_tournament(){
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
                include_once "./connect.php";

                $qry = 'INSERT into tournament_img (card_title , card_text , link, img_name ,img_path)
                        VALUES("'.$card_title.'","'.$card_text.'","'.$card_link.'","'.$fileName.'","'.$filepath.'");';
                echo $qry;
                
                $stmt = $conn->prepare($qry);
                if (!$stmt->execute()) {
                    exit; 
                }
                
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
                please , give all the info
            ";
        }
        header('location: admin-tournaments.php');
    }
    
    
?>  

