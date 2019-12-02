<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_POST["pID"]))
    {
        $id=$_POST["pID"];
        if(isset($_POST["pusername"]))
        {

            $msg="";
            if(!isset($_POST["pusername"]) || $_POST["pusername"]=="")
                $msg="User Name Not Valid";

            if(!isset($_POST["ptype"]) || $_POST["ptype"]=="")
                $msg="User Type Not Valid";

            if(!isset($_POST["pF_name"]) || $_POST["pF_name"]=="")
                $msg="Full Name Not Valid";

            if(!isset($_POST["pAddress"]) || $_POST["pAddress"]=="")
                $msg="Address Not Valid";

            if(!isset($_POST["pEmail"]) || $_POST["pEmail"]=="")
                $msg="Email Not Valid";

            if(!isset($_POST["pTelephone"]) || $_POST["pTelephone"]=="")
                $msg="Phone Not Valid";

            if(!isset($_POST["prelatedId"]) || $_POST["prelatedId"]=="")
                $msg="Related Not Valid";

            //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            //$ppword=substr( str_shuffle( $chars ), 0, 6 );
            //$password =md5( $ppword );



            if($msg==""){
                include("config.php");
                $query="Update `user` set  `username`=?,   `type`=?, `Status`=?, `F_name`=?, `Email`=?, `Address`=?, `Telephone`=?, `pwordAccept`=?,`relatedId`=? where id=?";

                $rs= $db->prepare($query);
                $p=array($_POST["pusername"],$_POST["ptype"],1,$_POST["pF_name"],
                                    $_POST["pEmail"],$_POST["pAddress"],$_POST["pTelephone"],0,$_POST["prelatedId"],$id);
                $d=$rs->execute($p );

                echo 'Password:'.$ppword.'';  //not showing an alert box.


                //header('location:Users.php');
            }
        }
    }else{
        if(isset($_GET["pID"])){
            $id=$_GET["pID"];
            include("config.php");
            $query="SELECT `id`, `username`,  `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`,relatedId FROM `user`  WHERE `id`='$id'";

            $results= $db->query($query);
            $row = $results->fetch(PDO::FETCH_ASSOC);
        }
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>