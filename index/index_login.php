<?php
include '../index/dbconnect.inc.php';
session_start();
if (isset($_SESSION["user"])) {
    header("Location:../index/index_admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_style.css">
    <title>Loginsystem</title>
</head>

<body>
    <div class="login-container"></div>
    <div class="login-container2">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="login">
                <form class="form" action="../include/login.inc.php" method="post">
                    <label for="chk" aria-hidden="true">Log in</label>
                    <input class="input" type="text" name="username" placeholder="Username" required="">
                    <input class="input" type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="login">Log in</button>
                </form>
            </div>

            <div class="register">
                <form class="form" action="../include/register.inc.php" method="post">
                    <label for="chk" aria-hidden="true">Register</label>
                    <input class="input" type="text" name="username" placeholder="Username" required="">
                    <input class="input" type="email" name="email" placeholder="Email" required="">
                    <input class="input" type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>