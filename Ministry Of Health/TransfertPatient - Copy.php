<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || $_SESSION["type"]!="Patient")
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
        <h2>Transfert Patient</h2>
        <form method="post">
            <span id="imessage" style="color: red;"><?php include("included/TransfertPatient.php") ?></span>
            <div class="form-group">
                <label for="pPatient">Patient</label>
                <select class="form-control" id="pPatient" name="pPatient" placeholder="Enter Patient" onchange="getval(this);" required>
                    <?php include("included/PatientCombo.php") ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pHospitalRecId">Hospital To</label>
                <select class="form-control" id="pHospitalRecId" name="pHospitalRecId" placeholder="Enter Hospital" onchange="getval(this);" required>
                    <?php include("included/HospitalCombo.php") ?>
                </select>
            </div>
       
            <div class="form-group">
                <label for="pInformation">Information </label>
                <!--<input type="hidden" id="poffDay" name="poffDay" value=""/>-->
                <textarea type="date" class="form-control" id="pInformation" name="pInformation" placeholder="Enter Date " required></textarea>

            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
     
</body>
</html>