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

    if(isset($_REQUEST['lessonSubmitBtn'])){
        // checking for empty fields
        if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = '../lessonvid/'.$lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $lesson_name, $lesson_desc, $link_folder, $course_id, $course_name);

            // Execute the statement
            if($stmt->execute()) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Add Successfully</div>';   
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add lesson</div>';  
            }

            // Close statement
            $stmt->close();
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" id="course_id" class="form-control" value="<?php if(isset($_SESSION['course_id'])) { echo $_SESSION['course_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" value="<?php if(isset($_SESSION['course_name'])) { echo $_SESSION['course_name']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" name="lesson_name" id="lesson_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" class="form-control" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" name="lesson_link" id="lesson_link" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> 
</div>