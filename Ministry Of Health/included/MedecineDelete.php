<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
try{
    if(!isset($_SESSION["ID"]))
{
 	header('location:login.php');
}

        if(isset($_GET["pID"])){
            $id=$_GET["pID"];
            include("config.php");
            $query="DELETE FROM `medecine` WHERE `id`='$id'";

            $results= $db->query($query);
?>
<script> alert("Record Delete Success");</script>
<?php
        }

        header('location:Medecines.php');
}
catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
	 //echo 'Message: Error Saving' ;
}

?>