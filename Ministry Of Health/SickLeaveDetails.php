<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || $_SESSION["type"]!="Hospital")
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
    <div class="container ">
        <h2>Sick Leave Details</h2>
        <?php include("navbar.php") ?>
        <span style="color:red"><?php include("included/SickLeaveDetails.php") ?>
        </span>
        <div class="form-group">
            <label for="pFName">Code</label>
            <input type="text" class="form-control" id="pID" name="pID" placeholder="Enter Name" value="<?php echo $row["id"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label for="pDescription">Patient Name</label>
            <input type="text" class="form-control" id="pDescription" name="pDescription" placeholder="Enter Desciption" value="<?php echo $row["PName"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label for="pBarcode">Hospital Name</label>
            <input type="text" class="form-control" id="pBarcode" name="pBarcode" placeholder="Enter Desciption" value="<?php echo $row["HName"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label for="pExDate">Entry Date</label>
            <input type="date" class="form-control" id="pExDate" name="pExDate" placeholder="Enter Expire Date " value="<?php echo $row["EntryDate"]; ?>" readonly disabled/ />
        </div>
        <div class="form-group">
            <label for="pExDate">Start Date</label>
            <input type="date" class="form-control" id="pExDate" name="pExDate" placeholder="Enter Expire Date " value="<?php echo $row["date"]; ?>" readonly disabled />
        </div>

        <div class="form-group">
            <label for="pExDate">Total Days</label>
            <input type="text" class="form-control" id="pExDate" name="pExDate" placeholder="Enter Expire Date " value="<?php echo $row["days"]; ?>" readonly />
        </div>


        <a class="btn btn-secondary" href="SickLeaves.php">Submit</a>

    </div>
</body>
</html>