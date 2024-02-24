<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="../css/about.css">
  <link rel="stylesheet" href="../css/exp.css">
  <link rel="stylesheet" href="../css/project.css">
  <link rel="stylesheet" href="../css/photography.css">
  <link rel="stylesheet" href="../css/contact_footer.css">
  <link rel="stylesheet" href="../css/mediaqueries.css">
  <link rel="stylesheet" href="../css/timeline.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/scroll.css">

</head>

<body>

  <header class="header" id="header">
    <nav class="nav container">
      <div class="header-nav">
        <a href="#" class="nav__logo">
          Efty<span id="logo-span">_34</span>
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#about" class="nav__link active-link">
                <i class='bx bx-user nav__icon'></i>
                <span class="nav__name">About</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="#timelineid" class="nav__link">
                <i class='bx bx-book-open nav__icon'></i>
                <span class="nav__name">Timeline</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="#experience" class="nav__link">
                <i class='bx bx-book-alt nav__icon'></i>
                <span class="nav__name">Experience</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="#projects" class="nav__link">
                <i class='bx bx-briefcase-alt nav__icon'></i>
                <span class="nav__name">Projects</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="#photography" class="nav__link">
                <i class='bx bxs-camera nav__icon'></i>
                <span class="nav__name">Photography</span>
              </a>
            </li>
            <li class="nav__item">
              <a href="#contact" class="nav__link">
                <i class='bx bx-message-square-detail nav__icon'></i>
                <span class="nav__name">Contact</span>
              </a>
            </li>
            <li class="nav__item">
              <a href="#contact" class="nav__link">
                <i class='bx bx-cog nav__icon'></i>
                <a href="./index_login.php"><span class="nav__name">Admin</span></a>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section id="profile" class="hidden3">
    <div class="section_text hidden3">
      <p class="section_text_p1">Hello, I'm</p>
      <h1 class="title">Efty <span id="logo-span">Hasan</span></h1>
      <p class="section_text_p2">Student</p>
      <div class="btn-container">
        <button class="button" onclick="window.open('../asset/resume-example.pdf')">
          Download CV
        </button>
        <button class="button" onclick="location.href='./#contact'">
          Contact Info
        </button>
      </div>
      <div id="socials-container">
        <img src="../asset/github.png" alt="github profile" class="icon" onclick="location.href='https://github.com/Efty34'" />
        <img src="../asset/instagram.png" alt="instagram profile" class="icon" onclick="location.href='https://www.instagram.com/__efty_hasan__/'" />
      </div>
    </div>
  </section>

  <section id="about">

    <?php

    include './dbconnect.inc.php';

    $defaultParagraph = "A dynamic individual, passionate about continuous learning and personal growth.
     With a creative mindset and strong communication skills, thrive in diverse environments.
      My adaptability and curiosity drive me to explore new ideas, 
      connecting with others through empathy and understanding. 
      A catalyst for positive change, I embrace challenges with enthusiasm.";
    $defaultImageSrc = "../asset/mine.webp";

    $sql = "SELECT * FROM `about`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $paragraph = $row['bio'];
      $imageSrc = $row['picture'];

      mysqli_free_result($result);
    } else {
      $paragraph = $defaultParagraph;
      $imageSrc = $defaultImageSrc;
    }
    ?>

    <p class="section__text__p1">Get To Know More</p>
    <h1 class="title">About Me</h1>
    <div class="section-container">
      <div class="section__pic-container">
        <img src="<?php echo $imageSrc; ?>" alt="Profile picture" class="about-pic" />
      </div>
      <div class="about-details-container">

        <div class="text-container">
          <p>
            <?php echo $paragraph; ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="timelineid">
    <p class="section__text__p1">Discover additional insights</p>
    <h1 class="title">Timeline</h1>
    <div class="timeline-area hidden2">

      <?php

      include './dbconnect.inc.php';

      $sql = "SELECT * FROM `timeline`";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $name = $row['university'];
          $degree = $row['degree'];
          $year = $row['year'];
          $description = $row['description'];
          $file = $row['image'];

          echo '
        <div class="timeline-content hidden2">
            <div class="image-name">
                <img src="' . $file . '" alt="">
                <h2>' . $name . '</h2>
            </div>
            <h3>' . $degree . '</h3>
            <h4>' . $year . '</h4>
            <p>' . $description . '</p>
        </div>';
        }
        mysqli_free_result($result);
      } else {
        mysqli_error($conn);
      }
      ?>

      <!-- <div class="timeline-content hidden2">
        <div class="image-name">
          <img src="../asset/kuet2.png" alt="">
          <h2>KUET</h2>
        </div>
        <h3>BSC</h3>
        <h4>2020-</h4>
        <p>I am progressing towards my undergraduation degree in CSE.</p>
      </div> -->

      <div class="timeline-content hidden2">
        <div class="image-name">
          <img src="../asset/drmc.png" alt="">
          <h2>DRMC</h2>
        </div>
        <h3>College</h3>
        <h4>2018-2020</h4>
        <p>College graduate with a diverse academic background.</p>
      </div>

      <div class="timeline-content hidden2">
        <div class="image-name">
          <img src="../asset/drmc.png" alt="">
          <h2>DRMC</h2>
        </div>
        <h3>School</h3>
        <h4>2010-2018</h4>
        <p>I completed my primary and secondary education.</p>
      </div>



    </div>

  </section>

  <section id="experience">
    <p class="section__text__p1">Explore My</p>
    <h1 class="title">Expertise</h1>
    <div class="experience-details-container">
      <div class="about-containers">


        <div class="card-container">
          <div class="card">
            <div class="front-content">
              <p>Programming <br> Languages</p>
            </div>
            <div class="content">
              <p class="heading">Name</p>
              <p>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>C</h3>
                  <p>Experience</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>C++</h3>
                  <p>Experience</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>Java</h3>
                  <p>Experience</p>
                </div>
              </article>
              </p>
            </div>
          </div>
        </div>

        <div class="card-container">
          <div class="card">
            <div class="front-content">
              <p>Frontend <br> Development</p>
            </div>
            <div class="content">
              <p class="heading">Platform</p>
              <p>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>HTML</h3>
                  <p>Intermediate</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>CSS</h3>
                  <p>Intermediate</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>JavaScript</h3>
                  <p>Basic</p>
                </div>
              </article>
              </p>
            </div>
          </div>
        </div>



        <div class="card-container">
          <div class="card">
            <div class="front-content">
              <p>Backend <br> Development</p>
            </div>
            <div class="content">
              <p class="heading">Platform</p>
              <p>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>SQL</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>PHP</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <img src="../asset/checkmark.png" alt="Experience icon" class="icon" />
                <div>
                  <h3>Git</h3>
                  <p>Basic</p>
                </div>
              </article>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="projects">
    <p class="section__text__p1">Browse My Recent</p>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers hidden">

        <div class="cards">
          <div class="card red">
            <div class="details-container color-container hidden">
              <h2 class="experience-sub-title project-title">OOP Project</h2>
              <div class="article-container">
                <img src="../asset/oop.jpg" alt="Project 1" class="project-img" />
              </div>
              <h2 class="experience-sub-title project-title">Title: InFoo</h2>
              <div class="btn-container">
                <button class="project-btn" onclick="location.href='https://github.com/Efty34/InFoo'">
                  Github
                </button>
                <button class="project-btn" onclick="window.open('./asset/infoo_OOP.mkv')">
                  Live Demo
                </button>
              </div>
            </div>
          </div>
          <div class="card blue">
            <div class="details-container color-container hidden">
              <h2 class="experience-sub-title project-title">Advanced Programming</h2>
              <div class="article-container">
                <img src="../asset/apl.jpg" alt="Project 2" class="project-img" />
              </div>
              <h2 class="experience-sub-title project-title">Title: InFoo</h2>
              <div class="btn-container">
                <button class="project-btn" onclick="location.href='https://github.com/Efty34/InFoo_AdvanceProgramming'">
                  Github
                </button>
                <button class="project-btn" onclick="window.open('./asset/InfooPreview.mkv')">
                  Live Demo
                </button>
              </div>
            </div>
          </div>
          <div class="card green">
            <div class="details-container color-container hidden">
              <h2 class="experience-sub-title project-title">HTML, CSS, JS</h2>
              <div class="article-container">
                <img src="../asset/game.svg" alt="Project 3" class="project-img" />
              </div>
              <h2 class="experience-sub-title project-title">Title: Guess/Die</h2>
              <div class="btn-container">
                <button class="project-btn" onclick="location.href='https://github.com/Efty34/Little-Game-Project'">
                  Github
                </button>
                <button class="project-btn" onclick="location.href='https://efty34.github.io/Little-Game-Project/'">
                  Live Demo
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section id="photography">
    <div class="photo-bottom">
      <p class="section__text__p1">Beyond the Journey </p>
      <h1 class="title">Photography</h1>
    </div>

    <!-- carousel -->
    <div class="carousel">
      <!-- list item -->
      <div class="list">
        <?php

        include '../index/dbconnect.inc.php';

        $sql = "SELECT * FROM `photography`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

            $title = htmlspecialchars($row['title']);
            $location = htmlspecialchars($row['location']);
            $image = htmlspecialchars($row['image']);

        ?>

            <div div class="item">
              <img src="<?php echo $image; ?>">
              <div class="content">
                <div class="author"><?php echo $title; ?></div>
                <div class="title"><?php echo $location; ?></div>
              </div>
            </div>
        <?php
          }
        } else {
          mysqli_error($conn);
        }
        ?>
        <div class="item">
          <img src="../asset/im1.webp">
          <div class="content">
            <div class="author">24.4859° N, 91.7765° E</div>
            <div class="title">Brontide.</div>
          </div>
        </div>
        <div class="item">
          <img src="../asset/im2.webp">
          <div class="content">
            <div class="author">21.8182° N, 90.1398° E</div>
            <div class="title">Evigheden.</div>
          </div>
        </div>
        <div class="item">
          <img src="../asset/im3.webp">
          <div class="content">
            <div class="author">22.4944° N, 92.2212° E</div>
            <div class="title">Evanescent.</div>
          </div>
        </div>
        <div class="item">
          <img src="../asset/im4.webp">
          <div class="content">
            <div class="author">25.0667° N, 91.4072° E</div>
            <div class="title">Psithurism.</div>
          </div>
        </div>
      </div>
      <!-- list thumnail -->
      <div class="thumbnail">
        <?php

        include '../index/dbconnect.inc.php';

        $sql = "SELECT * FROM `photography`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

            $title = htmlspecialchars($row['title']);
            $location = htmlspecialchars($row['location']);
            $image = htmlspecialchars($row['image']);

        ?>

            <div class="item">
              <img src="<?php echo $image; ?>">
            </div>
        <?php
          }
        } else {
          mysqli_error($conn);
        }
        ?>
        <div class="item">
          <img src="../asset/im1.webp">
        </div>
        <div class="item">
          <img src="../asset/im2.webp">
        </div>
        <div class="item">
          <img src="../asset/im3.webp">
        </div>
        <div class="item">
          <img src="../asset/im4.webp">
        </div>
      </div>
      <!-- next prev -->

      <div class="arrows">
        <button id="prev">
          < </button>
            <button id="next">></button>
      </div>
      <!-- time running -->
      <div class="time"></div>
    </div>
  </section>

  <section id="contact">
    <p class="section__text__p1">Get in Touch</p>
    <h1 class="title">Contact Me</h1>

    <div class="container">
      <div class="contact-info">
        <h2>Contact Information</h2>
        <div class="personal-con-info">
          <div class="con-info-icon">
            <img src="../asset/email.png" alt="">
            <img src="../asset/pc.png" alt="">
            <img src="../asset/add.png" alt="">
          </div>
          <div class="con-info">
            <p> efty17.hasan@gmail.com</p>
            <p> +1234567890</p>
            <p> Khulna, Bangladesh</p>
          </div>
        </div>

      </div>
      <div class="contact-form">
        <div class="contact-me">
          <h2>Contact Me</h2>
        </div>

        <form action="index.php" method="post">
          <?php

          include './dbconnect.inc.php';

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            $errors = [];
            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
              $errors[] = "All fields are required";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errors[] = "Invalid email format";
            }

            if (empty($errors)) {
              $sql = "INSERT INTO `message` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
              $stmt = mysqli_prepare($conn, $sql);
              if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script> alert('Message Sent'); </script>";
              }
            }
          }

          ?>
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <input type="text" name="subject" placeholder="Subject" required>
          <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
          <div class="button-only">
            <button class="btn-con" type="submit">
              <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                    </path>
                  </svg>
                </div>
              </div>
              <span>Send</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <footer>
    <p>Copyright &#169; littleGiant_34. All Rights Reserved.</p>
  </footer>

  <script src="../script/script2.js"></script>
  <script src="../script/main.js"></script>
  <script src="../script/scroll.js"></script>
</body>

</html>