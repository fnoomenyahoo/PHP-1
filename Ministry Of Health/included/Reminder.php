<?php
try{

     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    include("config.php");
    $msg="";
    $id= $_SESSION["relatedId"];
   // if($_SESSION["type"]=="Patient")
    {
        $query="SELECT appointment.`id`, `HospitalID`, `patientID`, `PDate`, appointment.`Status`, `PTimen`, `Reminded`,patient.FName as PName,patient.Email,hospital.Description HName
FROM `appointment`
inner join patient on patient.id=patientID
inner join hospital on hospital.id=HospitalID
where  appointment.Status='Valid' and Reminded=0 and pdate= DATE(NOW() + INTERVAL 1 DAY )";

        $results= $db->query($query);
        include('mailgmail/class.phpmailer.php');
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {

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

            $mail->addAddress($row["Email"], $row["PName"]);
            $mail->isHTML(true);
            $mail->Subject = "Appointment Meminder ";
            $mail->Body = '<h2>Ministry Of health</h2><p>Dear, <b>'.$row["PName"].'<b> <br/><br/>  You Have Appointment in '.$row["HName"].' at '.$row["PDate"].'  '.$row["PTimen"].':00  </p>';
            $mail->AltBody = "This is the plain text version of the email content";

            if($mail->send())
            {
                $query="Update appointment set 	Reminded =1 where id=".$row['id'];
                $db->query($query);
            }
        }
    }
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
//	echo 'Message: Error Saving' ;
}

?>