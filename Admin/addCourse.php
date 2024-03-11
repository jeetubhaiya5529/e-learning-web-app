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

    if(isset($_REQUEST['courseSubmitBtn'])){
        // checking for empty fields
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_original_price'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_img = $_FILES['course_img']['name'];
            $course_img_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../images/courseimg/'.$course_img;
            move_uploaded_file($course_img_temp, $img_folder);

            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $course_name, $course_desc, $course_author, $img_folder, $course_duration, $course_price, $course_original_price);

            // Execute the statement
            if($stmt->execute()) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';   
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add course</div>';  
            }

            // Close statement
            $stmt->close();
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="course_name">Course Description</label>
            <textarea name="course_desc" id="course_desc" class="form-control" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="course_name">Author</label>
            <input type="text" name="course_author" id="course_author" class="form-control">
        </div>
        <div class="form-group">
            <label for="course_name">Course Duration</label>
            <input type="text" name="course_duration" id="course_duration" class="form-control">
        </div>
        <div class="form-group">
            <label for="course_name">Course Original Price</label>
            <input type="text" name="course_original_price" id="course_original_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="course_name">Course Selling Price</label>
            <input type="text" name="course_price" id="course_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="course_name">Course Image</label>
            <input type="file" name="course_img" id="course_img" class="form-control-file">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> 
</div>