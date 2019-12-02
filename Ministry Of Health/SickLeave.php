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
   
    <div class="container "><?php include("navbar.php") ?>
        <h2>Sick Leave</h2>
        <span style="color:red"> <?php include("included/SickLeave.php") ?></span>
        <form method="post">

            <div class="form-group">
                <label for="pHospitalID">Patient</label>
                <select class="form-control" id="pPatientID" name="pPatientID" placeholder="Enter Patient" required onchange="getval(this);"><?php include("included/PatientCombo.php") ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pPDate">Start Date </label>
                <input type="date" class="form-control" id="pdate" name="pdate" placeholder="Enter Date " min="<?php echo date('Y-m-d') ?>" required />
            </div>

            <div class="form-group">
                <label for="pPTimen">No Days</label>
                <input type="number" class="form-control" id="pdays" name="pdays" placeholder="" min="1" required />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        <script>
        function getval(sel) {
        $.ajax({
            url: 'included/HospitalValue.php',
            data: "hId": sel.value
        },
            dataType: 'json',
            type: 'post',
            success: function (output) {
                $('#pPTimen').attr({
                    "max": output.maxVal,
                    "min": output.minVal
                });
                alert(output.maxVal);
                alert(output.minVal);
            });
        } 
        </script>
</body>
</html>