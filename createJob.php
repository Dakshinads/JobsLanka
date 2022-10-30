<?php
require "DBCon.php";
require "fillCombo.php";
session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer"){
  $email=$_SESSION['userData']['id'];


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
    <script src="assets\js\jquery-3.6.1.min.js"></script>
    <link href='assets\css\bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>    
    
</head>
<body>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container" >
<div class="row">
  <div class="col-md-8 col-lg-12 ">
  <h4 class="mt-3">Create Job</h4>
  <hr class="my-4">
  <div class='alert alert-success alert-dismissible collapse' role='alert' id="postAlert">
    Your Job is send to approval.  
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>

  <form method="POST" action="" onsubmit="return isProvideDescriptionOrImage();" class="needs-validation" id="frmJobSeeker" enctype="multipart/form-data" novalidate>

    <div class="row ">
        <div class="col-sm-12 mb-3">
            <label  class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" minlength="2" value="" required>
            <div class="invalid-feedback">
            Valid Title is required.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label  class="form-label">Job Category</label>
            <select class="form-select" id="jcategory" name="jcategory" required>
            <option value="">Choose...</option>
            <?php getComboValue('job_category'); ?>
            </select>
            <div class="invalid-feedback">
            Please provide a valid Job Category.
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <label  class="form-label">Job Type</label>
            <select class="form-select" id="jtype" name="jtype" required>
            <option value="">Choose...</option>
            <?php getComboValue('job_type'); ?>
            </select>
            <div class="invalid-feedback">
            Please provide a valid Job Type.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label  class="form-label">Location</label>
            <select class="form-select" id="location" name="location" required>
            <option value="">Choose...</option>
            <?php getComboValue('location'); ?>
            </select>
            <div class="invalid-feedback">
            Please provide a valid Location.
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <label  class="form-label">Closing Date</label>
            <div class="input-group " >
                <input type="text" class="form-control" id="closingDate" name="closingDate" required/>
            </div>
            <div class="invalid-feedback">
            Please provide a valid Closing Date.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Job Description..." minlength="" ></textarea>
        <div class="invalid-feedback">
            Please provide a Job Description or Job Post Image.
        </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
        <label class="form-label">Job Post Image</label>
              <input class="form-control" id="jobPostImage" name="jobPostImage" type="file" accept="image/png, image/jpeg" onchange="logoValidation('jobPostImage')">
              <div class="invalid-feedback">
                File type must be .png or .jpeg
              </div>
        </div>        
    </div>

    <div class="row ">
      <div class="col-6 mb-5">
        <div id="response"></div>
        <input class=" btn btn-primary btn-md" type="submit" name="send" value="Send to Approval">
      </div>
    </div>
  </form>
  </div>
  
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src='assets\js\bootstrap-datepicker.min.js' ></script>
<script src='assets\js\tinymce\tinymce.min.js' ></script>

<script>
    var monthAfterDate = new Date();
    monthAfterDate.setDate(monthAfterDate.getDate() +30);

$(document).ready(function(){
    $('#closingDate').datepicker({
        format: "yyyy-mm-dd",
        startDate: new Date(),
        endDate: monthAfterDate
    });
});

tinymce.init({
    selector: '#description',
    plugins: 'wordcount',
});

function isProvideDescriptionOrImage() {
    var filepath =document.getElementById('jobPostImage').value;
    const wordcount = tinymce.activeEditor.plugins.wordcount;
    var description = wordcount.body.getCharacterCount();
    if(filepath.length>0 || description>0){
        if(filepath.length==0 && description<100){
            $("#response").animate({
                height: '+=72px'
            }, 300);
            $('<div class="alert alert-danger">Your Job Description must be more than 100 charaters </div>').hide().appendTo('#response').fadeIn(1000);
        
            $(".alert").delay(3000).fadeOut(
                "normal",
                function(){
                    $(this).remove();
                });
        
            $("#response").delay(4000).animate({
                height: '-=72px'
            }, 300);
                return false;
            return false;
        }else{
            return true;
        }
    }else{
        $("#response").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-danger">Please provide Job Description or Job Post Image </div>').hide().appendTo('#response').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response").delay(4000).animate({
        height: '-=72px'
       }, 300);
        return false;
      }

}
</script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}

if(isset($_POST['send']) ){
    try {
       $title = $_POST['title'];
       $jCategory = $_POST['jcategory'];
       $jType = $_POST['jtype'];
       $location = $_POST['location'];
       $closingDate = $_POST['closingDate'] ;
       $description = '';
       if(strlen($_POST['description'])>0){
        $description = $_POST['description'];
        $description = str_replace('\'',' ',$description);
        $description = str_replace('"',' ',$description);
       }
       $jobPostImage ="";
       if($_FILES['jobPostImage']["size"] !==0) {
       $file = $_FILES['jobPostImage'];
     
       $fileName = $_FILES['jobPostImage']['name'];
       $fileTmpName = $_FILES['jobPostImage']['tmp_name'];
       $fileSize = $_FILES['jobPostImage']['size'];
       $fileError = $_FILES['jobPostImage']['error'];
       $fileType = $_FILES['jobPostImage']['type'];
     
       $fileExt = explode('.',$fileName);
       $fileActualExt = strtolower(end($fileExt));
     
       $allowed =array('jpg','jpeg','png');
     
       if(in_array($fileActualExt,$allowed)){
           if($fileError === 0){
               if($fileSize < 5000000){
                   $fileNameNew = uniqid('', true).".".$fileActualExt;
                   $fileDestination = 'Uploads/JobPostImages/'.$fileNameNew;
                   move_uploaded_file($fileTmpName,$fileDestination);
                   $jobPostImage = $fileNameNew;
               }else{
                   echo "Your file is too big!";
               }
           }else{
               echo " There was an error uploading your file!";
           }
       }
       }
       $employerId=$_SESSION['userData']['id'];
       

       $sql = "insert into job (title,description,image,opening_date,closing_date,active,status,reason,job_category_id ,job_type_id,employer_id,location_id)
               values ('$title','$description','$jobPostImage',curdate(),'$closingDate',0,0,NULL,$jCategory,$jType,$employerId,$location)";
       if(mysqli_query($con,$sql)){
        unset($_POST);
        unset($sql);
            echo "<script>
            $('#postAlert').fadeIn(100);
            window.location.href ='createJob.php'
            </script>";
            
       }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
       }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>