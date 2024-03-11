<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php');
?>

<!-- =========================HOME========================== -->

<section class="home" id="home">
  <div class="container home-container">
    <h6>#DIGITALPATHSHALA</h6>
    <h4>An Institution of Career Skills</h4>
    <h1>Be a Passionate Person By Making Career in your Passion</h1>
    <div class="home-btns">
      <button class="btn">Learn More</button>
      <?php
        if(!isset($_SESSION['is_login'])){
          echo '<button class="btn s-btn" data-toggle="modal" data-target="#signupModal">Get Started</button>
          ';
        } else {
          echo '<a href="Student/studentProfile.php" class="btn s-btn">my profile</a>';
        }
      ?>
    </div>
  </div>
</section>

<!-- =========================Feature========================== -->

<div class="feature-container">
  <div class="box box-1">
    <span class="ri-rocket-line"></span>
    <h4>Superior Content</h4>
    <p>We strive to deliver the highest caliber of content that educates, inspires, and entertains. Stay connected with us as we continue to raise the bar, consistently delivering superior content that meets and exceeds your expectations.</p>
  </div>
  <div class="box box-2">
    <span class="ri-graduation-cap-line"></span>
    <h4>Global Certification</h4>
    <p>Our ISO 9001:2015 certification demonstrates our unwavering commitment to quality management. This internationally recognized standard ensures that we consistently meet customer needs and enhance customer satisfaction through continuous improvement.</p>
  </div>
  <div class="box box-3">
    <span class="ri-book-open-line"></span>
    <h4>Wide Library</h4>
    <p>Welcome to our vast and diverse library, a treasure trove of knowledge, entertainment, and inspiration. At Digital Pathshala, we've curated an expansive collection of books, digital resources, and multimedia content to cater to every curiosity and interest.</p>
  </div>
  <div class="box box-4">
    <span class="ri-presentation-line"></span>
    <h4>Professional Teachers</h4>
    <p>Our platform connects you with a expert and experienced teachers to guide you towards success. Prepare to be inspired, motivated, and empowered as you embark on a journey of growth and achievement with our top-notch mentors by your side.</p>
  </div>
</div>

<!-- =========================About========================== -->

<section class="about" id="about">
  <div class="title">
    <h2>Welcome to Digital Pathshala</h2>
    <p>Welcome to Digital Pathshala, where the doors to knowledge are always open, and the journey of learning knows no boundaries.</p>
  </div>
  <div class="container about-container">
    <div class="left">
      <div class="card">
        <span class="ri-computer-line"></span>
        <div class="info">
          <h4>Online Courses</h4>
          <button class="btn">Read more</button>
        </div>
      </div>
      <div class="card">
        <span class="ri-group-line"></span>
        <div class="info">
          <h4>Friendly Environment</h4>
          <button class="btn">Read more</button>
        </div>
      </div>
      <div class="card">
        <span class="ri-basketball-line"></span>
        <div class="info">
          <h4>Activities</h4>
          <button class="btn">Read more</button>
        </div>
      </div>
      <div class="card">
        <span class="ri-presentation-line"></span>
        <div class="info">
          <h4>Certified Teachers</h4>
          <button class="btn">Read more</button>
        </div>
      </div>
    </div>
    <div class="right">
      <img src="images/about.jpeg" alt="">
    </div>
  </div>
</section>

<!-- =========================courses========================== -->

<section class="courses" id="courses">
  <div class="title">
    <h2>courses we offer</h2>
    <p>Unlock Your Potential with Digital Pathshala's Courses – Your Path to Knowledge and Skills.</p>
  </div>
  <div class="container-fluid courses-container">
    <div class="box">
      <?php
        $sql = "SELECT * FROM course LIMIT 3";
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

<!-- =========================team========================== -->

<section class="team" id="team">
  <div class="title">
    <h2>OUR EXPERIENCED PROFESSOR</h2>
    <p>Guiding the Future, One Lesson at a Time – Meet Our Experienced Professors at Digital Pathshala.</p>
  </div>
  <div class="container team-container">
    <div class="card">
      <img src="images/mentor1.jpeg" alt="">
      <div class="info">
        <h4>Vinayak Mishra</h4>
        <p>Mentor</p>
      </div>
    </div>
    <div class="card">
      <img src="images/mentor2.jpeg" alt="">
      <div class="info">
        <h4>Vivek Yadav</h4>
        <p>Mentor</p>
      </div>
    </div>
    <div class="card">
      <img src="images/mentor3.jpeg" alt="">
      <div class="info">
        <h4>Raman Prajapati</h4>
        <p>Mentor</p>
      </div>
    </div>
    <div class="card">
      <img src="images/mentor4.jpeg" alt="">
      <div class="info">
        <h4>Harshit Singh</h4>
        <p>Mentor</p>
      </div>
    </div>
    <h6><i>*These pictures are just for viewing and have no connection with real life. Actually our mentors are different from these pictures</i></h6>
  </div>
