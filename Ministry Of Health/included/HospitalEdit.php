<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pID"]))
{
    $id=$_POST["pID"];
    if(isset($_POST["pDescription"])){



        include("config.php");

        $msg="";
        if(!isset($_POST["pDescription"]) || $_POST["pDescription"]=="")
            $msg="Description Not Valid";

        if(!isset($_POST["pTel"]) || $_POST["pTel"]=="")
            $msg="Phone Not Valid";


        if(!isset($_POST["pAddress"]) || $_POST["pAddress"]=="")
            $msg="Address Not Valid";

        if(!isset($_POST["pnationalId"]) || $_POST["pnationalId"]=="")
            $msg="CR Not Valid";

        if(!isset($_POST["pEmail"]) || $_POST["pEmail"]=="")
            $msg="Email Not Valid";



        if(!isset($_POST["pContactName"]) || $_POST["pContactName"]=="")
            $msg="Contact Name Not Valid";

        if(!isset($_POST["pContactTel"]) || $_POST["pContactTel"]=="")
            $msg="Contact Phone Not Valid";

        if(!isset($_POST["popenh1"]) || $_POST["popenh1"]=="")
            $msg="Open Time Not Valid";


        if(!isset($_POST["popenh2"]) || $_POST["popenh2"]=="")
            $msg="Close Time Not Valid";

        $status=1;
        if(isset($_POST["pStatus"]))
            $status=$_POST["pStatus"];
        $poffDay=1;
        if(isset($_POST["poffDay"]))
            $poffDay=$_POST["poffDay"];
        if($msg==""){
            $query="update `hospital` set `Description`=?, `Tel`=?, `Tel2`=?, `Address`=?, `nationalId`=?, `Fax`=?, `Email`=?, `Status`=?, `ContactName`=?, `ContactTel`=?, `openh1`=?, `openh2`=?, `offDay`=? where id=?";

            $rs= $db->prepare($query);
            $rs->execute( array( $_POST["pDescription"], $_POST["pTel"], $_POST["pTel2"], $_POST["pAddress"], $_POST["pnationalId"], $_POST["pFax"], $_POST["pEmail"], $status,  $_POST["pContactName"], $_POST["pContactTel"], $_POST["popenh1"], $_POST["popenh2"], $poffDay,$id));
            header('location:Hospitals.php');
        }
    }
} else{
    if(isset($_GET["pID"])){
        $id=$_GET["pID"];
        include("config.php");
        $query="SELECT `id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel`, `openh1`, `openh2`, `offDay` FROM `hospital` WHERE  `id`='$id'";

        $results= $db->query($query);
        $row = $results->fetch(PDO::FETCH_ASSOC);
    }
}
}catch(Exception $e) {
echo 'Message: ' .$e->getMessage();
	  //echo 'Message: Error Saving' ;
}

?>