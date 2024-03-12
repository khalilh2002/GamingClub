<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the homepage or any other appropriate page
header("Location: index.php");
exit;
?>
