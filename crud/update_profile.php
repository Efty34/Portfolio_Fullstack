<?php
include '../index/dbconnect.inc.php';

if (isset($_GET['updateid']) && is_numeric($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM `profile` WHERE `sn`=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $status = $row['status'];
    } else {
        exit;
    }
} else {
    exit;
}

if (isset($_POST['submit'])) {
    $status = $_POST['status'];

    $sql = "UPDATE `profile` SET `status`=? WHERE `sn`=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location:../index/index_admin.php");
        exit;
    } else {
        die(mysqli_error($conn));
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
            <h3>Update Experience</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="status" required placeholder="Title" value="<?php echo $status; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>

</body>

</html>