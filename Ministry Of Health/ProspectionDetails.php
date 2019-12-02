<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || ($_SESSION["type"]!="Hospital"&&$_SESSION["type"]!="Pharmacy" && $_SESSION["type"]!="Patient"))
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

<body style="padding-top: 70px"><?php include("navbar.php") ?>
    <div class="container "><span id="imessage" style="color: red;"> <?php include("included/ProspectionDetails.php");   ?>  </span>

        <form method="post">
            <input type="hidden" id="oID" name="oID" value="<?php  if(isset($_GET["oID"]))echo $_GET["oID"];?>" />
            <table width="100%%" border="1">
                <tbody>
                    <tr>
                        <th scope="col">Medecine</th>
                        <th scope="col">Dose</th>
                        <th scope="col">Dyas</th>
                        <th scope="col">Qty Per Day</th>
                        <th scope="col">Remarq</th><?php if($_SESSION["type"]!="Patient") {?>
                        <th scope="col">Action</th><?php } ?>
                    </tr>                   
                    <?php if(isset($tb)) echo $tb;
                          if($_SESSION["type"]=="Hospital" && isset($pHD) && $pHD=='1') {
                    ?>
                    <tr>

                        <td scope="col">
                            <select class="form-control" id="pMedecineId" name="pMedecineId" placeholder="Enter Medecine" required><?php include("included/MedecineCombo.php"); ?>

                            </select>
                        </td>
                        <td scope="col">
                            <input type="text" class="form-control" id="pDose" name="pDose" placeholder="Enter Dose" required />
                        </td>
                        <td scope="col">
                            <input type="text" class="form-control" id="ppDays" name="ppDays" placeholder="Enter Days " required />
                        </td>
                        <td scope="col">
                            <select class="form-control" id="pqty" name="pqty" placeholder="Enter Medecine" required>
                                <option value="1">1-0-0</option>
                                <option value="2">0-0-1</option>
                                <option value="3">1-0-1</option>
                                <option value="4">1-1-1</option>
                                <option value="5">1-1-1-1</option>
                            </select>
                        </td>

                        <td scope="col">
                            <input type="text" class="form-control" id="premarq" name="premarq" placeholder="Enter Remarq " />
                        </td>
                        <td scope="col"> <button type="submit" class="btn btn-primary">ADD</button></td>
                    </tr><?php } ?>
                </tbody>
            </table>

        </form>
    </div>
</body>
</html>