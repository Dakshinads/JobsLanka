<?php
require "DBCon.php";
session_start();
if(isset($_SESSION['userData'])){
    $feedback=null;
    $sql="";
    if($_SESSION['atype']=="Employer"){
        $id=$_SESSION['userData']['id'];
        $sql = "SELECT description FROM feedback WHERE employer_id = $id";
    }else if($_SESSION['atype']=="JobSeeker"){
        $id=$_SESSION['userData']['nic'];
        $sql = "SELECT description FROM feedback WHERE job_seeker_id = '$id'";
    }
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
        $feedback = $row['description'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Feedback</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
  <div class="col-md-8 col-lg-12 ">
  <h4 class="mt-3">Your Feedback</h4>
  <hr class="my-4">
  <div class='alert alert-success alert-dismissible collapse' role='alert' id="sendFeedbackAlert">
    Thank you for your feedback...  
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  <div class='alert alert-success alert-dismissible collapse' role='alert' id="updateFeedbackAlert">
    Your feedback updated...  
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>

  <form method="POST" action="" class="needs-validation" novalidate>
    <p><strong>We would like your feedback to improve our website.</strong></p>
    <div class="row ">
    <div class="col-12 mb-3">
      <label  class="form-label">What is your feedback of JobsLanka?</label>
      <textarea class="form-control" id="feedback" name="feedback" rows="7" minlength="5"  required><?php  echo ($feedback!=null)? $feedback :Null; ?></textarea>
      <div class="invalid-feedback">
        Valid feedback is required.
      </div>
    </div>
    </div>

    <div class="row ">
      <div class="col-6 mb-2">
        <?php if($feedback !=null){
            echo '<input class=" btn btn-secondary btn-md" type="submit" name="update" value="Update Feedback">';
        }else{
           echo '<input class=" btn btn-primary btn-md" type="submit" name="send" value="Send Feedback">';
        }
        ?>
          
      </div>
    </div>
  </form>
  </div>
  
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

</body>
</html>
<?php
}
else{
  header('location:login.php');
}
if(isset($_POST['send'])){
    try {
        global $con;
        $sql="";
        $description=$_POST['feedback'];
        if($_SESSION['atype']=="Employer"){
            $id=$_SESSION['userData']['id'];
            $sql = "insert into feedback (description,employer_id) values('$description',$id)";
        }else if($_SESSION['atype']=="JobSeeker"){
            $id=$_SESSION['userData']['nic'];
            $sql = "insert into feedback (description,job_seeker_id) values('$description','$id')";
        }
        if(mysqli_query($con,$sql)){
            echo "<script>$('#sendFeedbackAlert').show().delay(200).addClass('in').fadeOut(1500);
              window.location.href='feedback.php'</script>";
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if(isset($_POST['update'])){
    try {
        global $con;
        $sql="";
        $description=$_POST['feedback'];
        if($_SESSION['atype']=="Employer"){
            $id=$_SESSION['userData']['id'];
            $sql = "update feedback set description='$description' where employer_id=$id ";
        }else if($_SESSION['atype']=="JobSeeker"){
            $id=$_SESSION['userData']['nic'];
            $sql = "update feedback set description='$description' where job_seeker_id='$id' ";
        }
        if(mysqli_query($con,$sql)){
            echo "<script>$('#updateFeedbackAlert').show().delay(200).addClass('in').fadeOut(1500);
              window.location.href='feedback.php'</script>";
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>