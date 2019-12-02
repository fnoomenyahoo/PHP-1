<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }


 
        include("config.php");
        $query="SELECT `id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel`, `openh1`, `openh2`, `offDay` FROM `hospital` WHERE 1";

        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	$t=' class="bg-light"';
	$s='Active';
	if($row["Status"]=="0")
	{$t=' class="bg-danger"';
	$s='InActive';
	}

     //$m=$m+'
     //<tr'+$t+' ><td>'+$dr["Description"]+'</td>
     // <td>'+$dr["Tel"]+'</td>
     // <td>'+$dr["nationalId"]+'</td>
     //  <td>'+$s+'</td>
     //    <td><a  class="btn btn-sm" href="Hospital?ID='+$dr["ID"]+'">Edit</button></td>

     // </tr>';

?>
<tr <?php echo $t; ?>>
    <td>
        <?php echo $row["Description"]; ?>
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
        <a class="btn btn-sm" href="HospitalDetails.php?pID=<?php echo $row["id"]; ?>">Details</a>
        <a class="btn btn-sm" href="HospitalEdit.php?pID=<?php echo $row["id"]; ?>">Edit</a>
        <a class="btn btn-sm" href="HospitalDelete.php?pID=<?php echo $row["id"]; ?>">Delete</a>
        <a class="btn btn-sm" href="User.php?type=Hospital&uID=<?php echo $row["id"]; ?>"  >Add User</a>
    </td>
</tr>
<?php
}
		 
 
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>