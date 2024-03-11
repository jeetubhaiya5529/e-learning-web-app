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
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) {
            echo '<tr>';
                echo '<th>'.$row['stu_id'].'</th>';
                echo '<td>'.$row['stu_name'].'</td>';
                echo '<td>'.$row['stu_email'].'</td>';
                echo '<td>
                        <form action="editStudent.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value='.$row["stu_id"].'>
                            <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="ri-pencil-line"></i>
                        </form>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="id" value='.$row["stu_id"].'>
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="ri-delete-bin-line"></i></button>
                        </form>
                      </td>';
            echo '</tr>';
            } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Result";
    } 
    
    // Delete course button code
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>

<div>
    <a href="./addStudent.php" class="btn btn-danger box"><i class="ri-add-fill"></i></a>
</div>