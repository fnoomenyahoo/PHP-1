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
        <h2>Medecine</h2>
        <span id="imessage" style="color: red;">
            <?php include("../included/Medecine.php") ?></span>
            <form method="post">
                <div class="form-group">
                    <label for="pDescription">Desciption</label>
                    <input type="text" class="form-control" id="pDescription" name="pDescription" placeholder="Enter Desciption" autofocus required />
                </div>
                <div class="form-group">
                    <label for="pBarcode">Barcode</label>
                    <input type="text" class="form-control" id="pBarcode" name="pBarcode" placeholder="Enter Desciption" required />
                </div>
                <div class="form-group">
                    <label for="pExDate">Expire Date</label>
                    <input type="date" class="form-control" id="pExDate" name="pExDate" placeholder="Enter Expire Date " required />
                </div>



                <!--<div class="form-check">
                <input type="checkbox" class="form-check-input" id="Status" name="Status" checked value="1" >
                <label class="form-check-label" for="Status">Valid</label>
            </div>-->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>
</body>
</html>