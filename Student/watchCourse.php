<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['loginEmail'];
} else {
    echo "<script> location.href = '../index.php'; </script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Watch Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styling -->
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to Digital Pathshala</h3>
        <a href="./myCourse.php" class="btn btn-danger">My Course</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                        if(isset($_GET['course_id'])){
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '<li class="nav-item border-bottom py-2" movieurl='.$row[lesson_link].' style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video src="" id="videoarea" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
  </body>
</html>