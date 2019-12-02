<?php
try{

     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pReciver_Id"]))
    {
        include("config.php");

        $msg="";
        if(!isset($_POST["pReciver_Id"]) || $_POST["pReciver_Id"]=="")
            $msg="Recived Not Valid";

        if(!isset($_POST["pMessage"]) || $_POST["pMessage"]=="")
            $msg="Expire date Not Valid";


        $query="INSERT INTO `messages`(  `Reciver_Id`, `Sender_Id`, `Subject`, `Message`, `sendDate`, `isRead`) VALUES (?,?,?,?,NOW(),0)";
        if($msg==""){
            $rs= $db->prepare($query);
            $rs->execute( array( $_POST["pReciver_Id"],  $_SESSION["ID"], $_POST["pSubject"], $_POST["pMessage"]));
            echo 'Mail Send Successfully';
        }else{
            echo $msg;
        }
    }
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
//	echo 'Message: Error Saving' ;
}

?>