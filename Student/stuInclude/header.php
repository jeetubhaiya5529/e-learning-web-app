<?php
include('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['loginEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
}

if(isset($stuEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Profile Header</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styling -->
    <link rel="stylesheet" href="../adminStyle.css">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Digital Pathsala</a>
    </nav>
    <!-- side bar -->
    <div class="container-fluid mb-5" style="margin-top:40px">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="Studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link"><i class="ri-user-fill"></i>Profile <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link"><i class="ri-macbook-fill"></i>My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a href="stuFeedback.php" class="nav-link"><i class="ri-feedback-fill"></i>Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a href="stuChangePass.php" class="nav-link"><i class="ri-lock-fill"></i>Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link"><i class="ri-logout-circle-r-line"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>