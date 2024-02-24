<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
        .timeline-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
            align-items: center;
            padding: 1rem 1rem;
        }

        #about {
            background-image: url(../asset/aboutbg.jpg);
            background-repeat: no-repeat;
            background-position:center;
            background-attachment: fixed;
            background-size: cover;
        }

        #timeline {
            background-image: url(../asset/edu.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        #photography {
            background-image: url(../asset/cam.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        #message {
            background-image: url(../asset/msg2.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        .timeline-section h2 {
            font-size: 20px;
            background-color: white;
            width: 100%;
            color: black;
            border-radius: 5px;
        }

        .form-container {
            /* background-color: transparent; */
            /* border-radius: 10px; */
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
            padding: 40px;
            width: 500px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(11.6px);
            -webkit-backdrop-filter: blur(11.6px);
            border: 1px solid rgba(255, 255, 255, 0.45);
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
            width: 420px;
            height: 220px;
            border: 1px solid black;
            padding-left: 10px;
            padding-top: 6px;
            font-size: 16px;
        }

        .about-bg {
            background-image: url(../asset/aboutbg2.jpg);
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        .table-container tbody td img {
            height: 100px;
        }

        .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 110px;
            height: 100vh;
            padding: 0 1.7rem;
            color: #fff;
            overflow: hidden;
            transition: all 0.5s linear;
            background: #396460;
        }

        .sidebar:hover {
            width: 260px;
            transition: 0.5s;
        }

        .main--title--div {
            width: 100%;
            height: 50px;
            background-color: white;
            padding-top: 10px;
            border-radius: 7px;
        }

        .table-container tbody tr td .table-btn-container {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .button a {
            display: flex;
            flex-direction: column;
        }

        /* Delete Button */

        .button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* background-color: rgb(20, 20, 20); */
            background-color: #176B87;
            border: none;
            font-weight: 400;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
            gap: 2px;
        }

        .svgIcon {
            width: 12px;
            transition-duration: 0.3s;
        }

        .svgIcon path {
            fill: white;
        }

        .button:hover {
            transition-duration: 0.3s;
            background-color: rgb(255, 69, 69);
            align-items: center;
            gap: 0;
        }

        .bin-top {
            transform-origin: bottom right;
        }

        .button:hover .bin-top {
            transition-duration: 0.5s;
            transform: rotate(160deg);
        }

        /* Update Button */
        .setting-btn {
            width: 40px;
            height: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            /* background-color: rgb(129, 110, 216); */
            background-color: #176B87;
            border-radius: 50%;
            cursor: pointer;
            border: none;
            box-shadow: 0px 0px 0px 2px rgb(212, 209, 255);
        }

        .bar {
            width: 20%;
            height: 2px;
            background-color: rgb(229, 229, 229);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 2px;
        }

        .bar::before {
            content: "";
            width: 2px;
            height: 2px;
            background-color: rgb(126, 117, 255);
            position: absolute;
            border-radius: 10%;
            border: 2px solid white;
            transition: all 0.3s;
            box-shadow: 0px 0px 5px white;
        }

        .bar1::before {
            transform: translateX(-4px);
        }

        .bar2::before {
            transform: translateX(4px);
        }

        .setting-btn:hover .bar1::before {
            transform: translateX(4px);
        }

        .setting-btn:hover .bar2::before {
            transform: translateX(-4px);
        }
        .setting-btn a{
            display: flex;
            flex-direction: row;
        }
        
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">

            <li class="active">
                <a href="./index.php">
                    <i class='bx bxs-home'></i>
                    <span>Homepage</span>

                </a>
            </li>

            <li>
                <a href="#about">
                    <i class='bx bxs-info-circle'></i>
                    <span>About</span>
                </a>
            </li>

            <li>
                <a href="#timeline">
                    <i class='bx bxs-graduation'></i>
                    <span>Timeline</span>
                </a>
            </li>

            <li>
                <a href="#experience">
                    <i class='bx bx-library'></i>
                    <span>Experience</span>
                </a>
            </li>

            <li>
                <a href="#project">
                    <i class='bx bxs-briefcase'></i>
                    <span>Projects</span>
                </a>
            </li>

            <li>
                <a href="#photography">
                    <i class='bx bxs-camera'></i>
                    <span>Photography</span>
                </a>
            </li>

            <li>
                <a href="#message">
                    <i class='bx bxs-message-dots'></i>
                    <span>Message</span>
                </a>
            </li>

            <li class="logout">
                <a href="./logout.php">
                    <i class='bx bx-log-out'></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="main--content">
        <div class="header--wraper">
            <div class="head-title">
                <span>Primary</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="../asset/profile-user.png" alt="">
            </div>
        </div>

        <section id="about">
            <div class="main--title--div">
                <h3 class="main--title">About</h3>
            </div>
            <div class="timeline-section">
                <div class="form-container">
                    <h2>Upload Section</h2>
                    <form action="../include/about.inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <tex type="text" name="bio" required placeholder="Enter Bio"> -->
                            <textarea name="bio" placeholder="Enter Bio" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="picture">Upload Picture:</label>
                            <input type="file" id="picture" name="picture" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
            <div class="timeline-section">
                <h2>Display Section</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Bio</th>
                                <th>Picture</th>
                                <th>Time</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            include './dbconnect.inc.php';

                            $sql = "SELECT * FROM `about`";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['sn'];
                                    $bio = $row['bio'];
                                    $picture = $row['picture'];
                                    $time = $row['time'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $bio; ?></td>
                                        <td><img src="<?php echo $picture; ?>" alt=""></td>
                                        <td><?php echo $time; ?></td>
                                        <td>
                                            <div class="table-btn-container">
                                                <button class="button">
                                                    <a href="../crud/delete_about.php?deleteid=<?php echo $id; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14" class="svgIcon bin-top">
                                                            <g clip-path="url(#clip0_35_24)">
                                                                <path fill="black" d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_24">
                                                                    <rect fill="white" height="14" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57" class="svgIcon bin-bottom">
                                                            <g clip-path="url(#clip0_35_22)">
                                                                <path fill="black" d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_22">
                                                                    <rect fill="white" height="57" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>


                                                </button>

                                                <button class="setting-btn">
                                                    <a href="../crud/update_about.php?updateid=<?php echo $id; ?>">
                                                        <span class="bar bar1"></span>
                                                        <span class="bar bar2"></span>
                                                        <span class="bar bar1"></span>
                                                    </a>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $bio . '</td>
                                        <td>' . $picture . '</td>
                                        <td>' . $time . '</td>
                                        <td>                                   
                                        <button><a href="../crud/delete_about.php ? deleteid=' . $id . '">Delete</a> </button>
                                        <button><a href="../crud/update_about.php ? updateid=' . $id . '">Update</a> </button>
                                        </td>           
                                    </tr>; -->
                            <?php
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </section>

        <section id="timeline">
            <div class="main--title--div">
                <h3 class="main--title">Timeline</h3>
            </div>
            <div class="timeline-section">
                <div class="form-container">
                    <h2>Upload Section</h2>
                    <form action="../include/timeline.inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label for="name">University Name:</label> -->
                            <input type="text" name="uniname" required placeholder="University Name">
                        </div>
                        <div class="form-group">
                            <!-- <label for="email">Degree:</label> -->
                            <input type="text" name="degree" required placeholder="Degree">
                        </div>
                        <div class="form-group">
                            <!-- <label for="subject">Year:</label > -->
                            <input type="text" name="year" required required placeholder="Year">
                        </div>
                        <div class="form-group">
                            <!-- <label for="message">Description:</label> -->
                            <textarea name="description" placeholder="Description" rows="5" required></textarea>
                            <!-- <input type="text" name="description" required required placeholder="Description"> -->
                        </div>
                        <div class="form-group">
                            <label for="picture">Upload University Logo:</label>
                            <input type="file" id="picture" name="picture" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>

            <div class="timeline-section">
                <h2>Display Section</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>University</th>
                                <th>Degree</th>
                                <th>Year</th>
                                <th>Description</th>
                                <th>Logo</th>
                                <th>Operations</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            include './dbconnect.inc.php';

                            $sql = "SELECT * FROM `timeline`";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['sn'];
                                    $university = $row['university'];
                                    $degree = $row['degree'];
                                    $year = $row['year'];
                                    $description = $row['description'];
                                    $image = $row['image'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $university; ?></td>
                                        <td><?php echo $degree; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td><img src="<?php echo $image; ?>" alt=""></td>
                                        <td>
                                            <div class="table-btn-container">
                                                <button class="button">
                                                    <a href="../crud/delete_timeline.php?deleteid=<?php echo $id; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14" class="svgIcon bin-top">
                                                            <g clip-path="url(#clip0_35_24)">
                                                                <path fill="black" d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_24">
                                                                    <rect fill="white" height="14" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57" class="svgIcon bin-bottom">
                                                            <g clip-path="url(#clip0_35_22)">
                                                                <path fill="black" d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_22">
                                                                    <rect fill="white" height="57" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>


                                                </button>

                                                <button class="setting-btn">
                                                    <a href="../crud/update_timeline.php?updateid=<?php echo $id; ?>">
                                                        <span class="bar bar1"></span>
                                                        <span class="bar bar2"></span>
                                                        <span class="bar bar1"></span>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $university . '</td>
                                        <td>' . $degree . '</td>
                                        <td>' . $year . '</td>
                                        <td>' . $description . '</td>
                                        <td>' . $image . '</td>
                                        <td>                                   
                                        <button><a href="../crud/delete_timeline.php ? deleteid=' . $id . '">Delete</a> </button>
                                        <button><a href="../crud/update_timeline.php ? updateid=' . $id . '">Update</a> </button>
                                        </td>           
                                    </tr>; -->
                            <?php
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </section>

        <section id="experience">
            <div class="main--title--div">
                <h3 class="main--title">Experience</h3>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Query</td>
                            <td>Hello, I have a question...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="project">
            <div class="main--title--div">
                <h3 class="main--title">Projects</h3>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Query</td>
                            <td>Hello, I have a question...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="photography">
            <div class="main--title--div">
                <h3 class="main--title">Photography</h3>
            </div>

            <div class="timeline-section">
                <div class="form-container">
                    <h2>Upload Section</h2>
                    <form action="../include/photography.inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label for="name">University Name:</label> -->
                            <input type="text" name="title" required placeholder="Tile">
                        </div>
                        <div class="form-group">
                            <!-- <label for="email">Degree:</label> -->
                            <input type="text" name="location" required placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="picture">Upload Images:</label>
                            <input type="file" id="picture" name="picture" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>

            <div class="timeline-section">
                <h2>Display Section</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>Time</th>
                                <th>Operations</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            include './dbconnect.inc.php';

                            $sql = "SELECT * FROM `photography`";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['sn'];
                                    $title = $row['title'];
                                    $location = $row['location'];
                                    $image = $row['image'];
                                    $time = $row['time'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $location; ?></td>
                                        <td><img src="<?php echo $image; ?>" alt=""></td>
                                        <td><?php echo $time; ?></td>
                                        <td>
                                            <div class="table-btn-container">
                                                <button class="button">
                                                    <a href="../crud/delete_photography.php?deleteid=<?php echo $id; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14" class="svgIcon bin-top">
                                                            <g clip-path="url(#clip0_35_24)">
                                                                <path fill="black" d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_24">
                                                                    <rect fill="white" height="14" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57" class="svgIcon bin-bottom">
                                                            <g clip-path="url(#clip0_35_22)">
                                                                <path fill="black" d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_35_22">
                                                                    <rect fill="white" height="57" width="69"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>


                                                </button>

                                                <button class="setting-btn">
                                                    <a href="../crud/update_photography.php?updateid=<?php echo $id; ?>">
                                                        <span class="bar bar1"></span>
                                                        <span class="bar bar2"></span>
                                                        <span class="bar bar1"></span>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </section>

        <section id="message">
            <div class="main--title--div">
                <h3 class="main--title">Message</h3>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Operation</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        include './dbconnect.inc.php';

                        $sql = "SELECT * FROM `message`";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $subject = $row['subject'];
                                $message = $row['message'];
                                $time = $row['time'];
                                echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>' . $subject . '</td>
                <td>' . $message . '</td>
                <td>' . $time . '</td>
                <td>  
                                                      
                <button><a href="../crud/delete_message.php ? deleteid=' . $id . '">
                
                <div class="table-btn-container">
                    <button class="button">
                                    
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14" class="svgIcon bin-top">
                            <g clip-path="url(#clip0_35_24)">
                                                            <path fill="black" d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"></path>
                            </g>
                                        <defs>
                                                            <clipPath id="clip0_35_24">
                                                                <rect fill="white" height="14" width="69"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57" class="svgIcon bin-bottom">
                                                        <g clip-path="url(#clip0_35_22)">
                                                            <path fill="black" d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_35_22">
                                                                <rect fill="white" height="57" width="69"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>

                                                    
                                                </button>
                </a> 
                </button>
                
                </td>           
                </tr>';
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </section>



    </div>

</body>

</html>