<?php include("../included/CheckAdmin.php");?>

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
                    <li class="nav-item">
                        <a class="nav-link" href="Mail.php" id="RecivedMail">
                            Recived
                             
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="MailSend.php" id="SendMail">Send</a>
                    </li>
                   
                </ul>

            </div>
             <a class="navbar-brand" href="#" id="MailNew" right>New</a>
        </nav>
        <div class="container-fluid" id="MailContaint">
            <span id="imessage" style="color: red;">
                <?php

            include("../included/MailNew.php") ?></span>
                <form method="post">
                    <div class="form-group">
                        <label for="pReciver_Id">To</label>


                        <select class="form-control" id="pReciver_Id" name="pReciver_Id" placeholder="Enter Name" required>
                            <?php   include("../included/userCombo.php") ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pSubject">Subject</label>
                        <input type="text" class="form-control" id="pSubject" name="pSubject" placeholder="Enter Name" />
                    </div>
                    <div class="form-group">
                        <textarea contenteditable="true" id="pMessage" name="pMessage" rows="5" cols="50" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

</div>
    </div> 
</body>
</html>
