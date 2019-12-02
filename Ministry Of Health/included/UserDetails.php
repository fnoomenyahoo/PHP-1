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
        $query="SELECT `id`, `username`,  `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`,relatedId FROM `user`  WHERE `id`='$id'";

        $results= $db->query($query);
        $row = $results->fetch(PDO::FETCH_ASSOC);
    }

}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>