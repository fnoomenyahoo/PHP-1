<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
try{
    if(isset($_POST["pDescription"])){
        if(!isset($_SESSION["ID"]))
        {
            header('location:login.php');
        }

        include("config.php");

        $msg="";
        if(!isset($_POST["pDescription"]) || $_POST["pDescription"]=="")
            $msg="Description Not Valid";

        if(!isset($_POST["pBarcode"]) || $_POST["pBarcode"]=="")
            $msg="Barcode Not Valid";

        if(!isset($_POST["pExDate"]) || $_POST["pExDate"]=="")
            $msg="Expire date Not Valid";



        if($msg==""){
            $query="INSERT INTO `medecine`( `Description`,`Barcode`, `ExDate`) VALUES (?,?,?)";

            $rs= $db->prepare($query);
            $rs->execute( array( $_POST["pDescription"],$_POST["pBarcode"], $_POST["pExDate"]));

            header('location:Medecines.php');
        }
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //echo 'Message: Error Saving' ;
}

?>