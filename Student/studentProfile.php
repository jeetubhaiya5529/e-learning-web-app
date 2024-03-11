<?php
if(!isset($_SESSION)){
    session_start();
}

include('./stuInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['loginEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
}

$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
}

if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName'] == "")){
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../images/stu/'. $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);

        $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
        if($conn->query($sql) == TRUE){
            // below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Update Successfully</div>';
        } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';            
        }

    }
}
?>

<div class="col-sm-6 mt-5">
    <form action="" method="POST" class="mx-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" name="stuId" id="stuId" class="form-control" value="<?php if(isset($stuId)){ echo $stuId; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="text" name="stuEmail" id="stuEmail" class="form-control" value="<?php if(isset($stuEmail)){ echo $stuEmail; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" name="stuName" id="stuName" class="form-control" value="<?php if(isset($stuName)){ echo $stuName; } ?>">
        </div>
        <div class="form-group">
            <label for="stuOcc">Occupation</label>
            <input type="text" name="stuOcc" id="stuOcc" class="form-control" value="<?php if(isset($stuOcc)){ echo $stuOcc; } ?>">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" name="stuImg" id="stuImg" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        <?php if(isset($passmsg)){ echo $passmsg; } ?>
    </form>
</div>

</div> <!-- close row div from header file -->
</div>