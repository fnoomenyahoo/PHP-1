<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
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

 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $ppword=substr( str_shuffle( $chars ), 0, 8 );
 $password =md5( $ppword );



    if($msg==""){
        include("config.php");
        $rs=$db->query("select count(*) from user where username='".$_POST["pusername"]."'");
        $r=$rs->fetchColumn();

        if($r!="0"){
            $msg ="User Name Already Exists";
        }else{
            $query="INSERT INTO `user`(  `username`, `password`, `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`,`relatedId`) VALUES (?,?,?,?,?,?,?,?,?,?)";

            $rs= $db->prepare($query);
            $p=array($_POST["pusername"],$password,$_POST["ptype"],1,$_POST["pF_name"],
                                $_POST["pEmail"],$_POST["pAddress"],$_POST["pTelephone"],0,$_POST["prelatedId"]);
            $d=$rs->execute($p );

            echo 'Password:'.$ppword.'';  //not showing an alert box.

            include_once('../mailgmail/class.phpmailer.php');
            $mail = new PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "minestryofhealth@gmail.com";
            $mail->Password = "bah@@123";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->From = "minestryofhealth@gmail.com";
            $mail->FromName = "Ministry Of health";
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );

            $mail->addAddress($_POST["pEmail"], $_POST["pF_name"]);
            $mail->isHTML(true);
            $mail->Subject = "Create Account";
            $mail->Body = '<h2>Ministry Of health</h2><p>Weleco <b>'.$_POST["pF_name"].'<b> to <i> Ministry of Health</i><br/><br/> User Name is :<i>'.$_POST["pusername"].'</i><br/><br/>Password is :<i>'.$ppword.'</i>  </p>';
            $mail->AltBody = "This is the plain text version of the email content";

            if(!$mail->send())
            {
                echo "Mailer Error: ";
            }
            else
            {
                echo "Message has been sent successfully";
            } 
            header('location:Users.php');
        }
}
    echo $msg;
}
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>