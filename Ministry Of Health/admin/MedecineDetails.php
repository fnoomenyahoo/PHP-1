<?php include("../included/CheckAdmin.php");?> 
<?php $currForm="Medecines";?>
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
        <h2>Medecine Edit</h2>
        <span id="imessage" style="color: red;">
            <?php include("../included/MedecineDetails.php") ?></span>
            <form method="post">
                <div class="form-group">
                    <label for="pFName">Code</label>
                    <input type="text" class="form-control" id="pID" name="pID" placeholder="Enter Name" value="<?php echo $row["id"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="pDescription">Desciption</label>
                    <input type="text" class="form-control" id="pDescription" name="pDescription" placeholder="Enter Desciption" value="<?php echo $row["Description"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="pBarcode">Barcode</label>
                    <input type="text" class="form-control" id="pBarcode" name="pBarcode" placeholder="Enter Desciption" value="<?php echo $row["Barcode"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="pExDate">Expire Date</label>
                    <input type="date" class="form-control" id="pExDate" name="pExDate" placeholder="Enter Expire Date " value="<?php echo $row["ExDate"]; ?>" readonly />
                </div>



                <!--<div class="form-check">
                <input type="checkbox" class="form-check-input" id="pStatus" name="pStatus" checked value="<?php echo $row["Status"]; ?>" " />
                <label class="form-check-label" for="Status">Valid</label>
            </div>-->
                <a class="btn btn-secondary" href="Medecines.php">Return</a>
            </form>
</div>
</body>
</html>