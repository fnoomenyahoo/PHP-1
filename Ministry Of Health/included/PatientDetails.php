<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
try{

    if(isset($_GET["pID"])){
        $id=$_GET["pID"];
        include("config.php");
        $query="SELECT id, `FName`, `Tel`, `Tel2`, `Address`, `nationalId`, `Email`, `Status`, `Natianlity`, `ContactName`, `ContactTel`, `Assurance` FROM `patient` WHERE `id`='$id'";

        $results= $db->query($query);
        $row = $results->fetch(PDO::FETCH_ASSOC);
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>