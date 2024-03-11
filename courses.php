<?php
    include('./mainInclude/header.php');
    include('./dbConnection.php');
?>

<!-- Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="images/bg.jpeg" alt="courses" style="height: 500px; width: 100%; object-fit:cover; box-shadow: 10px;">
    </div>
</div>

<section class="courses" id="courses">
  <div class="title">
    <h2>courses we offer</h2>
    <p>Unlock Your Potential with Digital Pathshala's Courses – Your Path to Knowledge and Skills.</p>
  </div>
  <div class="container-fluid courses-container">
    <div class="box">
      <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $course_id = $row['course_id'];
            echo '
            <div class="image">
              <img src="' . str_replace('..', '.', $row['course_img']). '" alt="">
              <span>Admission open</span>
            </div>
            <div class="info">
              <h4>' .$row['course_name']. '</h4>
              <p>' .$row['course_desc']. '</p>
              <ul class="list">
                <li>Price</li>
                <li class="mrp">₹' .$row['course_original_price']. '</li>
                <li class="sp">₹' .$row['course_price']. '</li>
              </ul>
              <a href="courseDesc.php?course_id='.$course_id.'" class="btn">Enroll</a>
            </div>
            ';
          }
        }
      ?>
    </div>  
  </div>
</section>

<?php
    include('./mainInclude/footer.php');
?>