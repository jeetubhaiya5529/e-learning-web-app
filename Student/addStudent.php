<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

// checking email already registered
if(isset($_POST['checkmail']) && isset($_POST['signupEmail'])){
    $signupEmail = $_POST['signupEmail'];
    $sql = "SELECT stu_email FROM student WHERE stu_email = '".$signupEmail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// Insert Student
if(isset($_POST['signupStu']) && isset($_POST['signupUsername']) && isset($_POST['signupEmail']) && isset($_POST['signupPass'])){
    $signupUsername = $_POST['signupUsername'];
    $signupEmail = $_POST['signupEmail'];
    $signupPass = $_POST['signupPass'];

    $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUES ('$signupUsername', '$signupEmail', '$signupPass')";

    if($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}


// Student Login Verification
if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogEmail']) && isset($_POST['loginEmail']) && isset($_POST['loginPass'])){
        $loginEmail = $_POST['loginEmail'];
        $loginPass = $_POST['loginPass'];

        $sql = "SELECT stu_email, stu_pass FROM student WHERE stu_email = '".$loginEmail."' AND stu_pass = '".$loginPass."'";

        $result = $conn->query($sql);

        $row = $result->num_rows;

        if($row === 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['loginEmail'] = $loginEmail;
            echo json_encode($row);
        } else if($row === 0) {
            echo json_encode($row);
        }
    }
}
?> 
