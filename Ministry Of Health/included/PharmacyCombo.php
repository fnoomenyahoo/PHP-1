<option value="">Select Pharmacy</option>
<?php
try{ 
include("config.php");
$query="SELECT `id`, `FName`  FROM `pharmacy` WHERE 1  ";

        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
?> 
      <option value="<?php echo $row["id"]; ?>"><?php echo $row["FName"]; ?></option>
            <?php
	 
	}
    //header('location:../hospitals.php');
}
catch(Exception $e) {
echo 'Message: ' .$e->getMessage();
	  //echo 'Message: Error Saving' ;
}

?>