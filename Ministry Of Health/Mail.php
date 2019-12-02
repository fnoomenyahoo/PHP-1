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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Minestry Of Health</title> 
</head>

<body style="padding-top: 70px">
    <?php include("navbar.php") ?>

    <div class="container ">
     
        <h2>Mail</h2>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" id="RecivedMail">
                            Recived
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MailSend.php" id="SendMail">Send</a>
                </ul>

            </div>
            <a class="navbar-brand" href="MailNew.php" id="MailNew" right>New</a>
        </nav>
        <div class="container-fluid" id="MailContaint">
            <table width="100%%" border="1">
                <tbody>
                    <tr>
                        <th scope="col">Send from</th>
                        <th scope="col">Date</th>
                        <th scope="col">Subject</th>
                    </tr><?php include("included/RecivedMail.php") ?>
                </tbody>
            </table> 
        </div>
    </div>

</body>
</html>
