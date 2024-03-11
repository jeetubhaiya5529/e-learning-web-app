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
        // Checking for empty fields
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_original_price'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_img = '../images/courseimg/'. $_FILES['course_img']['name'];  

            $stmt = $conn->prepare("UPDATE course SET course_name = ?, course_desc = ?, course_author = ?, course_img = ?, course_duration = ?, course_price = ?, course_original_price = ? WHERE course_id = ?");
            $stmt->bind_param("sssssssi", $course_name, $course_desc, $course_author, $course_img, $course_duration, $course_price, $course_original_price, $course_id);

        // Execute the statement
        if($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully</div>';   
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update course</div>';  
        }

        // Close statement
        $stmt->close();
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_ID">Course ID</label>
            <input type="text" name="course_id" id="course_id" class="form-control" value="<?php if(isset($row['course_id'])){ echo $row['course_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" value="<?php if(isset($row['course_name'])){ echo $row['course_name']; }?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" class="form-control" row=2><?php if(isset($row['course_desc'])){ echo $row['course_desc']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" name="course_author" id="course_author" class="form-control" value="<?php if(isset($row['course_author'])){ echo $row['course_author']; }?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" name="course_duration" id="course_duration" class="form-control" value="<?php if(isset($row['course_duration'])){ echo $row['course_duration']; }?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" name="course_original_price" id="course_original_price" class="form-control" value="<?php if(isset($row['course_original_price'])){ echo $row['course_original_price']; }?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" name="course_price" id="course_price" class="form-control" value="<?php if(isset($row['course_price'])){ echo $row['course_price']; }?>">
        </div>
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <img src="<?php if(isset($row['course_img'])){ echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
            <input type="file" name="course_img" id="course_img" class="form-control-file">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> 
</div>