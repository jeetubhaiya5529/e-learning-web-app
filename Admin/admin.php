<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

// Admin Login Verification
if(!isset($_SESSION['is_admin_login'])){
    if(isset($_POST['checkAdminLogEmail']) && isset($_POST['adminEmail']) && isset($_POST['adminPass'])){
        $adminEmail = $_POST['adminEmail'];
        $adminPass = $_POST['adminPass'];

        $sql = "SELECT admin_email, admin_pass FROM `admin` WHERE admin_email = '".$adminEmail."' AND admin_pass = '".$adminPass."'";

        $result = $conn->query($sql);

        $row = $result->num_rows;

        if($row === 1) {
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminEmail'] = $adminEmail;
            echo json_encode($row);
        } else if($row === 0) {
            echo json_encode($row);
        }
    }
}
?> 