<?php

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

$date=date("d-m-y");
date_default_timezone_set("asia/kolkata");
$time=date("h:i:sa");
$datetime=$date." ".$time;


$conn = mysqli_connect("localhost", "root", "", "digitalpathsala");
$ins = "insert into contact (name, email, mobile, message, datetime) values ('$name', '$email', '$mobile', '$message', '$datetime')";
if(mysqli_query($conn, $ins))
{
    header("location:index.php"); 
}
else
{
    echo "Something Went Wrong";
}
?>