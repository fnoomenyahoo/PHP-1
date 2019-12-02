<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
try{
//if(!isset($_SESSION["ID"]))
	$title ="<h2>Patients List</h2>";
 
        include("config.php");
        $query="SELECT prospectionhd.`id`, `HospitalID`, `patientID`, `pharmacyID`, prospectionhd.`Status`, `EntryDate`,hospital.Description as hospitalName,patient.FName as patienName FROM `prospectionhd` inner JOIN hospital on hospital.id=HospitalID INNER JOIN patient on patient.id=patientID left OUTER join pharmacy on pharmacy.id=pharmacyID
WHERE 1";

        if(isset($_GET["pID"]) && $_GET["pID"]!="")
        {
            $id= $_GET["pID"];
            $query="SELECT prospectionhd.`id`, `HospitalID`, `patientID`, `pharmacyID`, prospectionhd.`Status`, `EntryDate`,hospital.Description as hospitalName,patient.FName as patienName FROM `prospectionhd` inner JOIN hospital on hospital.id=HospitalID INNER JOIN patient on patient.id=patientID left OUTER join pharmacy on pharmacy.id=pharmacyID
WHERE patientID='$id'";


        }
        if($_SESSION["type"]=="Patient")
        {
            $id= $_SESSION["relatedId"];
            $query="SELECT prospectionhd.`id`, `HospitalID`, `patientID`, `pharmacyID`, prospectionhd.`Status`, `EntryDate`,hospital.Description as hospitalName,patient.FName as patienName FROM `prospectionhd` inner JOIN hospital on hospital.id=HospitalID INNER JOIN patient on patient.id=patientID left OUTER join pharmacy on pharmacy.id=pharmacyID
WHERE patientID='$id' and  prospectionhd.Status=2";
        }

        //echo $query;

        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {
	$t=' class="bg-light"';
	$s='Not Recived';
	if($row["Status"]=="0")
	{$t=' class="bg-danger"';
	$s='InActive';
	}
    if($row["Status"]=="2")
	{
        $t=' class="bg-success"';
        $s='Recived';
	}


?>
<tr <?php echo $t; ?>>
    <td>
        <?php echo $row["hospitalName"]; ?>
    </td>
    <td>
        <?php echo $row["patienName"]; ?>
    </td>
    <td>
        <?php echo $row["EntryDate"]; ?>
    </td>
    <td>
        <?php echo $s; ?>
    </td>
    <td>
        <a class="btn btn-sm" href="ProspectionDetails.php?oID=<?php echo $row["id"]; ?>">Details</a> 
    </td>
</tr>
<?php
}

 
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>