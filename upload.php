
<?php
    require_once "./connect.php";
    if (isset($_POST["data_type"])) {
        # code...
        switch ($_POST["data_type"]) {
            case 'admin-tournaments-add':
                add_tournament($conn);
                break;
            case 'admin-news-add':
                add_news($conn);
                break;
            case 'register':
                add_user($conn);
                    break;
            default:
                # code...
                break;
        }
    }
    if ($_GET["n"]==200) {
        session_start();
        $_POST["first_name"]=$_SESSION["first_name"];
        $_POST["last_name"]=$_SESSION["last_name"];
        $_POST["email"]=$_SESSION["email"];
        $_POST["username"]=$_SESSION["username"];
        $_POST["password"]=$_SESSION["password"];

        $_POST["submit"]="ok";
        add_user($conn);
        
        session_unset();
        session_destroy();
    }
    
    

    function add_user($conn){
        echo "you are user";
        
        if (isset($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["username"],$_POST["password"] ,$_POST["submit"])){
            
            $first_name=$_POST["first_name"];
            $last_name=$_POST["last_name"];
            $email=$_POST["email"];
            $username=$_POST["username"];
            $password=$_POST["password"];
            $last_id = add_login($conn , $username , $password);
            $qry = 'INSERT INTO users (first_name , last_name,email,id_login)
                VALUES( "'.$first_name.'" , "'.$last_name.'","'.$email.'",'.$last_id.' )';
            $stmt = $conn->prepare($qry);
            if ($stmt->execute()){
                header("location: ./login.php");
            }else{
                echo "error in users id";
            }
        }else{
            echo "not in";
        }
    }
    function add_login($conn,$username , $password){
        $qry = 'INSERT INTO login (username , pass)
                VALUES( "'.$username.'" , "'.$password.'" )';

        $stmt = $conn->prepare($qry);

        if ($stmt->execute()) {
            $qry = 'SELECT id_login FROM login 
                    WHERE username = "'.$username.'"  AND pass ="'.$password.'" ';
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]["id_login"];


        }
    }

    function add_news($conn){
        if (isset($_POST["news_title"] , $_POST["news_body"] , $_POST["submit"])) {
            $title = $_POST["news_title"];
            $body = $_POST["news_body"];
            $currentTime = date('d-m-Y');


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
    

    function add_tournament($conn){
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

                $card_link = "./tournament-new-pages/$card_title".time().".php";
                $card_img = $filepath;
            
                echo"its okey it move";

                $qry = 'INSERT into tournament_img (card_title , card_text , link, img_name ,img_path)
                        VALUES("'.$card_title.'","'.$card_text.'","'.$card_link.'","'.$fileName.'","'.$filepath.'");';
                echo $qry;
                
                $stmt = $conn->prepare($qry);
                if (!$stmt->execute()) {
                    exit; 
                }
                $url = "./tournament-new-pages/generator.php?";
                $url .= "title=".urlencode("$card_title".time().".php");
                $url .= "&card_title=".urlencode($card_title);
                $url .= "&card_text=".urlencode($card_text);
                echo $url;
                
                header("location: $url");

                
            
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
        //header('location: admin-tournaments.php');
    }
    
    
?>  

