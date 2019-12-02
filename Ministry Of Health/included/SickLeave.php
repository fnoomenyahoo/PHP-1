<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pPatientID"])){

include("config.php");

$msg="";
if(!isset($_POST["pPatientID"]) || $_POST["pPatientID"]=="")
	$msg="Patient Not Valid";

if(!isset($_POST["pdate"]) || $_POST["pdate"]=="")
	$msg="Date Not Valid";


if(!isset($_POST["pdays"]) || $_POST["pdays"]=="")
	$msg="Days Not Valid";


if($msg==""){
    include("config.php");
    $query="INSERT INTO `sickleave`(`HospitalID`,`PatientID`, `date`, `days`,`EntryDate`) VALUES (?,?,?,?,now())";

        $rs= $db->prepare($query);
        $rs->execute( array( $_SESSION["relatedId"],  $_POST["pPatientID"], $_POST["pdate"], $_POST["pdays"]));
        echo("Saved Success");
}else{echo $msg;}
    }
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>