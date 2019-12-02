<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_GET["pID"])){
        $id=$_GET["pID"];

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $ppword=substr( str_shuffle( $chars ), 0, 6 );
        $password =md5( $ppword );

        if($msg==""){
            include("config.php");
            $query="update `user` set `password`=? where id=?";

            $rs= $db->prepare($query);
            $p=array($password,$id);
            $d=$rs->execute($p );

            echo 'Password changed success : '.$ppword;  //not showing an alert box.
            $query="SELECT `id`, `username`,  `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept` FROM `user`  WHERE `id`='$id'";

            $results= $db->query($query);
            $row = $results->fetch(PDO::FETCH_ASSOC);
            //header('location:Users.php');
        }
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>