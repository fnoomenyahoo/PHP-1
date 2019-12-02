<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
include('included/Reminder.php');
?>
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Minestry Of Health</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul class="navbar-nav mr-auto">
         
            <?php  if(isset($_SESSION["type"]) && $_SESSION["type"]=="Hospital")
                   {
                       //           echo '<li class="nav-item active">
                       //    <a class="nav-link" href="Medecines.php">Medecines</a>
                       //</li>';
                       echo '
            <li class="nav-item active">
                <a class="nav-link" href="Patients.php">Patients</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Prospections.php">Prospection</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="SickLeaves.php">Sick Leave</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="BloodTests.php">Blood Test</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="TransfertPatient.php">Transfert Patient</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Appointments.php">Appointments</a>
            </li>';

                   }
                   if(isset($_SESSION["type"]) && $_SESSION["type"]=="Patient")
                   {
                       echo '
            <li class="nav-item active">
                <a class="nav-link" href="Prospections.php">Prospection</a>
            </li>
<li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Appointment </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="Appointment.php">New Appointment</a>
                    <a class="dropdown-item" href="Appointments.php">Old Appointment</a>
                </div>
            </li>';
                   }
                   if(isset($_SESSION["type"]) && $_SESSION["type"]=="Pharmacy")
                   {
                       $alertdanger='';
                       include('included/MedecineExpire.php');

                       if(isset($MedExp)&&$MedExp!="")
                       {
                           $alertdanger='alert-danger';
                       }
                       echo '<li class="nav-item active">
                <a class="nav-link '.$alertdanger.'" href="Medecines.php">Medecines</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Prospections.php">Prospection</a>
            </li>';
                   }

            ?>


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