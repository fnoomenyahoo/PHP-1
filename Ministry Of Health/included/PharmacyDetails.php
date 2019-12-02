<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    
        if(isset($_GET["pID"])){
            $id=$_GET["pID"];
              include("config.php");
        $query="SELECT `id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel` FROM `pharmacy` WHERE id='$id'";

        $results= $db->query($query);
        $row = $results->fetch(PDO::FETCH_ASSOC);

        }
     
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();

	//echo 'Message: Error Saving' ;
}

?>