<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
try{
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

            if(!isset($_POST["pBarcode"]) || $_POST["pBarcode"]=="")
                $msg="Barcode Not Valid";

            if(!isset($_POST["pExDate"]) || $_POST["pExDate"]=="")
                $msg="Expire date Not Valid";



            if($msg==""){
                $query="UPDATE `medecine` set `Description`=?,`Barcode`=?, `ExDate`=?  WHERE `id`=?";

                $rs= $db->prepare($query);
                $rs->execute( array( $_POST["pDescription"],$_POST["pBarcode"], $_POST["pExDate"],$id));

                header('location:Medecines.php');
            }
        }
    }   else{
        if(isset($_GET["pID"])){
            $id=$_GET["pID"];
            include("config.php");
            $query="SELECT `id`, `Description`, `ExDate`, `Barcode` FROM `medecine` WHERE `id`='$id'";

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