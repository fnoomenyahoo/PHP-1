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

<body style="padding-top: 70px">
 <?php include("navbar.php") ?>
    <div class="container ">
        <h2>Hospital New</h2>
        <span id="imessage" style="color: red;"><?php include("../included/Hospital.php") ?>
        </span>
        <form method="post">

            <div class="form-group">
                <label for="pDescription">Description</label>
                <input type="text" class="form-control" id="pDescription" name="pDescription" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="pTel">Phone 1</label>
                <input type="tel" class="form-control" id="pTel" name="pTel" placeholder="Enter Phone " required>
            </div>

            <div class="form-group">
                <label for="pTel2">Phone 2</label>
                <input type="tel" class="form-control" id="pTel2" name="pTel2" placeholder="Enter Phone ">
            </div>
            <div class="form-group">
                <label for="pFax">Fax</label>
                <input type="tel" class="form-control" id="pFax" name="pFax" placeholder="Enter Fax " required>
            </div>
            <div class="form-group">
                <label for="pAddress">Address</label>
                <input type="text" class="form-control" id="pAddress" name="pAddress" placeholder="Enter Address " required>
            </div>

            <div class="form-group">
                <label for="pnationalId">CR Code</label>
                <input type="text" class="form-control" id="pnationalId" name="pnationalId" placeholder="Enter CR Code " required>
            </div>

            <div class="form-group">
                <label for="pEmail">Email address</label>
                <input type="email" class="form-control" id="pEmail" name="pEmail" placeholder="Enter email" required>
                <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="pContactName">Contact Name</label>
                <input type="text" class="form-control" id="pContactName" name="pContactName" placeholder="Enter Contact Name " required>
            </div>

            <div class="form-group">
                <label for="pContactTel">Contact phone</label>
                <input type="text" class="form-control" id="pContactTel" name="pContactTel" placeholder="Enter Contact Phone " required>
            </div>

            <div class="form-group">
                <label for="popenh1">Open Time</label>
                <input type="time" class="form-control"  id="popenh1" name="popenh1" placeholder="Enter Time " required>
              <!--  <select class="form-control" id="popenh1" name="popenh1" placeholder="Enter Time " required>
                    <option value="0">00:00</option>
                    <option value="1">01:00</option>
                    <option value="2">02:00</option>
                    <option value="3">03:00</option>
                    <option value="4">04:00</option>
                    <option value="5">05:00</option>
                    <option value="6">06:00</option>
                    <option value="7">07:00</option>
                    <option value="8">08:00</option>
                    <option value="9">09:00</option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                    <option value="17">17:00</option>
                    <option value="18">18:00</option>
                    <option value="19">19:00</option>
                    <option value="20">20:00</option>
                    <option value="21">21:00</option>
                    <option value="22">22:00</option>
                    <option value="23">23:00</option>
                </select>-->
            </div>

            <div class="form-group">
                <label for="popenh2">Close Time</label>
                <input type="time" class="form-control"  id="popenh2" name="popenh2" placeholder="Enter Time " required>
             <!--   <select class="form-control" id="popenh2" name="popenh2" placeholder="Enter Time " required>
                    <option value="0">00:00</option>
                    <option value="1">01:00</option>
                    <option value="2">02:00</option>
                    <option value="3">03:00</option>
                    <option value="4">04:00</option>
                    <option value="5">05:00</option>
                    <option value="6">06:00</option>
                    <option value="7">07:00</option>
                    <option value="8">08:00</option>
                    <option value="9">09:00</option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                    <option value="17">17:00</option>
                    <option value="18">18:00</option>
                    <option value="19">19:00</option>
                    <option value="20">20:00</option>
                    <option value="21">21:00</option>
                    <option value="22">22:00</option>
                    <option value="23">23:00</option>
                </select>-->
            </div>

            <!--<div class="form-group">
                <label for="poffDay">OFF Day</label>
                <select class="form-control" id="poffDay" name="poffDay" placeholder="OFF day">
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