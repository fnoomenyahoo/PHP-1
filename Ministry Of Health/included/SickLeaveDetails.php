<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_GET["pID"])){

        include("config.php");
        $id=$_GET["pID"];


        include("config.php");
        $query="SELECT sickleave.`id`, `HospitalID`, `PatientID`, `date`, `days`, `EntryDate` ,patient.FName as PName,hospital.Description as HName
FROM `sickleave`
INNER JOIN `patient` on patient.id=PatientID
INNER JOIN `hospital` on hospital.id= HospitalID
WHERE sickleave.`id`='$id'";
        $rs=   $db->query($query);
        $row=$rs->fetch();

    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //	echo 'Message: Error Saving' ;
}

?>