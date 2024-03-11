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

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered Login ?</h5>
            <form action="" role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="ri-mail-fill"></i><label for="loginInputEmail1">&ensp;Email Address</label><small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <i class="ri-lock-fill"></i><label for="loginInputPassword1">&ensp;Password</label>
                    <input type="password" class="form-control" id="loginPass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary login" id="loginBtn">Log in</button>
            </form>
            <small id="statusLogMsg"></small>
        </div>
        
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User ? Registration</h5>
            <form action="" role="form" id="stuRegForm">
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
                <button type="submit" class="btn registration" id="signup">Sign Up</button>
            </form>
            <span id="successMsg"></span>
        </div>
    </div>
</div>


<?php
  include('./mainInclude/footer.php');
?>