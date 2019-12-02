<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
try{

//if(!isset($_SESSION["ID"]))
	$title ="<h2>Phamacies List</h2>";




        include("config.php");
        $query="SELECT `id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel` FROM `pharmacy` WHERE 1";

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
     //    <td><a  class="btn btn-sm" href="Pharmacy?ID='+$dr["ID"]+'">Edit</button></td>

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
        <a class="btn btn-sm" href="PharmacyDetails.php?pID=<?php echo $row["id"]; ?>">Detail</a>
        <a class="btn btn-sm" href="PharmacyEdit.php?pID=<?php echo $row["id"]; ?>">Edit</a>
        <a class="btn btn-sm" href="PharmacyDelete.php?pID=<?php echo $row["id"]; ?>">Delete</a>
        <a class="btn btn-sm" href="User.php?type=Pharmacy&uID=<?php echo $row["id"]; ?>">Add User</a>
    </td>
</tr>
<?php
}
 
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>