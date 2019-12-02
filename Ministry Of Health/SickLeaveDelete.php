<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) ||  $_SESSION["type"]!="Hospital")
{
    header('location:login.php');
}
?>
<?php $currForm="Medecines";?>
<?php include("included/SickLeaveDelete.php") ?>
 
 
