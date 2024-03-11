<!doctype html>
<html lang="en">
  <head>
    <title>Digital Pathshala - An Institute of Career Skills</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon_io/favicon.ico"/>
    <meta name="title" content="Home - Digital Pathsala"/>
    <meta name="description" content="Learn Web Development & Designing · Youtuber & A/C Management · Digital Marketing · Graphic Designing & Animation · Spoken English Course..."/>
    <meta name="keywords" content="digitalpathshalastp, digitalpathsalastp, digitalpathsala, digitalpathshala, digitalpath, pathshalastp, pathshaladigitalstp, web development by digitalpathshalastp, digipathshalastp, courses by digitalpathshalastp, digital marketing by digitalpathshalastp, learn with digitalpathshalastp"/>
    <meta name="copyright" content="Copyright © 2022 Digital Pathsala All Rights Reserved."/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://www.digitalshalastp.com/"/>
    <meta property="og:title" content="Digital Pathsala - An Institute of Career Skills"/>
    <meta property="og:description" content="Learn Web Development & Designing · Youtuber & A/C Management · Digital Marketing · Graphic Designing & Animation · Spoken English Course..."/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Google search console-->
    <meta name="google-site-verification" content="ldQUwCeU42zgbQndTWKazLmWns5SkX9eo_SibsvA5Ow" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

  </head>
  <body>
    <!-- <a href="#" class="to-top">
        <i class="ri-arrow-up-line"></i>
    </a> -->
    <!-- =====================Navbar======================= -->
    <nav>
        <div class="container nav-container">
            <div class="logo">
                <img src="images/book-logo.png" alt="">
                <span>Digital Pathshala</span>
            </div>
            <div class="grp">
              <div class="navlist">
                <li><a href="index.php">home</a></li>
                <li><a href="#about">about</a></li>
                <li>
                  <a href="courses.php">courses</a>
                  <!-- <ul class="submenu">
                    <li><a href="#courses">courses</a></li>
                    <li><a href="course-details.php">courses details</a></li>
                  </ul> -->
                </li>
                <li><a href="payment-status.php">payment</a></li>
                <?php
                  session_start();
                  if(isset($_SESSION['is_login'])){
                    echo '<li><a href="Student/studentProfile.php">myprofile</a></li>
                          <li><a href="logout.php">logout</a></li>';
                  } else {
                    echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">login</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#signupModal">signup</a></li>';
                  }
                ?>
                <li><a href="#contact">contact</a></li>
              </div>
              <div class="user">
                <!-- <span class="icon ri-user-line"></span> -->
                <a href="#" class="icon ri-user-line"></a>
              </div>
              <div class="menu-btn">
                <span class="icon ri-menu-line"></span>
              </div>
            </div>
        </div>
    </nav>
