<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || $_SESSION["type"]!="Administrator")
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

    <link href="../css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap-4.0.0.js"></script>
</head>

<body style="padding-top: 70px">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Minestry Of Health</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto"></ul>
        </div>
    </nav>
    <body style="padding-top: 70px">
        <?php include("navbar.php") ?>

        <div class="container">
            <h2>Change Password</h2>
            <span id="imessage" style="color: red;">
                <?php include("../included/ChangePassword.php"); ?>
            </span>

            <form method="post" id="myForm">
                <div class="form-group">
                    <label for="oldPassword">Admin </label>
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password"
                        required />
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password"
                        required />
                    <span id='message1'></span>
                </div>

                <div class="form-group">
                    <label for="ConfPassword">New Password</label>
                    <input type="password" class="form-control" id="ConfPassword" name="ConfPassword" placeholder="Confirm Password" required />
                    <span id='message'></span>
                </div>

                <button type="submit" class="btn btn-primary" id="adminlog" name="adminlog">Submit</button>
            </form>
        </div>

        <script>
            $('#myForm').submit(function () {
                $password = $('#newPassword').val();
                if ($('#newPassword').val() != $('#ConfPassword').val() || ($password.length < 8 || (/[A-Z]/.test($password) == false || /[a-z]/.test($password) == false || /[0-9]/.test($password) == false))) {
                    //$('#message').html('Not Matching').css('color', 'red');
                    return false;
                }
            });


            $('#newPassword, #ConfPassword').on('keyup', function () {
                $password = $('#newPassword').val();
                //  alert(  /[A-Z]/.test($password) == false || /[a-z]/.test($password) == false || /[0-9]/.test($password) == false);
                if ($password.length < 8 || (/[A-Z]/.test($password) == false || /[a-z]/.test($password) == false || /[0-9]/.test($password) == false))//|| !preg_match("#[0-9]+#", $password) || !preg_match("#[a-z]+#", $password) || !preg_match("#[A-Z]+#", $password)) {
                {
                    $('#message1').html('Password MUST contain uppercase and number and minimun Lenght 8').css('color', 'red');
                } else {
                    $('#message1').html('');
                }
                if ($('#newPassword').val() == $('#ConfPassword').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');

            });</script>

    </body>
</html>
