<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) ||  $_SESSION["type"]!="Hospital")
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
 
<div class="container "  >
    <h2>Blood Test List</h2>

    <div class="container-fluid" id="MailContaint">
        <a class="btn btn-secondary" href="BloodTest.php">NEW</a>

        <table width="100%%" border="1">
            <tbody>
                <tr>
                    <th scope="col">Hospital</th>
                    <th scope="col">Patient</th>

                    <th scope="col">Date</th>
                    <th scope="col">Remarq</th>
                    <th scope="col">Result</th>
                </tr><?php include("included/BloodTests.php") ?>
            </tbody>
        </table>


    </div>  
</div>

</body>
</html>
<script>

</script>