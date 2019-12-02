<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

     if(!isset($_SESSION["ID"]) ||($_SESSION["type"]!="Patient" && $_SESSION["type"]!="Hospital"))
    {
        header('location:login.php');
    }
    if(isset($_GET["aID"])){
        include("config.php");

        //$msg="";
        //if(!isset($_POST["pHospitalID"]) || $_POST["pHospitalID"]=="")
        //    $msg="Description Not Valid";

        //if(!isset($_POST["pPDate"]) || $_POST["pPDate"]=="")
        //    $msg="Barcode Not Valid";

        //if(!isset($_POST["pPTimen"]) || $_POST["pPTimen"]=="")
        //    $msg="Expire date Not Valid";

        //$query="Select count(*) cnt from hospital where id='". $_POST["pHospitalID"]."' and openh1 <='".$_POST["pPTimen"]."' and openh2>'".$_POST["pPTimen"]."'";
        //echo $query;
        //$rs= $db->query($query);
        //$cnt = $rs->fetchColumn();
        //if($cnt=="0" ){
        //    $msg="Time date Not Valid";
        //}

        //if($msg==""){

            $id=$_GET["aID"];
            if($_SESSION["type"]=="Hospital")
            $query="Update `appointment`  set `Status`=3 where id='$id'";

            if($_SESSION["type"]=="Patient")
                $query="Update `appointment`  set `Status`=2 where id='$id'";

             
            $rs= $db->query($query);


        //}else
        //    echo $msg;
    }
    header('location:../Appointments.php');
}
catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>