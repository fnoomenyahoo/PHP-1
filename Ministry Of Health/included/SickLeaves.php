<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
     
        include("config.php");
        $id=$_SESSION["relatedId"];


        include("config.php");
        $query="SELECT sickleave.`id`, `HospitalID`, `PatientID`, `date`, `days`, `EntryDate` ,patient.FName as PName,hospital.Description as HName
FROM `sickleave`
INNER JOIN `patient` on patient.id=PatientID
INNER JOIN `hospital` on hospital.id= HospitalID
WHERE sickleave.`HospitalID`='$id'
ORDER by EntryDate DESC";
      
        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {

?>
<tr  >
    <td>
        <?php echo $row["PName"]; ?>
    </td>
    <td>
        <?php echo $row["EntryDate"]; ?>
    </td>
    <td>
        <?php echo $row["date"]; ?>
    </td>
    <td>
        <?php echo $row["days"]; ?> 
    </td>
    <td>
        <a class="btn btn-sm" href="SickLeaveDetails.php?pID=<?php echo $row["id"]; ?>">Detail</a>
         
        <a class="btn btn-sm" href="SickLeaveDelete.php?pID=<?php echo $row["id"]; ?>">Delete</a>
    </td>
</tr>
<?php
        }

}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
    //	echo 'Message: Error Saving' ;
}

?>