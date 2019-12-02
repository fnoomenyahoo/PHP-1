<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pFName"])){

include("config.php");

$msg="";
if(!isset($_POST["pFName"]) || $_POST["pFName"]=="")
	$msg="Full Name Not Valid";

if(!isset($_POST["pTel"]) || $_POST["pTel"]=="")
	$msg="Phone Not Valid";


if(!isset($_POST["pAddress"]) || $_POST["pAddress"]=="")
	$msg="Address Not Valid";

if(!isset($_POST["pnationalId"]) || $_POST["pnationalId"]=="")
	$msg="CPR Not Valid";

if(!isset($_POST["pEmail"]) || $_POST["pEmail"]=="")
	$msg="Email Not Valid";

if(!isset($_POST["pNatianlity"]) || $_POST["pNatianlity"]=="")
	$msg="Natianlity Not Valid";

if(!isset($_POST["pContactName"]) || $_POST["pContactName"]=="")
	$msg="Contact Name Not Valid";

if(!isset($_POST["pContactTel"]) || $_POST["pContactTel"]=="")
	$msg="Contact Phone Not Valid";

//if(!isset($_POST["pAssurance"]) || $_POST["pAssurance"]=="")
	//$msg="Assurance Not Valid";
$pStatus=1;
//if(isset($_POST["pStatus"]))
//    $pStatus=$_POST["pStatus"];
if($msg==""){
    include("config.php");
$query="INSERT INTO `patient`(`FName`, `Tel`, `Tel2`, `Address`, `nationalId`, `Email`, `Status`, `Natianlity`, `ContactName`, `ContactTel`, `Assurance`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
if($msg==""){
$rs= $db->prepare($query);
$rs->execute( array( $_POST["pFName"], $_POST["pTel"], $_POST["pTel2"], $_POST["pAddress"], $_POST["pnationalId"],  $_POST["pEmail"], $pStatus,  $_POST["pNatianlity"],  $_POST["pContactName"], $_POST["pContactTel"], $_POST["pAssurance"] ));
header('location:Patients.php');
}else{
    echo $msg;
}
}
    }
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>