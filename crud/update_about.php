<?php
include '../index/dbconnect.inc.php';

if (isset($_GET['updateid']) && is_numeric($_GET['updateid'])) {
    $id = $_GET['updateid'];
} else {
    exit("Invalid or missing updateid");
}

$sql = "SELECT * FROM `about` where sn=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$bio = $row['bio'];
$picture = $row['picture'];

if (isset($_POST['submit'])) {
    $bio = $_POST['bio'];

    // Handle file upload
    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $picture = $_FILES['picture']['name'];
        $target_dir = "../crud/update/";
        $target_file = $target_dir . basename($picture);
        
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
            $sql = "UPDATE `about` SET bio=?, picture=? WHERE sn=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $bio, $picture, $id);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                header("location:../index/index_admin.php");
                exit;
            } else {
                die(mysqli_error($conn));
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an upload error occurred.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_About</title>
    <style>
        .timeline-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* padding-top: 7%; */

        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
            font-size: 16px;
        }

        .form-group input[type="file"] {
            cursor: pointer;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group input[type="submit"] {
            background-color: #396460;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
            display: block;
        }

        .form-group input[type="submit"]:hover {
            background-color: #719692;
        }

        .form-group textarea {
            width: 510px;
            height: 220px;
            border: 1px solid black;
            padding-left: 10px;
            padding-top: 6px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="timeline-section">
        <!-- <h3>Update About</h3> -->
        <div class="timeline-section">
            <h3>Update About</h3>
            <div class="form-container">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea name="bio" placeholder="Enter Bio" rows="5" required><?php echo $bio; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="picture">Upload Picture:</label>
                        <input type="file" id="picture" name="picture" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>