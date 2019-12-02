<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pID"]) && $_POST["pResult"] ){

        include("config.php");

        $pId=0;

            $pId=$_POST["pID"];
            if(rtrim( $_POST["pResult"])!="" )
            {


                include("config.php");
                $query="Update `bloodTest`set result=? where id=?";

                $rs= $db->prepare($query);
                $rs->execute( array(  $_POST["pResult"],  $pId));
                echo "Blood Result Success";
            }else{
                  echo "Blood Result Faild";
            }

    } 
   

    }catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
 //	echo 'Message: Error Saving' ;
}

?>