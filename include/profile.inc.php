<?php

include '../index/dbconnect.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["status"];
    
    $sql = "INSERT INTO `profile`(`status`) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $status);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('location:../index/index_admin.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
