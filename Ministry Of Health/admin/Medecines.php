<?php include("../included/CheckAdmin.php");?>
<?php $currForm="Pharmacies";?>
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
    <h2>Medecines List</h2>

    <div class="container-fluid" id="MailContaint">
        <a class="btn btn-secondary" href="Medecine.php">NEW</a>

        <table width="100%%" border="1">
            <tbody>
                <tr>
                    <th scope="col">Barcode</th>
                    <th scope="col">Description</th>

                    <th scope="col">Expire Date</th>
                    <th scope="col">Action</th>
                </tr><?php include("../included/Medecines.php") ?>
            </tbody>
        </table>


    </div>  
</div>

</body>
</html>
<script>

</script>