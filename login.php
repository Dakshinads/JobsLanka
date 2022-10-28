<?php include "DBCon.php";
session_start();
if(isset($_SESSION['userData'])){
    if($_SESSION['atype']=="Employer"){
      header("location: myProfileE.php");
    }else if($_SESSION['atype']=="JobSeeker"){
      echo "need to develop(user profile)";
    }
}else{

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Login</title>
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
      <div class="col-lg-10">
        <div class="card rounded-4 text-black">
          <div class="row g-0">
            <div class="col-lg-7">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                   <a href="index.php">
                  <img src="Images\logo_noBack.png"
                    style="width: 280px;" class="pb-5 py-3" alt="logo"></a>
                  <h4 class="mt-1 mb-3 pb-1 ">Welcome to Jobs Lanka</h4>
                </div>

                <form action="" method="POST" class="needs-validation" novalidate >
                  <p>Please login to your account</p>
                  <div class="col-sm-12 mb-3">
                  <div class='alert alert-danger alert-dismissible collapse' role='alert' id="loginErrorAlert">
                    Email or Password incorrect
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                  </div>
                  <div class="col-sm-12 mb-3">
                  <div class="form-check">
                    <input id="atype1" name="atype" type="radio" value="JobSeeker" class="form-check-input"  checked required>
                    <label class="form-check-label font-weight-bold" >Job Seeker</label>
                  </div>
                  <div class="form-check">
                    <input id="atype2" name="atype" type="radio" value="Employer" class="form-check-input"  required>
                    <label class="form-check-label font-weight-bold" >Employer</label>
                  </div>
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" >Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required/> 
                    <div class="invalid-feedback">
                       Email is required.
                    </div>                   
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="pw">Password</label>
                    <input type="password" id="pw" name="pw" class="form-control" placeholder="Password"  required/>
                    <div class="invalid-feedback">
                       Password is required.
                    </div> 
                  </div>

                  <div class="text-center pt-2 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="login">Login</button>
                    <a class="text-muted" href="#"> Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-1">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="signup.php"><button type="button" class="btn btn-outline-primary">Create new</button></a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 text-center">The Home of Your Dream Job</h4>
                <p class="small mb-0">Welcome to join our job portal. We always strive to provide reliable and prompt services to you. 
                  We wish you the best of luck in finding a suitable job for those of you who are looking for a job with the aim of achieving 
                  your future goals. And it is our wish that you who join us as an employer will get an efficient 
                  and good employee for your company.</p>
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
</body>
</html>
<?php
}

if(isset($_POST['login'])){
  try{

    $email = $_POST['email'];
    $pw = md5($_POST['pw']);
    $type = $_POST['atype'];

    $sql="";
    if($type=="JobSeeker"){
      $sql="select nic,name,email,phone_no from job_seeker where email='$email' and password='$pw'";
    }else if($type == "Employer"){
      $sql="select id,name,email,phone_no,logo from employer where email='$email' and password='$pw'";
    }
    if($result = mysqli_query($con,$sql)){
      if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['userData'] = $row;
        $_SESSION['atype'] = $type;
        echo "<script>window.location.href='index.php' </script>";

      }else{
        echo "<script>
        $('#loginErrorAlert').fadeIn(10);
        </script>";
      }
    } 
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

?>