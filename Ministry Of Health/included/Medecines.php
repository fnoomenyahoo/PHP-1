<?php

try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    //if(!isset($_SESSION["ID"]))
	$title ="<h2>Medecines List</h2>";





    include("config.php");
    $query="SELECT `id`, `Description`, `ExDate`, `Barcode` FROM `medecine` WHERE 1";

    $results= $db->query($query);
    while ($row = $results->fetch(PDO::FETCH_ASSOC))
    {
        $t=' class="bg-light"';
        $s='Active';
        if($row["ExDate"]<=date("Y-m-d"))
        {
            $t=' class="bg-danger"';
            $s='InActive';
        }

        //$m=$m+'
        //<tr'+$t+' ><td>'+$dr["Barcode"]+'</td>
        // <td>'+$dr["Description"]+'</td>
        // <td>'+$dr["ExDate"]+'</td>

        //    <td><a  class="btn btn-sm" href="Pharmacy?ID='+$dr["ID"]+'">Edit</button></td>

        // </tr>';
?>
<tr <?php echo $t; ?>>
    <td>
        <?php echo $row["Barcode"]; ?>
    </td>
    <td>
        <?php echo $row["Description"]; ?>
    </td>
    <td>
        <?php echo $row["ExDate"]; ?>
    </td>

    <td>
        <a class="btn btn-sm" href="MedecineDetails.php?pID=<?php echo $row["id"]; ?>">Detail</a>
        <a class="btn btn-sm" href="MedecineEdit.php?pID=<?php echo $row["id"]; ?>">Edit</a>
        <a class="btn btn-sm" href="MedecineDelete.php?pID=<?php echo $row["id"]; ?>">Delete</a>
    </td>
</tr>
<?php
    }

}
catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>