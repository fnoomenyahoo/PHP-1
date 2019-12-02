<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) ||( $_SESSION["type"]!="Pharmacy" &&$_SESSION["type"]!="Hospital"))
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
    <span style="color:red"><?php include("included/Prospection.php") ?></span>
  <form method="post">
	  <div class="form-group">
      <label for="patientid">Name</label>
      <table><tr class=""></tr></table>
        <select class="form-control" id="ppatientID" name="ppatientID" placeholder="Select Patient" required>
            <?php include("included/PatientCombo.php") ?>
        </select>
    </div>
	   
	      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>