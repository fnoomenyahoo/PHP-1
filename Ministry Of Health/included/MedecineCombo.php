<option value="">Select Medecine</option>
<?php
try{ 
include("config.php");
$query="SELECT `id`, `Description`  FROM `medecine` WHERE medecine.ExDate>now() ";

        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
?> 
      <option value="<?php echo $row["id"]; ?>"><?php echo $row["Description"]; ?></option>
            <?php
	 
	}
    //header('location:../hospitals.php');
}
catch(Exception $e) {
echo 'Message: ' .$e->getMessage();
	  //echo 'Message: Error Saving' ;
}

?>