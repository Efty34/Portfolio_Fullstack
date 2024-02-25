<?php

include '../index/dbconnect.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $e = $_POST["e"];
    
    $sql = "INSERT INTO `expertise`(`title`,`subtitle`,`a`,`b`,`c`,`d`,`e`) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $title, $subtitle, $a, $b, $c, $d, $e);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('location:../index/index_admin.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
