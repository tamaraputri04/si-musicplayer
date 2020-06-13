<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="layout/assets/css/stylelogin.css">
</head>
<body><form method="POST">
    <div class="kotak">
        <div class="login">
            <center><img src="layout/assets/images/login.png" width="150px" height="100px"></center>
        </div>
        <div class="input">
            <input type="text" required name="user">
            <span class="phold">Username</span>
        </div><br>
        <div class="input">
            <input type="password" required name="pass">
            <span class="phold">Password</span>
        </div>
        <br><br>
        <input type="submit" name="log" value="Login" id="log">
        <br><br>
        <center><h4>Create Account Here <a href="regis.php"> Sign Up!</a></h4></center>
    </div></form>
</body>
<?php
require_once "app/user.php";
$kat = new user();
   if (isset($_POST['log'])) {
      $kat->login($_POST['user'],$_POST['pass']);
    }
 ?>
