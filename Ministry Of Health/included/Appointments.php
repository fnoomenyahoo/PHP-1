<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
try{
    //if(!isset($_SESSION["ID"]))
	$title ="<h2>Patients List</h2>";
 $id= $_SESSION["relatedId"];
    $query="SELECT appointment.`id`, `HospitalID`, `patientID`, `PDate`, appointment.`Status`, `PTimen`,patient.FName,hospital.Description
FROM `appointment`
INNER join patient on patient.id=patientID
INNER JOIN hospital on hospital.id=HospitalID WHERE hospital.id='$id'";
//echo $query;
   
    if($_SESSION["type"]=="Hospital")
    {
        $query="SELECT appointment.`id`, `HospitalID`, `patientID`, `PDate`, appointment.`Status`, `PTimen`,patient.FName PName,hospital.Description HName
FROM `appointment`
INNER join patient on patient.id=patientID
INNER JOIN hospital on hospital.id=HospitalID WHERE HospitalID='$id' and appointment.Status<>2";
    }else{
        if($_SESSION["type"]=="Patient")
        {
            $query="SELECT appointment.`id`, `HospitalID`, `patientID`, `PDate`, appointment.`Status`, `PTimen`,patient.FName PName,hospital.Description HName
FROM `appointment`
INNER join patient on patient.id=patientID
INNER JOIN hospital on hospital.id=HospitalID WHERE patientID='$id'";
        }
    }



    include("config.php");


    $results= $db->query($query);
    while ($row = $results->fetch(PDO::FETCH_ASSOC))
    {
        $t=' class="bg-light"';
        $s='Active';
        //if($row["Status"]=="0")
        //{$t=' class="bg-danger"';
        //$s='InActive';
        //}
        $d="";
        if($_SESSION["type"]=="Hospital")
        {
        if($row["Status"]=="valid")
        { 
            $d=' <a class="btn btn-sm" href="included/AppointmentEdit.php?aID='.$row["id"].'">Approved</a>';
            }
            $op='<tr '.$t.'><td>'.$row["PName"].'</td><td>'.$row["Status"].'</td><td>'.$row["PDate"].'</td><td>'.$row["PTimen"].'</td><td>'.$d.'</td>
        </tr>';
        }else{
            if($_SESSION["type"]=="Patient")
            { if($row["Status"]=="valid")
        { 
            $d=' <a class="btn btn-sm" href="included/AppointmentEdit.php?aID='.$row["id"].'">Approved</a>';
            }
                $d=' <a class="btn btn-sm" href="included/AppointmentEdit.php?aID='.$row["id"].'">Cancel</a>';
                $op='<tr '.$t.'><td>'.$row["HName"].'</td><td>'.$row["Status"].'</td><td>'.$row["PDate"].'</td><td>'.$row["PTimen"].'</td><td>'.$d.'</td>
        </tr>';
            }
        }
        echo $op;
    }


}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>