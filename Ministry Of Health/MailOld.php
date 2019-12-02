<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || $_SESSION["type"]=="Administrator")
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
 
<div class="container ">
    <h2>Mail</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" id="MailNew">New</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="#" id="RecivedMail">Recived<span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#" id="SendMail">Send</a>
            </ul>

        </div>
    </nav>
    <div class="container-fluid" id="MailContaint">

       
        <?php include("RecivedMail.php"); ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#MailNew").click(function () {
            $("#MailContaint").load('MailNew.php');
        });
        $("#RecivedMail").click(function () {
            $("#MailContaint").load('RecivedMail.php');
        });
        $("#SendMail").click(function () {
            $("#MailContaint").load('SendMail.php');
        });
    });
</script>
</body>
</html>
