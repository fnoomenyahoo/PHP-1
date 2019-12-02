<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

     if(!isset($_SESSION["ID"])||($_SESSION["type"]!="Hospital" && $_SESSION["type"]!="Pharmacy") )
    {
        header('location:login.php');
    }

    if(isset($_GET["pID"])){

include("config.php");

$msg="";
if(!isset($_GET["pID"]) || $_GET["pID"]=="")
	$msg="Prospection Not Valid";


if($msg==""){
    include("config.php");
    $id=$_GET["pID"];
    if($_SESSION["type"]=="Hospital")
        $query="delete from `prospectiontran` where id='$id' and Recived='0' && prospectionId  not in (select prospectionhd.id from prospectionhd where prospectionhd.Status='Valid')";
    else
        $query="update `prospectiontran` set Recived='1' where id='$id' and Recived='0';
update `prospectionhd` set Status=2 where  prospectionhd.id in (select prospectiontran.prospectionId from prospectiontran where prospectiontran
.id='$id')";

if($msg==""){
$rs= $db->prepare($query);
if($rs->execute())

     header('location:ProspectionDetails.php?oID='.$_GET["oID"]);
 }else{
     echo "Prospection Not Inserted";
 }
}else{
    echo $msg;
}
}
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>