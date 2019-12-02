<?php
 $msg="";
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
     
     if(!isset($_SESSION["ID"]) ||($_SESSION["type"]!="Patient"  ))
    {
        header('location:login.php');
    }
    
    if(isset($_POST["pHospitalID"])){
        include("config.php");

       
        if(!isset($_POST["pHospitalID"]) || $_POST["pHospitalID"]=="")
            $msg="Description Not Valid";

        if(!isset($_POST["pPDate"]) || $_POST["pPDate"]=="")
            $msg="Barcode Not Valid";

        if(!isset($_POST["pPTimen"]) || $_POST["pPTimen"]=="")
            $msg="Expire date Not Valid";

        $query="Select count(*) cnt from hospital where id='". $_POST["pHospitalID"]."' and openh1 <='".$_POST["pPTimen"]."' and openh2>'".$_POST["pPTimen"]."'";
        //echo $query;
        $rs= $db->query($query);
        $cnt = $rs->fetchColumn();
        if($cnt=="0" ){
            $msg="Time date Not Valid";
        }

        if($msg==""){

            $query="select count(*) cnt from  `appointment` where   `HospitalID`='".$_POST["pHospitalID"]."' and `PDate`='".$_POST["pPDate"]."' and
`Status` ='Valid' AND `PTimen`='".$_POST["pPTimen"]."'";
            echo $query;
            $rs=$db->query($query);
            $r=$rs->fetchColumn();
            if($r!=0){
                $msg="Sorry this date Is Already Selected"   ;
            }else{ 
                $query="INSERT INTO `appointment`(  `HospitalID`, `patientID`, `PDate`, `Status`, `PTimen`) VALUES (?,?,?,1,?)";
                echo $query;
                $rs= $db->prepare($query);
                $rs->execute( array( $_POST["pHospitalID"], $_SESSION["relatedId"],$_POST["pPDate"], $_POST["pPTimen"]));
                header('location:Appointments.php');
            }
        }else
           
    }
}catch(Exception $e) {
 $msg= 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}
echo $msg;
?>