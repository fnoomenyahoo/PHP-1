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
        $query="SELECT `id`, `FName`, `Tel`, `Tel2`, `Address`, `nationalId`, `Email`, `Status`, `Natianlity`, `ContactName`, `ContactTel`, `Assurance` FROM `patient` WHERE 1";

        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {
	$t=' class="bg-light"';
	$s='Active';
	if($row["Status"]=="0")
	{$t=' class="bg-danger"';
	$s='InActive';
	}
    $managment="";
    if($_SESSION["type"]!="Hospital")
    $managment=
        '<a class="btn btn-sm" href="PatientEdit.php?pID='.$row["id"].'">Edit</a>
        <a class="btn btn-sm" href="PatientDelete.php?pID='. $row["id"].'">Delete</a>
        <a class="btn btn-sm" href="User.php?type=Patient&uID='. $row["id"].'"  >Add User</a>';
?>
<tr <?php echo $t; ?>>
    <td>
        <?php echo $row["FName"]; ?>
    </td>
    <td>
        <?php echo $row["Tel"]; ?>
    </td>
    <td>
        <?php echo $row["nationalId"]; ?>
    </td>
    <td>
        <?php echo $s; ?>
    </td>
    <td>
        <a class="btn btn-sm" href="PatientDetails.php?pID=<?php echo $row["id"]; ?>">Detail</a>
        <?php echo $managment; ?>
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