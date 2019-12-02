<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || ( $_SESSION["type"]!="Hospital" && $_SESSION["type"]!="Patient"))
{
    header('location:login.php');
}
?>
 
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Minestry Of Health</title> 
</head>

<body style="padding-top: 70px">
  <?php include("navbar.php") ?>
 
<div class="container "  >
    <h2>Appointments List</h2>

    <div class="container-fluid" id="MailContaint">
        <?PHP if($_SESSION["type"]=="Patient"){?>
        <a class="btn btn-secondary" href="Appointment.php">NEW</a>
        <?PHP } ?>
        <table width="100%%" border="1">
            <tbody>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr><?php include("included/Appointments.php") ?>
            </tbody>
        </table>


    </div>  
</div>

</body>
</html>
<script>
$(document).ready(function(){
  $("#MailNew").click(function(){
    $("#MailContaint").load('url to MailNew.php');
  });
 
</script>