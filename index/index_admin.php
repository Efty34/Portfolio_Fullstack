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
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        #timeline {
            background-image: url(../asset/timeline.jpg);
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
        #message{
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
        .main--title--div{
            width: 100%;
            height: 50px;
            background-color: white;
            padding-top: 10px;
            border-radius: 7px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">

            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
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

            <li>
                <a href="./index.php">
                    <i class='bx bxs-home'></i>
                    <span>Homepage</span>

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

                                    echo '<tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $bio . '</td>
                                        <td>' . $picture . '</td>
                                        <td>' . $time . '</td>
                                        <td>                                   
                                        <button><a href="../crud/delete_about.php ? deleteid=' . $id . '">Delete</a> </button>
                                        <button><a href="../crud/update_about.php ? updateid=' . $id . '">Update</a> </button>
                                        </td>           
                                        </tr>';
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

                                    echo '<tr>
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
                                        </tr>';
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
                                            <button><a href="../crud/delete_photography.php?deleteid=<?php echo $id; ?>">Delete</a></button>
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
                                                      
                <button><a href="../crud/delete_message.php ? deleteid=' . $id . '">Delete</a> </button>
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