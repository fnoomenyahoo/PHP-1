
<?php include("../included/CheckAdmin.php");?>
<?php $currForm="Hospital";?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Minestry Of Health</title> 
</head>

<body style="padding-top: 70px"><?php include("navbar.php") ?>
    <div class="container ">
        <h2>Hospital Edit</h2>
        <span id="imessage" style="color: red;">
            <?php include("../included/HospitalEdit.php") ?> </span>
            <form method="post">
                <div class="form-group">
                    <label for="pFName">Code</label>
                    <input type="text" class="form-control" id="pID" name="pID" placeholder="Enter Name" value="<?php echo $row["id"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="pDescription">Description</label>
                    <input type="text" class="form-control" id="pDescription" name="pDescription" placeholder="Enter Name" value="<?php echo $row["Description"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pTel">Phone 1</label>
                    <input type="tel" class="form-control" id="pTel" name="pTel" placeholder="Enter Phone " value="<?php echo $row["Tel"]; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pTel2">Phone 2</label>
                    <input type="tel" class="form-control" id="pTel2" name="pTel2" placeholder="Enter Phone " value="<?php echo $row["Tel2"]; ?>">
                </div>
                <div class="form-group">
                    <label for="pFax">Fax</label>
                    <input type="tel" class="form-control" id="pFax" name="pFax" placeholder="Enter Fax " value="<?php echo $row["Fax"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pAddress">Address</label>
                    <input type="text" class="form-control" id="pAddress" name="pAddress" placeholder="Enter Address " value="<?php echo $row["Address"]; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pnationalId">CR Code</label>
                    <input type="text" class="form-control" id="pnationalId" name="pnationalId" placeholder="Enter CR Code " value="<?php echo $row["nationalId"]; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pEmail">Email address</label>
                    <input type="email" class="form-control" id="pEmail" name="pEmail" placeholder="Enter email" value="<?php echo $row["Email"]; ?>" required>
                    <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="pContactName">Contact Name</label>
                    <input type="text" class="form-control" id="pContactName" name="pContactName" placeholder="Enter Contact Name " value="<?php echo $row["ContactName"]; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pContactTel">Contact phone</label>
                    <input type="text" class="form-control" id="pContactTel" name="pContactTel" placeholder="Enter Contact Phone " value="<?php echo $row["ContactTel"]; ?>" required>
                </div>

                <div class="form-group">
                    <label for="popenh1">Open Time</label>
                    <input type="time" class="form-control" id="popenh1" name="popenh1" placeholder="Enter Time " value="<?php echo $row["openh1"]; ?>" required>
                   
                </div>

                <div class="form-group">
                    <label for="popenh2">Close Time</label>
                    <input type="time" class="form-control" id="popenh2" name="popenh2" placeholder="Enter Time " value="<?php echo $row["openh2"]; ?>" required>
                     
                </div>

                <!--<div class="form-group">
                <label for="poffDay">OFF Day</label>
                <select class="form-control" id="poffDay" name="poffDay" placeholder="OFF day"value="<?php echo $row["offDay"]; ?>" >
                    <option value="1" selected></option>
                    <option value="2">Friday</option>
                    <option value="3">Saturday</option>
                    <option value="4">Sunday</option>
                    <option value="5">Monday</option>
                    <option value="6">Tuesday</option>
                    <option value="7">Wednesday</option>
                    <option value="8">Thursday</option>

                </select>
            </div>-->
                <!--<div class="form-check">
                <input type="checkbox" class="form-check-input" id="pStatus" name="pStatus" checked value="1">
                <label class="form-check-label" for="pStatus">Valid</label>
            </div>-->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</body>
</html>