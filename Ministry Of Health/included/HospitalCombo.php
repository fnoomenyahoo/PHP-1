<?php
try{ 
?> 
      <option value="">Select Hospital</option>
            <?php
include("config.php");
$query="select id,`Description` from  `hospital`  ";

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