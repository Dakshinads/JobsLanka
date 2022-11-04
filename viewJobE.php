<?php
require "DBCon.php";
session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer" && isset($_COOKIE['jobID'])){

  $jobRefNo = $_COOKIE['jobID'];
  $sql = "select j.*,jc.name as categoryname, jt.name as typename from job as j, job_category as jc, job_type as jt where job_ref_no =$jobRefNo and j.job_category_id=jc.id and j.job_type_id=jt.id";
  $row;
  if($result = mysqli_query($con,$sql)){
      $row=mysqli_fetch_assoc($result);      
  } 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka View Job</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>

<script>

</script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >

<div class="row">
  <div class="col-sm-12 mt-5 text-center">
  <h4 class="mb-3"><?php echo $row['title'] ?></h4>
  <h6 ><?php echo $row['categoryname'] ?></h6><hr/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <p class="lead"><strong> Type :</strong></p>
  </div>
  <div class="col-sm-8">
      <p class="lead"><?php echo $row['typename'] ?></p>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <p class="lead"><strong> Location :</strong></p>
  </div>
  <div class="col-sm-8 ">
      <p class="lead"><?php echo $row['location'] ?></p>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <p class="lead"><strong> Opening Date :</strong></p>
  </div>
  <div class="col-sm-8 ">
      <p class="lead"><?php echo $row['opening_date'] ?></p>
  </div>
</div>
<div class="row">
  <div class="col-sm-2 ">
      <p class="lead"><strong> Closing Date :</strong></p>
  </div>
  <div class="col-sm-8 ">
      <p class="lead"><?php echo $row['closing_date'] ?></p>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <p class="lead"><strong> Job Status :</strong></p>
  </div>
  <div class="col-sm-8 ">
      <p class="lead">
        <?php
          if($row['status']==0){
            echo "Pending for Approval";
          }else if($row['status']==1) {            
            if($row['active']==0){
              echo "Approved( Inactive)";
            }else{
              echo "Approved( Active)";
            }
          }
          else if($row['status']==2) {
              $reason = $row['reason'];
              echo "Declined
              <button type='button' class='btn btn-link' data-bs-container='body' title='Reason for Declined' data-bs-toggle='popover' data-bs-placement='top' data-bs-content='$reason'> Reason</button>";
          
          }
          else if($row['status']==3) {
              echo "Achieved";
          }
        ?>
       </p>
  </div>
</div>
<hr/>
<div class="row">
  <div class="col-sm-12 mb-3">
      <?php echo $row['description'] ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 mb-3">
      <?php if(strlen($row['image'])>0){
        $image =$row['image'];
        echo "<img src='Uploads/JobPostImages/$image' >";
         } ?>
  </div>
</div><hr/>
<div class="row">
  <div class="col-sm-12 mb-3">
    <?php if($row['status']==1 || $row['status']==3) { ?>
    <button type="button" class="btn btn-primary btn-lg my-2" onclick=""  >View Applicants</button><?php } ?>
  </div>
</div>
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

<script>
    $(function () {
        $('[data-bs-toggle="popover"]').popover()
    })
</script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}


?>