<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

    if(!isset($_SESSION["ID"]) ||($_SESSION["type"]!="Hospital"  ))
    {
        header('location:login.php');
    }
    if(isset($_POST["pHospitalRecId"])){

        $id = $_SESSION["relatedId"];
        $msg="";
        if(!isset($_POST["pPatient"]) || $_POST["pPatient"]=="")
            $msg="Patient Not Valid";

        if(!isset($_POST["pHospitalRecId"]) || $_POST["pHospitalRecId"]=="")
            $msg="Hospital Not Valid";

        if(!isset($_POST["pInformation"]) || $_POST["pInformation"]=="")
            $msg="Information Not Valid";

        $query="INSERT INTO `transferpatient`(`PatientId`, `HospitalOrgId`, `HospitalRecId`, `Information`, `EntryDate`) VALUES(?,?,?,?,NOW())";
        //echo $query;


        if($msg==""){
            include("config.php");
            $rs= $db->prepare($query);
            $rs->execute(array($_POST["pPatient"], $id ,$_POST["pHospitalRecId"],$_POST["pInformation"] ));
 
            echo "Patient Transfered Successfuly";
        }else
            echo $msg;
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //	echo 'Message: Error Saving' ;
}

?>