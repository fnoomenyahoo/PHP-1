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
        $query="SELECT `id`, `username`,  `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept` FROM `user`  ";

         $results= $db->query($query);
while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	$t=' class="bg-light"';
	$s='Active';
	if($row["Status"]=="0")
	{$t=' class="bg-danger"';
	$s='InActive';
	}

?>
<tr >
    <td>
        <?php echo $row["F_name"]; ?>
    </td>
    <td>
        <?php echo $row["Telephone"]; ?>
    </td>
    <td>
        <?php echo $row["type"]; ?>
    </td>
    <td>
        <?php echo $s; ?>
    </td>
    <td>
        <a class="btn btn-sm" href="UserDetails.php?pID=<?php echo $row["id"]; ?>">Show</a>
        <a class="btn btn-sm" href="UserEdit.php?pID=<?php echo $row["id"]; ?>">Edit</a>
        <a class="btn btn-sm" href="UserDelete.php?pID=<?php echo $row["id"]; ?>">Delete</a>
         
    </td>
</tr>
<?php
}
	 
 
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}
?>