</section>

<!-- =========================blog========================== -->

<section class="blog" id="blog">
  <div class="title">
    <h2>upcoming events</h2>
    <p>Stay Ahead of the Curve: Discover What's Coming Next with Digital Pathshala's Upcoming Events.</p>
  </div>
  <div class="container blog-container">
    <a href="https://techglossary.in/what-are-the-10-mind-blowing-technology/">
      <div class="card">
        <div class="image">
          <img src="images/mind-blowing.jpg" alt="">
          <div class="tag">
            <span>29</span>
            <p>JUL</p>
          </div>
        </div>
        <div class="info">
          <h4>What are the 10 Mind-Blowing Technology Innovations That Will Shape the Future?</h4>
          <h5>Posted by: <span>Digital Pathshala</span></h5>
          <p>Explore the cutting-edge tech innovations shaping tomorrow’s world. Uncover futuristic breakthroughs and their impact on society, what are the 10 Mind-Blowing Technology Innovations That Will Shape the Future.</p>
        </div>
      </div>
    </a>
    <a href="https://techglossary.in/how-technology-is-revolutionizing/">
      <div class="card">
        <div class="image">
          <img src="images/daily-lives.jpg" alt="">
          <div class="tag">
            <span>15</span>
            <p>AUG</p>
          </div>
        </div>
        <div class="info">
          <h4>The Untold Story of How Technology Is Revolutionizing Our Daily Lives</h4>
          <h5>Posted by: <span>Digital Pathshala</span></h5>
          <p>Explore the untold impact of technology on our everyday routines. Discover how innovation is reshaping the way we live and interact and how revolutionizing</p>
        </div>
      </div>
    </a>
    <a href="https://techglossary.in/7-futuristic-technologies-that-exist-today/">
      <div class="card">
        <div class="image">
          <img src="images/scifi.jpg" alt="">
          <div class="tag">
            <span>02</span>
            <p>SEP</p>
          </div>
        </div>
        <div class="info">
          <h4>7 Futuristic Technologies Today: From Sci-Fi to Reality</h4>
          <h5>Posted by: <span>Digital Pathshala</span></h5>
          <p>Discover the incredible advancements that have transitioned from science fiction fantasies to real-world technologies in our latest article, '7 Futuristic Technologies Today: From Sci-Fi to Reality.' Explore the innovations reshaping our world right now.</p>
        </div>
      </div>
    </a>
  </div>
</section>

<!-- =========================testimonial========================== -->

<section class="testimonial" id="testimonial">
  <div class="title">
    <h2>what are the students says</h2>
  </div>
  <div class="container testimonial-container">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
      <?php
            $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                $s_img = $row['stu_img'];
                $n_img = str_replace('..', '.', $s_img);
          ?>
        <div class="swiper-slide"> 
          <div class="image">
            <img src="<?php echo $n_img; ?>" alt="">
          </div>
          <h5><?php echo $row['stu_name']; ?></h5>
          <small><?php echo $row['stu_occ']; ?></small>
          <div class="rating">
            <span class="icon ri-star-fill"></span>
            <span class="icon ri-star-fill"></span>
            <span class="icon ri-star-fill"></span>
            <span class="icon ri-star-fill"></span>
            <span class="icon ri-star-half-fill"></span>
          </div>
          <p><?php echo $row['f_content']; ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<!-- =========================contact========================== -->

<section class="contact" id="contact">
<div class="title">
<h2>Get in touch</h2>
</div>
<div class="container contact-container">
<div class="content">
  <div class="box">
    <span class="icon ri-home-2-line"></span>
    <div>
      <h5>SITAPUR, UTTAR PRADESH (261001)</h5>
      <p>HOUSE NO. 303, NCC CHAURAHA, ARYA NAGAR</p>
    </div>
  </div>
  <div class="box">
    <span class="icon ri-phone-line"></span>
    <div>
      <h5>PHONE</h5>
      <p>+91 9161455184</p>
    </div>
  </div>
  <div class="box">
    <span class="icon ri-mail-line"></span>
    <div>
      <h5>EMAIL ADDRESS</h5>
      <p>digitalpathshalastp@gmail.com</p>
    </div>
  </div>
