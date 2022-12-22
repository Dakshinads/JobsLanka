<?php include "DBCon.php";
require "Mail.php";

if(isset($_COOKIE["emailOfUser"])){

  

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Forgot Password Entry</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body >
<!-- Adding header -->
<?php include "header.php";?>

<section class="h-100 gradient-form" style="background-color:  #dfe3e5;" >
  <div class="container py-3 ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-8">
        <div class="card rounded-4 text-black">
          <div class="row g-0">
            <div class="col-lg-12">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                   <a href="index.php">
                  <img src="Images\logo_noBack.png"
                    style="width: 280px;" class="pb-5 py-3" alt="logo"></a>
                  <h4 class="mt-1 mb-3 pb-1 ">Forgot Your Password </h4>
                  <p>Enter your new password</p></br>
                </div>

                <form action="" method="POST" class="needs-validation" novalidate >

                <div class='alert alert-success alert-dismissible collapse' role='alert' id="fogotPasswordDoneAlert">
                Your Password reset successfully.  <a href='login.php' class='alert-link'>Log in...</a>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                <div class="row ">
                <div class="col-sm-12 mb-6">
                  <label  class="form-label">New Password</label>
                  <input type="password" class="form-control mb-4" id="jpw" name="jpw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('jpw','jpwc')" required>
                  <div class="invalid-feedback" id="jpwAlert">
                  Password should be more than 8 characters.
                  </div>
                </div>
                <div class="col-sm-12 mb-6">
                  <label  class="form-label">Confirm New Password</label>
                  <input type="password" class="form-control mb-4" id="jpwc" placeholder="Confirm Password" minlength="8" oninput="checkPasswordConfirmation('jpw','jpwc')" value="" required>
                  <div class="invalid-feedback" id="jpwcAlert">
                    Password Mismatch
                  </div>
                </div>
                </div>

                  <div class="d-flex align-items-center justify-content-center pb-1">
                  <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" onclick="" type="submit" name="reset">Reset Password</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\form-validations.js"></script>
<script src="assets\js\fileValidation.js"></script>
</body>
</html>
<?php 
if(isset($_POST['reset'])){

  $pw=md5($_POST['jpw']);
  $mail=$_COOKIE["emailOfUser"];
  if($_COOKIE["accountTypeOfUser"]=='JobSeeker'){
    $sql="update job_seeker set password='$pw' where email='$mail'";      
  }
  else{
    $sql="update employer set password='$pw' where email='$mail'";    
  }
  mysqli_query($con,$sql);
  echo "<script>
    $('#fogotPasswordDoneAlert').fadeIn(100);
    </script>";

    $mail = new Mail();
    $mailad=$_COOKIE["emailOfUser"];
    $v=$mail->sendMail($mailad, "JobsLanka Reset Password",
    "Hello
    The password for your JobsLanka Account $mailad was changed."
    );
}
}
else{
  header("location:login.php");
}
?>