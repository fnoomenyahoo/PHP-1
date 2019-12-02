<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minestry Of Health</title>

    <link href="../css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap-4.0.0.js"></script>
</head>

<body style="padding-top: 70px">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Minestry Of Health</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto"></ul>
        </div>
    </nav>


    <div class="container">
        <h2>Minestry Of Health</h2>
        <span id="imessage" style="color: red;"><?php include("../included/login.php") ?></span>
        <form method="post">
            <div class="form-group">
                <label for="pusername">Admin </label>
                <input type="text" class="form-control" id="pusername" name="pusername" placeholder="Enter Admin User"
                       value="<?php if(isset($_COOKIE["member_username"])) { echo $_COOKIE["member_username"]; } ?>" required />
            </div>
            <div class="form-group">
                <label for="ppassword">Password</label>
                <input type="password" class="form-control" id="ppassword" name="ppassword" placeholder="Password"
                       value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required />
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="pRemember"
                       <?php if(isset($_COOKIE["member_username"])) { ?> checked <?php } ?> />
                <label class="form-check-label" for="pRemember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary" id="adminlog" name="adminlog">Submit</button>
        </form>
    </div>
</body>
</html>
