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
?>

<div class="col-sm-9 mt-5">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="fomr-group col-md-2">
                <input type="date" name="startdate" id="startdate" class="form-control">
            </div> <span> to </span>
            <div class="fomr-group col-md-2">
                <input type="date" name="enddate" id="enddate" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-secondary" name="searchsubmit">
            </div>
        </div>
    </form>

    <?php
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];

        $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '<p class="bg-dark text-white p-2 mt-4">Details</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Course ID</th>
                        <th>Student Email</th>
                        <th>Payment Status</th>
                        <th>Order Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                            <th>'.$row["order_id"].'</th>
                            <th>'.$row["course_id"].'</th>
                            <th>'.$row["stu_email"].'</th>
                            <th>'.$row["status"].'</th>
                            <th>'.$row["order_date"].'</th>
                            <th>'.$row["amount"].'</th>
                        </tr>';
                    }
                echo '<tr>
                    <td>
                        <form action="" class="d-print-none">
                            <input type="submit" value="Print" class="btn btn-danger" onclick="window.print()">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>';
        } else {
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found</div>";
        }
    }
    ?>
</div>