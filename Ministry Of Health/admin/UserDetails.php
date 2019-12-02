<?php include("../included/CheckAdmin.php");?>
<?php $currForm="Users";?>
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
        <h2>User Details</h2>
        <span id="imessage" style="color: red;"> <?php include("../included/UserDetails.php") ?>  </span>
            <form method="post">
                <div class="form-control">
                </div>
                <div class="form-group">
                    <label for="pFName">Code</label>
                    <input type="text" class="form-control" id="pID" name="pID" placeholder="Enter Name" value="<?php echo $row["id"]; ?>" readonly />
                </div>

                <div class="form-group">
                    <label for="pusername">User Name</label>
                    <input type="text" class="form-control" id="pusername" name="pusername" placeholder="Enter Name" value="<?php echo $row["username"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="ptype">Type</label>

                    <select class="form-control" id="ptype" name="ptype" placeholder="Type" value="<?php echo $row["type"]; ?>" readonly>
                        <option value="1">Administrator</option>
                        <option value="2">Pharmacy</option>
                        <option value="3">Hospital</option>
                        <option value="4">Patient</option>
                    </select>
                    <input type="text" class="form-control" id="prelatedId" name="prelatedId" placeholder="For" value="<?php echo $row["relatedId"]; ?>" readonly />

                </div>

                <div class="form-group">
                    <label for="pF_name">Full Name</label>
                    <input type="text" class="form-control" id="pF_name" name="pF_name" placeholder="Enter Phone " value="<?php echo $row["F_name"]; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="pAddress">Address</label>
                    <input type="text" class="form-control" id="pAddress" name="pAddress" placeholder="Enter Address " value="<?php echo $row["Address"]; ?>" readonly />
                </div>

                <div class="form-group">
                    <label for="pEmail">Email address</label>
                    <input type="email" class="form-control" id="pEmail" name="pEmail" placeholder="Enter email" value="<?php echo $row["Email"]; ?>" readonly />
                    <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="pTelephone">Phone</label>
                    <input type="text" class="form-control" id="pTelephone" name="pTelephone" placeholder="Enter Contact Name " value="<?php echo $row["Telephone"]; ?>" readonly />
                </div>

                <!--<div class="form-check">
                <input type="checkbox" class="form-check-input" id="Status" name="Status">
                <label class="form-check-label" for="Status">Valid</label>
            </div>-->

                <a class="btn btn-primary" href="Users.php">Return</a>
            </form>
    </div>
 
</body>
</html>