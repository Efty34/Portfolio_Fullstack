<?php

include './dbconnect.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if ($check === false) {
        echo "<script> alert('File is not an image.'); </script>";
        $uploadOk = 0;
    }
    if ($_FILES["picture"]["size"] > 900000) {
        echo "<script> alert('Sorry, your file is too large.'); </script>";
        $uploadOk = 0;
    }
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); </script>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
            // echo "The file " . basename($_FILES["picture"]["name"]) . " has been uploaded.";                    
            $sql = "INSERT INTO `timeline` (`university`, `degree`, `year`, `description`, `image`) 
                VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssss", $name, $degree, $year, $description, $targetFile);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script> alert('Upload successful'); </script>";
                } else {
                    mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                mysqli_error($conn);
            }
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
        }
    }
}
?>