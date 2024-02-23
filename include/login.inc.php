<?php
include '../index/dbconnect.inc.php';
session_start();
if (isset($_SESSION["user"])) {
    header("Location:../index/index_admin.php");
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["pswd"];
        $sql = "SELECT * FROM `loginsystem` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                header("Location:../index/index_admin.php");
                exit();
            } else {
                // echo "<div class='alert alert-danger'>Password does not match.</div>";
                echo "<script> alert('Password does not match.'); </script>";
                
            }
        } else {
            // echo "<div class='alert alert-danger'>Username does not exist.</div>";
            echo "<script> alert('Username does not exist.'); </script>";

        }
    }
}
?>