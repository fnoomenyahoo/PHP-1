
<?php $currForm="Patients";?>
<!doctype html>
<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
 if(!isset($_SESSION["type"]) ||  ($_SESSION["type"]!="Hospital"&&$_SESSION["type"]!="Pharmacy" && $_SESSION["type"]!="Patient"))
{
    header('location:login.php');
}
?>
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
    <h2>Prospection List</h2>

    <div class="container-fluid" id="MailContaint">
        <span style="color:red"></span>
        <?php if($_SESSION["type"]=="Hospital"){ 
                  echo' <a class="btn btn-secondary" href="Prospection.php">NEW</a>';
        } ?>
        <table width="100%%" border="1">
            <tbody>
                <tr>
                    <th scope="col">Hospital</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <?php if(isset($tb)) echo $tb;
         
                    ?>
                    <th scope="col">Action</th>
               
                </tr><?php include("included/Prospections.php") ?>
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