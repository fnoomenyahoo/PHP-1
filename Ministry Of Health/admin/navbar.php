<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<link href="../css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap-4.0.0.js"></script>
<?php
include('../included/Reminder.php');
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Minestry Of Health</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="Mail.php">
                    Mail
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Hospitals.php">
                    Hospitals
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Pharmacies.php">
                    Pharmacies
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Patients.php">
                    Patients
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Users.php">
                    Users
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Medecines.php">
                    Medecines
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>

        <?php if(isset($_SESSION["F_name"])) { ?>
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php if(isset($_SESSION["F_name"])) echo   $_SESSION["type"].'('.$_SESSION["F_name"].')'; ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="ChangePassword.php">Change Password</a>
                    </li>
                    <li>
                        <a href="Mail.php">Mail </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="logout.php">logout</a>
                    </li>
                </ul>
            </li>

        </ul>
        <?php } ?>



    </div>
</nav>

