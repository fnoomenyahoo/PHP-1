<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }

  $msg="";
  if(isset($_GET["aId"]))
    {
 $msg="Appointment Not Valid";
    }




if($msg==""){
    $id=$_GET["aId"];
include("config.php");
$query="";
if($_SESSION["type"]=="Hospital")
{

    $query="update `appointment` set `Status`= 3 where id='$id'";

}else{
    if($_SESSION["type"]=="Patient")
    {
        $query="update `appointment` set `Status`= 2 where id='$id'";
    }
}



$rs= $db->prepare($query);
$rs->execute();
    header('location:../Appointments.php');
}
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>