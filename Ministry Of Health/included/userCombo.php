<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    $id= $_SESSION["relatedId"];

include("config.php");
$query="SELECT `id`,  `F_name`, `Email`  FROM `user` WHERE id<>' $id'  ";
$op='';
        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {

            $op=$op. '<option value="'.$row["id"].'">'.$row["F_name"].'('.$row["Email"].')'.'</option>';


        }
        echo $op;
}
catch(Exception $e) {
echo 'Message: ' .$e->getMessage();
	  //echo 'Message: Error Saving' ;
}

?>