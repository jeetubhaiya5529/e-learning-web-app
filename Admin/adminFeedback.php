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
    <!-- table -->
    <p class="bg-dark text-white p-2">List of Feedbacks</p>
    <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '<table class="table">
            <thead>
                <tr>
                    <th> Feedback Id</th>
                    <th> Content</th>
                    <th> Student Id</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>';
                while($row = $result->fetch_assoc()){
                    echo '<tr>';
                    echo '<th>'.$row["f_id"].'</th>';
                    echo '<td>'.$row["f_content"].'</td>';
                    echo '<td>'.$row["stu_id"].'</td>';
                    echo '<td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value='.$row["f_id"].'>
                                <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="ri-delete-bin-line"></i></button>
                            </form>
                        </td>
                    </tr>';
                }
            echo '</tbody>
            </table';
        } else {
            echo "0 Result";
        }
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
    ?>
</div>

    </div>