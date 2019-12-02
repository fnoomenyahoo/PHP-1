<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(isset($_POST["pusername"]) && isset($_POST["ppassword"]) )
{


	try{


include("config.php");
$msg="";
if(!isset($_POST["pusername"]) || $_POST["pusername"]=="")
	$msg="User Name Not Valid";

if(!isset($_POST["ppassword"]) || $_POST["ppassword"]=="")
	$msg="User Type Not Valid";

    $password =md5($_POST["ppassword"]);

if($msg=="")
{
    if(isset($_POST["adminlog"]))
        $query="select ID, `username`, `password`, `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`,`relatedId` from `user` where  username=? and password=? and Status=1 and type='Administrator'";
    else
        $query="select ID, `username`, `password`, `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`,`relatedId` from `user` where  username=? and password=? and Status=1 and type<>'Administrator'";

$rs= $db->prepare($query);
$rs->execute(  array($_POST["pusername"],$password));
$user = $rs->fetch();
 if($user) {
	  $_SESSION["ID"]=$user["ID"];
	 $_SESSION["type"]=$user["type"];
	 $_SESSION["F_name"]=$user["F_name"];
	 $_SESSION["relatedId"]=$user["relatedId"];

	 if(isset($_POST["pRemember"])&& !empty($_POST["remember"]))
	 {
		 setcookie ("member_username",$user["username"],time()+ (10 * 365 * 24 * 60 * 60));
		 setcookie ("member_password",$user["password"],time()+ (10 * 365 * 24 * 60 * 60));
	 }else{
		 if(isset($_COOKIE["member_username"])){
		 setcookie ("member_username","",time()- (10 * 365 * 24 * 60 * 60));
		 setcookie ("member_password","",time()- (10 * 365 * 24 * 60 * 60));
		 }
	 }
     if($user["pwordAccept"]=="0")
     {
         header('location:ChangePassword.php');

     }else{

         header('location:Mail.php');
     }
 }else{
     $msg= 'User Or Passwor Incorrect';
 }
}
echo $msg;
}catch(Exception $e) {
 echo 'Message: ' .$e->getMessage();
	 //$msg= 'Message: Error Saving' ;
}
}

?> 