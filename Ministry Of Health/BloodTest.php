<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) && $_SESSION["type"]!="Hospital")
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
    <div class="container ">
        <h2>Blood Test</h2>
        <form method="post">
            <span id="imessage" style="color: red;"><?php include("included/BloodTest.php") ?></span>

            <div class="form-group">
                <label for="pPatientID">Patient</label>
                <select class="form-control" id="pPatientID" name="pPatientID" placeholder="Enter Patient" required onchange="getval(this);"><?php include("included/PatientCombo.php") ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pResponse">Remarq</label>
                <textarea class="form-control" id="pResponse" name="pResponse" rows="3" cols="50" maxlength="100" placeholder="Enter Patient" required ></textarea> 
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  
</body>
</html>