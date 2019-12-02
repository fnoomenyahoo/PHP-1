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

<body style="padding-top: 70px">
    <?php include("navbar.php") ?>
 
<div class="container "  >
    <h2>Users List</h2>

    <div class="container-fluid" id="MailContaint">
        <a class="btn btn-primary" href="User.php">NEW</a>

        <table width="100%%" border="1">
            <tbody>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr><?php include("../included/Users.php") ?>
            </tbody>
        </table>


    </div>  
</div>

</body>
</html>
<script>
$(document).ready(function(){
  $("#MailNew").click(function(){
    $("#MailContaint").load('url to MailNew.php');
  });
 
</script>