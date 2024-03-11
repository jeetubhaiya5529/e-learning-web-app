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
        if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $lesson_id = $_REQUEST['lesson_id'];
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $lesson_link = '../lessonvid/'. $_FILES['lesson_link']['name'];  

            $stmt = $conn->prepare("UPDATE lesson SET lesson_name = ?, lesson_desc = ?, course_id = ?, course_name = ?, lesson_link = ? WHERE lesson_id = ?");
            $stmt->bind_param("sssssi", $lesson_name, $lesson_desc, $course_id, $course_name, $lesson_link, $lesson_id);

        // Execute the statement
        if($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Updated Successfully</div>';   
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update lesson</div>';  
        }

        // Close statement
        $stmt->close();
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_ID">Lesson ID</label>
            <input type="text" name="lesson_id" id="lesson_id" class="form-control" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" name="lesson_name" id="lesson_name" class="form-control" value="<?php if(isset($row['lesson_name'])){ echo $row['lesson_name']; }?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" class="form-control" row=2><?php if(isset($row['lesson_desc'])){ echo $row['lesson_desc']; }?></textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" id="course_id" class="form-control" value="<?php if(isset($row['course_id'])){ echo $row['course_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" value="<?php if(isset($row['course_name'])){ echo $row['course_name']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php if(isset($row['lesson_link'])){ echo $row['lesson_link']; }?>" allowfullscreen></iframe>
            </div>
            <input type="file" name="lesson_link" id="lesson_link" class="form-control-file">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> 
</div>