<!doctype html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styling -->
    <link rel="stylesheet" href="../adminStyle.css">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  </head>
  <body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dard fixed-top p-0 shadow" style="background-color: #225470;">
        <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0 text-light">Digital Pathshala <small class="text-light">Admin Area</small></a>
    </nav>

    <!-- Side bar -->
    <div class="container-fluid mb-5" style="margin-top: 40px">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light siderbar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link">
                                <i class="ri-speed-up-fill"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                                <i class="ri-macbook-fill"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lessons.php" class="nav-link">
                                <i class="ri-book-open-fill"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link">
                                <i class="ri-graduation-cap-fill"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sellReport.php" class="nav-link">
                                <i class="ri-bar-chart-fill"></i>
                                Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminPaymentStatus.php" class="nav-link">
                                <i class="ri-money-dollar-circle-fill"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminFeedback.php" class="nav-link">
                                <i class="ri-feedback-fill"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminChangePass.php" class="nav-link">
                                <i class="ri-lock-fill"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="ri-logout-circle-r-line"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>