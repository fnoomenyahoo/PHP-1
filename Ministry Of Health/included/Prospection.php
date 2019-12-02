<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["ppatientID"])){

        include("config.php");

        $msg="";
        if(!isset($_POST["ppatientID"]) || $_POST["ppatientID"]=="")
            $msg="Patient Not Valid";

        $pStatus=1;

        if($msg==""){
            include("config.php");
            $query="INSERT INTO `prospectionhd`(  `HospitalID`, `patientID`, `pharmacyID`, `Status`, `EntryDate`) VALUES (?,?,0,1,NOW())";

            $rs= $db->prepare($query);
            $rs->execute( array( $_SESSION["relatedId"], $_POST["ppatientID"] ));

            $id= $db->lastInsertId();
            if($id){

                header('location:ProspectionDetails.php?oID='.$id);
            }else{
                echo "Prospection Not Inserted";
            }

        }else{
            echo $msg;
        }

    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //	echo 'Message: Error Saving' ;
}

?>