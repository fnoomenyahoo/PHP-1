<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pResponse"]) || isset($_POST["pPatientID"])){

        include("config.php");

        $pId=0;

        if(isset($_POST["pPatientID"]))
            $pId=$_POST["pPatientID"];


        include("config.php");
        $query="INSERT INTO `bloodTest`(`HospitalID`, `PatientID`, `date`, `Status`,`Response`) VALUES (?,?,now(),0,?)";

        $rs= $db->prepare($query);
        $rs->execute( array( $_SESSION["relatedId"], $pId,$_POST["pResponse"]));
        $msg="Blood Test Success Asked";
        header('location:BloodTests.php');

    }

    }catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>