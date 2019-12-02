<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }


    $id= $_SESSION["relatedId"];

    include("config.php");
    $query="SELECT bloodTest.`id` ,`HospitalID`, `PatientID`, `date`, bloodTest.`Status`,Response,Result,patient.FName as PName, hospital.Description as HName FROM `bloodTest`
INNER JOIN patient on patient.id=PatientID
INNER JOIN hospital on hospital.id=HospitalID
where HospitalID='$id'
Order by id Desc";

    $results= $db->query($query);
    while ($row = $results->fetch(PDO::FETCH_ASSOC))
    {
      

        //$m=$m+'
        //<tr'+$t+' ><td>'+$dr["Description"]+'</td>
        // <td>'+$dr["Tel"]+'</td>
        // <td>'+$dr["nationalId"]+'</td>
        //  <td>'+$s+'</td>
        //    <td><a  class="btn btn-sm" href="Hospital?ID='+$dr["ID"]+'">Edit</button></td>

        // </tr>';

?>
<tr>
    <td><?php echo $row["HName"]; ?>
    </td>
    <td><?php echo $row["PName"]; ?>
    </td>
    <td><?php echo $row["date"]; ?>
    </td>
    <td><?php echo $row["Response"]; ?>
    </td>
    <td><?php if($row["Result"] && rtrim($row["Result"])!="") {echo $row["Result"];}else{echo '<a class="btn btn-sm" href="BloodTestResult.php?pID='.$row["id"].'">Add Result</a>';  } ?>
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