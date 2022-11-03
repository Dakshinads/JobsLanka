<?php
require "DBCon.php";

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Contact Us</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container">
    <h4 class="mt-3">Contact Us</h4>
    <hr class="my-4">
    <p class="">Have questions or would like to contact us? we'd love to hear from you. </p></br>
    <p><strong>Mailing Address : </strong> info.jobslanka@gmail.com</p>
    <p><strong>Contact No : </strong> 0719025153</p>
    <hr class="my-4">
    <h5 class="mt-3">Inquiry</h5>

    <form method="POST" action="" class="needs-validation" onsubmit="return isValidEmail()"novalidate>
    <div class="col-md-8 col-lg-12">
    <div class='alert alert-success alert-dismissible collapse' role='alert' id="sendDoneAlert">
      Thank you. Your Inquiry send.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <div class="row ">
    <div class="col-12 mb-3">
      <label  class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" required>
      <div class="invalid-feedback">
        Valid name is required.
      </div>
    </div>
    </div>

    <div class="row ">
    <div class="col-12 mb-3">
      <label  class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="" required>
      <div class="invalid-feedback">
        Valid email is required.
      </div>
    </div>
    </div>

    <div class="row ">
    <div class="col-12 mb-3">
      <label  class="form-label">Contact No</label>
      <input type="tel" class="form-control" id="cno" name="cno" minlength="10" maxlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
      <div class="invalid-feedback">
        Valid contact no is required.
      </div>
    </div>
    </div>

    <div class="row ">
    <div class="col-12 mb-3">
      <label  class="form-label">Message</label>
      <textarea class="form-control" id="message" name="message" rows="4" minlength="5" min placeholder="Enter a Message.." required></textarea>
      <div class="invalid-feedback">
        Valid contact no is required.
      </div>
    </div>
    </div>

    <div class="row ">
    <div class="col-6 mb-5">
        <input class=" btn btn-primary " type="submit" name="submit"  value="Submit">
    </div>
    </div>

    </div>
    </form>            
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

<script>
  function isValidEmail(){
    var re = /\S+@\S+\.\S+/;
    var email=document.getElementById('email').value ;
    if(re.test(email)){
      document.getElementById('email').classList.remove('is-invalid');
      document.getElementById('email').classList.add('is-valid');
      return true;

    }else{
      document.getElementById('email').classList.add('is-invalid');
      document.getElementById('email').classList.remove('is-valid');
      return false;
    }
  }

</script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  try{
    global $con;
    $name= $_POST['name'];
    $email=$_POST['email'];
    $cno =$_POST['cno'];
    $message =$_POST['message'];
    $sql="insert into inquiry(name,email,phone_no,message) values('$name','$email','$cno','$message')";
    if(mysqli_query($con,$sql)){
        echo "<script>$('#sendDoneAlert').show().delay(200).addClass('in').fadeOut(1500)</script>";
    }
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

?>