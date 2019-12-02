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
        <h2>User</h2>
        <form method="post">
            <span id="imessage" style="color: red;"><?php include("../included/User.php") ?></span>

                <div class="form-group">
                    <label for="pusername">User Name</label>
                    <input type="text" class="form-control" id="pusername" name="pusername" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="ptype">Type</label>

                    <select class="form-control" id="ptype" name="ptype" placeholder="Type" required>
                        <option value="1">Administrator</option>
                        <option value="2" <?php if(isset($_GET["type"]) && $_GET["type"]=="Pharmacy" ) echo "selected";?> >Pharmacy</option>
                        <option value="3" <?php if(isset($_GET["type"]) && $_GET["type"]=="Hospital" ) echo "selected";?> >Hospital</option>
                        <option value="4" <?php if(isset($_GET["type"]) && $_GET["type"]=="Patient" ) echo "selected";?> >Patient</option>
                    </select>
                    <input type="text" class="form-control" id="prelatedId" name="prelatedId" placeholder="For" value="<?php if(isset($_GET["uID"]) ) echo $_GET["uID"];?>" required>

                </div>

                <div class="form-group">
                    <label for="pF_name">Full Name</label>
                    <input type="text" class="form-control" id="pF_name" name="pF_name" placeholder="Enter Phone " required>
                </div>
                <div class="form-group">
                    <label for="pAddress">Address</label>
                    <input type="text" class="form-control" id="pAddress" name="pAddress" placeholder="Enter Address " required>
                </div>



                <div class="form-group">
                    <label for="pEmail">Email address</label>
                    <input type="email" class="form-control" id="pEmail" name="pEmail" placeholder="Enter email" required>
                    <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="pTelephone">Phone</label>
                    <input type="text" class="form-control" id="pTelephone" name="pTelephone" placeholder="Enter Contact Name " required>
                </div>



                <!--<div class="form-check">
            <input type="checkbox" class="form-check-input" id="Status" name="Status">
            <label class="form-check-label" for="Status">Valid</label>
        </div>-->
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
 
</body>
</html>