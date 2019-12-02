<?php

if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["ID"]))
{
    header('location:login.php');
}
if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) )
{
	try{

        include("config.php");
        $msg="";

        if(!isset($_POST["oldPassword"]) || $_POST["oldPassword"]=="")
            $msg="old Password Not Valid";

        if(!isset($_POST["newPassword"]) || $_POST["newPassword"]=="")
            $msg="New Password Not Valid";

        if(!isset($_POST["ConfPassword"]) || $_POST["ConfPassword"]!= $_POST["newPassword"])
            $msg="Password Not Confirmed";

        $oldPassword =md5($_POST["oldPassword"]);
        $newPassword =md5($_POST["newPassword"]);

        if($msg=="")
        {
            $id= $_SESSION["ID"];

            $query="select   `password`,Email,F_name from `user` where  id='$id'";

            $rs= $db->query($query);
            $row=$rs->fetch();

            if($row["password"]!=rtrim($oldPassword,' '))
            {
                $msg='old Password Not Valid';
            }
            else{
                $query="update  `user` set `password` =?,pwordAccept=1 where  id=?";
                $rs= $db->prepare($query);
                $rs->execute(  array($newPassword,$id));
                $msg="Pasword Changed Successfuly";

                include('mailgmail/class.phpmailer.php');
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

                $mail->addAddress($row["Email"], $row["F_name"]);
                $mail->isHTML(true);
                $mail->Subject = "Change Password";
                $mail->Body = '<h2>Ministry Of health</h2><p>Dear, <b>'.$row["F_name"].'<b> <br/><br/>  Pasword Changed Successfuly... </p>';
                $mail->AltBody = "This is the plain text version of the email content";

                if(!$mail->send())
                {
                //    echo "Mailer Error / ";
                }
                else
                {
              //      echo "Message has been sent successfully / ";
                }
                header('location:logout.php');


            }

        }
        echo $msg;
    }
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
        //$msg= 'Message: Error Saving' ;
    }
}

?>