</div>
<form action="contact-code.php" class="form" method="post">
  <div class="form-input">
    <input type="text" name="conName" id="conName" placeholder="Enter Your Name" Required>
    <input type="email" name="conEmail" id="conEmail" placeholder="Enter Your Email" Required>
    <input type="number" name="conMobile" id="conMobile" placeholder="Enter Your Mobile" Required>
  </div>
  <div>
    <textarea name="message" id="" cols="30" rows="5" placeholder="Enter Your Message"></textarea>
    <button type="submit" class="btn">Send Message</button>
  </div>
</form>
</div>
</section>



<!-- Start Registration Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="signupForm">
        <div class="form-group">
          <i class="ri-user-fill"></i><label for="exampleInputUsername">&ensp;Username</label><small id="statusMsg1"></small>
          <input type="text" class="form-control" id="signupUsername" aria-describedby="usernameHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
          <i class="ri-mail-fill"></i><label for="exampleInputEmail">&ensp;Email Address</label><small id="statusMsg2"></small>
          <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="ri-lock-fill"></i><label for="exampleInputPassword1">&ensp;Password</label><small id="statusMsg3"></small>
          <input type="password" class="form-control" id="signupPass" placeholder="Password">
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="submit" class="btn registration" id="signup">Sign Up</button>
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Registration Modal -->

<!-- Start Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLongTitle">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="loginForm">
        <div class="form-group">
          <i class="ri-mail-fill"></i><label for="loginInputEmail1">&ensp;Email Address</label><small id="statusLogMsg1"></small>
          <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <i class="ri-lock-fill"></i><label for="loginInputPassword1">&ensp;Password</label>
          <input type="password" class="form-control" id="loginPass" placeholder="Password">
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="submit" class="btn btn-primary login" id="loginBtn">Log in</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Login Modal -->

<!-- Start Admin Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLongTitle">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="adminForm">
        <div class="form-group">
          <i class="ri-mail-fill"></i><label for="adminInputEmail1">&ensp;Email Address</label>
          <input type="email" class="form-control" id="adminEmail" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <i class="ri-lock-fill"></i><label for="adminInputPassword1">&ensp;Password</label>
          <input type="password" class="form-control" id="adminPass" placeholder="Password">
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <small id="statusAdminLogMsg"></small>
        <button type="submit" class="btn btn-primary adminLogin" id="adminBtn">Log in</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Admin Modal -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Scroll reveal -->
<script src="https://unpkg.com/scrollreveal"></script>
  
<script>

  
// slider
let swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});


// menu btn

const menuBtn = document.querySelector('.ri-menu-line');
const navList = document.querySelector('.navlist');

menuBtn.onclick = function(){
menuBtn.classList.toggle('ri-close-line');
navList.classList.toggle('active')
}



// Scroll Reveal

const sr = ScrollReveal({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: false,
})
sr.reveal('.home-container', {dealy: 200, origin: 'bottom'});
sr.reveal('.home-btns', {dealy: 200, display: '90px', origin: 'top'});
sr.reveal('.feature-container', {dealy: 200, origin: 'bottom'});
sr.reveal('.about-container .left', {dealy: 200, origin: 'left'});
sr.reveal('.about-container .right', {dealy: 200, origin: 'top'});
sr.reveal('.courses-container', {dealy: 200, origin: 'top'});
sr.reveal('.team-container', {dealy: 200, origin: 'bottom'});
sr.reveal('.blog-container', {dealy: 200, origin: 'left'});
sr.reveal('.contact-container .content', {dealy: 200, origin: 'bottom'});
sr.reveal('.contact-container .form', {dealy: 200, origin: 'top'});
sr.reveal('.footer-container', {dealy: 200, origin: 'bottom'});


// Call Button

(function () {
    var options = {
        call: "9161455184", // Call phone number
        call_color: "#129BF4", // Call button color
        whatsapp: "9161455184", // WhatsApp number
        call_to_action: "Contact Us", // Call to action
        button_color: "#002347", // Color of button
        position: "left", // Position may be 'right' or 'left'
        order: "call,whatsapp", // Order of buttons
    };
    var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>

<?php
  include('./mainInclude/footer.php');
?>