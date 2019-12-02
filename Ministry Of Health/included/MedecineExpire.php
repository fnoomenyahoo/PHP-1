<?php

if($_SESSION["type"]=="Pharmacy")
{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    include("config.php");
    $MedExp="";

    $query="Select count(*) as cnt from Medecine where ExDate<= NOW() ";
    $results= $db->query($query);
    $row = $results->fetch(PDO::FETCH_ASSOC);
    if($row)
    {
        if($row['cnt']>0)
            $MedExp="Have ".$row['cnt']." Medecine Expire";
    }
}