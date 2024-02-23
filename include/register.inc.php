<?php
include '../index/dbconnect.inc.php';
session_start();
if (isset($_SESSION["user"])) {
    header("Location:../index/index_admin.php");
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["pswd"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($username) or empty($email) or empty($password)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (strlen($password) < 3) {
            array_push($errors, "Password must be at least 3 characters long");
        }

        $sql = "SELECT * FROM `loginsystem` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
            array_push($errors, "Username already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                // echo "<div class='alert alert-danger'>$error</div>";
                echo "<script> alert('$error'); </script>";

            }
        } else {
            $sql = "INSERT INTO `loginsystem` (`username`,`email`, `password`) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                // echo "<div class='alert alert-success'>You are registered successfully.</div>";
                echo "<script> alert('You are registered successfully.'); </script>";
                
                header("Location:../index/index_login.php");
                exit();
            } else {
                die("Something went wrong");
            }
        }
    }
}

?>