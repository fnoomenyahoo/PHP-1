<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
try{

    if(isset($_POST["pID"]))
    {
        $id=$_POST["pID"];
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
                $query="update `patient` set `FName`=?, `Tel`=?, `Tel2`=?, `Address`=?, `nationalId`=?, `Email`=?, `Status`=?, `Natianlity`=?, `ContactName`=?, `ContactTel`=?, `Assurance`=? where id=?";
                if($msg==""){
                    $rs= $db->prepare($query);
                    $rs->execute( array( $_POST["pFName"], $_POST["pTel"], $_POST["pTel2"], $_POST["pAddress"], $_POST["pnationalId"],  $_POST["pEmail"], $pStatus,  $_POST["pNatianlity"],  $_POST["pContactName"], $_POST["pContactTel"], $_POST["pAssurance"] ),$id);
                    header('location:Patients.php');
                }else{
                    echo $msg;
                }
            }
        }

    }else{
        if(isset($_GET["pID"])){
            $id=$_GET["pID"];
            include("config.php");
            $query="SELECT id,  `FName`, `Tel`, `Tel2`, `Address`, `nationalId`, `Email`, `Status`, `Natianlity`, `ContactName`, `ContactTel`, `Assurance` FROM `patient` WHERE `id`='$id'";

            $results= $db->query($query);
            $row = $results->fetch(PDO::FETCH_ASSOC);
        }
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>