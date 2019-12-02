<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
try{
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }

    if(isset($_GET["pID"])){
        $id=$_GET["pID"];
        include("config.php");
        $query="SELECT transferpatient.`id`, `PatientId`, `HospitalOrgId`, `HospitalRecId`, `Information`, `EntryDate` ,patient.FName as PName,hospital.Description as HName, hospital2.Description as HName2
FROM `transferpatient`
INNER JOIN patient on patient.id=transferpatient.PatientId
INNER JOIN hospital on hospital.id = transferpatient.HospitalOrgId
INNER JOIN hospital as hospital2 on hospital2.id=transferpatient.HospitalRecId
WHERE  transferpatient.`id`='$id'";

        $results= $db->query($query);
        $row = $results->fetch(PDO::FETCH_ASSOC);
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //echo 'Message: Error Saving' ;
}

?>