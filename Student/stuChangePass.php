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

    if(isset($_REQUEST['stuPassUpdateBtn'])){
        if(($_REQUEST['stuNewPass'] == "")){
            // msg displayed if required field missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields</>';
        } else {
            $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $stuPass = $_REQUEST['stuNewPass'];
                $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
                if($conn->query($sql) == TRUE){
                    // below msg display on form submit success
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Changed Successfully</div>';
                } else {
                    // below msg display on form submit failed
                    $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable To Change Password </div>';
                }
            }
        }
    }
?>
    
    <div class="col-sm-9 mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="" class="mt-5 mx-5">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="" id="inputEmail" class="form-control" value="<?php echo $stuEmail ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label>
                        <input type="password" name="stuNewPass" id="inputnewpassword" class="form-control" placeholder="New Password">
                    </div>
                    <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                    <?php if(isset($passmsg)) {echo $passmsg; } ?>
                </form>
            </div>
        </div>
    </div>