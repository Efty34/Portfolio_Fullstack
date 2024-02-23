<?php
include '../index/dbconnect.inc.php';

if (isset($_GET['updateid']) && is_numeric($_GET['updateid'])) {
    $id = $_GET['updateid'];
} else {
    exit("Invalid or missing updateid");
}

$sql = "SELECT * FROM `timeline` WHERE sn=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$university = $row['university'];
$degree = $row['degree'];
$year = $row['year'];
$description = $row['description'];
$picture = $row['image'];

if (isset($_POST['submit'])) {
    $university = $_POST['uniname'];
    $degree = $_POST['degree'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../crud/update/";
        $targetFile = $target_dir . basename($_FILES["picture"]["name"]);

        if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
            $sql = "UPDATE `timeline` SET `university`=?, `degree`=?, `year`=?, `description`=?, `image`=? WHERE `sn`=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssi", $university, $degree, $year, $description, $targetFile, $id);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                header("location:../index/index_admin.php");
                exit;
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    } else {
        echo "<script>alert('No file uploaded or an upload error occurred.');</script>";
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
        * {
            margin: 0;
            padding: 0;
        }

        .timeline-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* padding-top: 7%; */
            position: absolute;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .update-picture {
            background-image: url(../asset/c.jpg);
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: center;
            padding: 30px;
            width: 500px;
            background: rgba(255, 255, 255, 0);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(11.7px);
            -webkit-backdrop-filter: blur(11.7px);
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
            width: 95%;
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
    <div class="update-picture"></div>
    <div class="timeline-section">
        <div class="form-container">
            <h3>Update Timeline</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- <label for="name">University Name:</label> -->
                    <input type="text" name="uniname" required placeholder="University Name" value="<?php echo $university; ?>">
                </div>
                <div class="form-group">
                    <!-- <label for="email">Degree:</label> -->
                    <input type="text" name="degree" required placeholder="Degree" value="<?php echo $degree; ?>">
                </div>
                <div class="form-group">
                    <!-- <label for="subject">Year:</label > -->
                    <input type="text" name="year" required required placeholder="Year" value="<?php echo $year; ?>">
                </div>
                <div class="form-group">
                    <!-- <label for="message">Description:</label> -->
                    <textarea name="description" placeholder="Description" rows="5" required><?php echo $description; ?></textarea>
                    <!-- <input type="text" name="description" required required placeholder="Description"> -->
                </div>
                <div class="form-group">
                    <label for="picture">Upload University Logo:</label>
                    <input type="file" id="picture" name="picture" accept="image/*" required >
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>

</body>

</html>