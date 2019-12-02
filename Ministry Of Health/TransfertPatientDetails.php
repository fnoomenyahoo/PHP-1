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
        <h2>Transfert Patient Details</h2>
        <form method="post">
            <span id="imessage" style="color: red;"><?php include("included/TransfertPatientDetails.php") ?></span>
            <div class="form-group">
                <label for="pID">Patient</label>
                <input type="text" class="form-control" id="pID" name="pID" placeholder="Enter Patient" value="<?php if(isset($row)) echo $row["ID"]; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="pPatient">Patient</label>
                <input type="text" class="form-control" id="pPatient" name="pPatient" placeholder="Enter Patient" value="<?php if(isset($row)) echo $row["PName"]; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="pHospitalOrgId">Hospital From</label>
                <input type="text" class="form-control" id="pHospitalOrgId" name="pHospitalOrgId" placeholder="Enter Patient" value="<?php if(isset($row)) echo $row["HName"]; ?>" readonly />

            </div>
            <div class="form-group">
                <label for="pHospitalRecId">Hospital To</label>
                <input type="text" class="form-control" id="pHospitalRecId" name="pHospitalRecId" placeholder="Enter Patient" value="<?php if(isset($row)) echo $row["HName2"]; ?>" readonly />

            </div>

            <div class="form-group">
                <label for="pInformation">Information </label>
                <textarea type="date" class="form-control" id="pInformation" name="pInformation" placeholder="Enter Date " readonly> <?php if(isset($row)) echo $row["Information"]; ?></textarea>
            </div>
            <a class="btn btn-primary" href="TransfertPatient.php">Submit</a>
        </form>
    </div>
     
</body>
</html>