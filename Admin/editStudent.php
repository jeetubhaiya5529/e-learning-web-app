<?php
if(!isset($_SESSION)){
session_start();
}
    include('./adminInclude/header.php');
    include('../dbConnection.php');

    if(isset($_SESSION['is_admin_login'])){
        $adminEmail = $_SESSION['adminEmail'];
    } else {
        echo "<script>location.href='../index.php';</script>";
    }


    // Update code
    if(isset($_REQUEST['reqUpdate'])){
        // checking for empty fields
        if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $stu_id = $_REQUEST['stu_id'];
            $stu_name = $_REQUEST['stu_name'];
            $stu_email = $_REQUEST['stu_email'];
            $stu_pass = $_REQUEST['stu_pass'];
            $stu_occ = $_REQUEST['stu_occ'];

            $stmt = $conn->prepare("UPDATE student SET stu_name = ?, stu_email = ?, stu_pass = ?, stu_occ = ? WHERE stu_id = ?");
            $stmt->bind_param("ssssi", $stu_name, $stu_email, $stu_pass, $stu_occ, $stu_id);

        // Execute the statement
        if($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Updated Successfully</div>';   
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update student</div>';  
        }

        // Close statement
        $stmt->close();
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" name="stu_id" id="stu_id" class="form-control" value="<?php if(isset($row['stu_id'])){ echo $row['stu_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Userame</label>
            <input type="text" name="stu_name" id="stu_name" class="form-control" value="<?php if(isset($row['stu_name'])){ echo $row['stu_name']; }?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Email Address</label>
            <input type="text" name="stu_email" id="stu_email" class="form-control" value="<?php if(isset($row['stu_email'])){ echo $row['stu_email']; }?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" name="stu_pass" id="stu_pass" class="form-control" value="<?php if(isset($row['stu_pass'])){ echo $row['stu_pass']; }?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" name="stu_occ" id="stu_occ" class="form-control" value="<?php if(isset($row['stu_occ'])){ echo $row['stu_occ']; }?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> 
</div>