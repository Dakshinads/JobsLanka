<?php
require "DBCon.php";
session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer" && isset($_SESSION['jobID'])){
  $jobID=$_SESSION['jobID'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Create Job</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>

<script>

</script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container" >
<div class="row">
  <div class="col-md-8 col-lg-12 ">
  <h4 class="mt-3">Create Job</h4>
  <hr class="my-4">
  <div class='alert alert-success alert-dismissible collapse' role='alert' id="postAlert">
    Your Job is Added or approval.  
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>

  </div>
</div>
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}


?>