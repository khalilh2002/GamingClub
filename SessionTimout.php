<?php
    session_start();
    $timeout = 30 * 60 ;//30min 
    if (isset($_SESSION["last_activity"],$_SESSION["id"],$_SESSION["username"])) {
        if ( (time()-$_SESSION["last_activity"]) > $timeout) {
            session_unset();
            session_destroy();
            header("location: login.php");

        }
    }else {
        header("Location: login.php"); 
        exit();
    }
    $_SESSION['last_activity'] = time();
    session_write_close();

?>