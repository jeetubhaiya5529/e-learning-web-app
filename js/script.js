// ==============================================================Start Student Registration Section ============================================================== //


// Ajax call from already exists email verification
$(document).ready(function () {
  $("#signupEmail").on("keypress blur", function() {
    let reg = /^[A-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
    let signupEmail = $("#signupEmail").val();
    $.ajax({
      url: 'Student/addStudent.php',
      method: 'POST',
      data:{
        checkmail: "checkmail",
        signupEmail:  signupEmail,
      },
      success: function(data) {
        console.log(data);
      if(data != 0) {
        $("#statusMsg2").html('<small class="text-danger">&ensp;Email is already exist</small>');
        $("#signup").attr("disabled", true);
      } else if(data == 0 && reg.test(signupEmail)) {
        $("#statusMsg2").html('<small class="text-success">&ensp;There You Go!</small>');
        $("#signup").attr("disabled", false);
      } else if (!reg.test(signupEmail)) {
        $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Valid Email e.g. example@gmail.com</small>');
        $("#signup").attr("disabled", false);
      }
      if(signupUsername == ""){
        $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Username</small>');
      }
      if(signupEmail == ""){
        $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Email</small>');
      }
      if(signupPass == ""){
        $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Password</small>');
      }
      },
    });
  });
});



// Student Registration
document.querySelector('.registration').addEventListener('click', function() {
  let reg = /^[A-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
  let signupUsername = $("#signupUsername").val();
  let signupEmail = $("#signupEmail").val();
  let signupPass = $("#signupPass").val();
  
  // Validation
  if(signupUsername.trim() == ""){
    $("#statusMsg1").html('<small class="text-danger">&ensp;Please Enter Name</small>');
    $("#signupUsername").focus();
    return false;
  } else if (signupEmail.trim() == ""){
    $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Email</small>');
    $("#signupEmail").focus();
    return false;
  } else if (signupEmail.trim() != "" && !reg.test(signupEmail)){
    $("#statusMsg2").html('<small class="text-danger">&ensp;Please Enter Valid Email e.g. example@gmail.com</small>');
    $("#signupEmail").focus();
    return false;
  } else if (signupPass.trim() == ""){
    $("#statusMsg3").html('<small class="text-danger">&ensp;Please Enter Password</small>');
    $("#signupPass").focus();
    return false;
  } else {
    $.ajax({
      url: 'Student/addStudent.php',
      method: 'POST',
      dataType: "json",
      data:{
        signupStu: "signupStu",
        signupUsername: signupUsername,
        signupEmail: signupEmail,
        signupPass: signupPass,
      },
      success:function(data){
        console.log(data);
        if(data == "OK"){
          $('#successMsg').html("<small class='alert alert-success p-6'>Registration Successful</small>");
          clearsignupFields();
        } else if(data == "Failed") {
          $('#successMsg').html("<span class='alert alert-danger'>Unable to register<span/>");
        }
      }
    })
  }

});

// Empty all fields after registration
function clearsignupFields(){
  $("#signupForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
}


// ==============================================================End Student Registration Section ============================================================== //





// ==============================================================Start Student Login Section ============================================================== //


let login = document.querySelector(".login");

login.addEventListener("click", function() {
  // console.log("Button clicked.");
  let loginEmail = $("#loginEmail").val();
  let loginPass = $("#loginPass").val();
  $.ajax({
    url: 'Student/addStudent.php',
    method: 'POST',
    data: {
      checkLogEmail: "checkLogEmail",
      loginEmail: loginEmail,
      loginPass: loginPass,
    },
    success: function (data) {
      // console.log(data);
      if(data == 0) {
        $("#statusLogMsg").html('<small class="alert alert-danger">&ensp;Invalid Email and Password</small>');
      } else if(data == 1) {
        $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
        setTimeout(()=> {
          window.location.href = "index.php";
        }, 1000);
      }
    },
  });
})

// ==============================================================End Student Login Section ============================================================== //




// ==============================================================Start Admin Login Section ============================================================== //


let adminLogin = document.querySelector(".adminLogin");

adminLogin.addEventListener("click", function() {
  // console.log("Button clicked.");
  let adminEmail = $("#adminEmail").val();
  let adminPass = $("#adminPass").val();
  $.ajax({
    url: 'Admin/admin.php',
    method: 'POST',
    data: {
      checkAdminLogEmail: "checkAdminLogEmail",
      adminEmail: adminEmail,
      adminPass: adminPass,
    },
    success: function (data) {
      // console.log(data);
      if(data == 0) {
        $("#statusAdminLogMsg").html('<small class="alert alert-danger">&ensp;Invalid Email and Password</small>');
      } else if(data == 1) {
        $("#statusAdminLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
        setTimeout(()=> {
          window.location.href = "Admin/adminDashboard.php";
        }, 1000);
      }
    },
  });
})

// ==============================================================End Student Login Section ============================================================== //


