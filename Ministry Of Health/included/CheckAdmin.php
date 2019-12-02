<?php
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["type"]) ||$_SESSION["type"]!="Administrator")
    {
        header('location:../admin/login.php');
    }
?>