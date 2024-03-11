<?php
    include('./dbConnection.php');
    session_start();
    if(!isset($_SESSION['loginEmail'])){
        echo "<script> location.href = 'loginorsignup.php' </script>";
    } else {
        header("Pragma: no-cache");
	    header("Cache-Control: no-cache");
	    header("Expires: 0");
        $stuEmail = $_SESSION['loginEmail'];
?>
    


<!doctype html>
<html lang="en">
  <head>
    <title>Checkout Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Style CSS -->
     <link rel="stylesheet" href="./style.css">
</head>
  <body>

  <div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotron">
            <h3 class="mb-5">Welcome to Digital Pathshala Payment Page</h3>
            <form action="./PaytmKit/pgRedirect.php" method="POST">
                <div class="form-group row">
                    <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
                    <div class="col-sm-8">
                        <input type="text" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                    <div class="col-sm-8">
                    <input type="text" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){ echo $stuEmail; } ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                    <input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php if(isset($_POST['id'])){echo $_POST['id']; } ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">Industry Type ID</label> -->
                    <div class="col-sm-8">
                    <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="CHANNEL_ID" class="col-sm-4 col-form-label">Channel ID</label> -->
                    <div class="col-sm-8">
                    <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="Check out" class="btn btn-primary" onclick="">
                    <a href="./courses.php" class="btn btn-secondary">Cancle</a>
                </div>
            </form>
            <small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
        </div>
    </div>
  </div>
	 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php
}
?>