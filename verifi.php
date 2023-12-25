<?php
session_start();

if(!isset($_SESSION["admin_logged_in"]) || !$_SESSION["admin_logged_in"]){
    session_destroy();
    header("Location: login.php");
exit();
}

?>