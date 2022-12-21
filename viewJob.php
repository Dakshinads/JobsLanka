<?php
session_start();
require "DBCon.php";
require("sajax.php");     
sajax_init();
sajax_export("applyJob");
sajax_export("saveJob");
sajax_handle_client_request();
if(isset($_GET['id'])){
    try{
        $jobRefNo = $_GET['id'];
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname 
        from job as j, job_category as jc, job_type as jt, employer as e 
        where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id and j.job_ref_no = $jobRefNo";
        $result = mysqli_query($con,$sql);
        $dataRow= mysqli_fetch_assoc($result);        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Job</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
        <div class="col-sm-12 mt-5 text-center">
        <input type="hidden" id="hdnJobRefNo" name="hdnJobRefNo" value="<?php echo $jobRefNo ?>" />
        <input type="hidden" id="hdnJobSeekerID" name="hdnJobSeekerID" value="<?php echo  (isset($_SESSION['userData']['nic']))?$_SESSION['userData']['nic'] :''; ?>" />
        <input type="hidden" id="hdnAccountType" name="hdnAccountType" value="<?php echo  (isset($_SESSION['atype']))?$_SESSION['atype'] :''; ?>" />
        <h2 class="mb-3" id ="title"><?php echo $dataRow['title'] ?></h2>
        <h4 id="companyName" class="text-muted"><?php echo $dataRow['employername'] ?></h4><hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
        <div class="row">
        <div class="col-sm-5">
            <p class="h6">Type :</p>
        </div>
        <div class="col-sm-7">
            <p class="" id="jobType"> <span class='badge bg-success'><?php echo $dataRow['typename'] ?></span></p>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-5">
            <p class="h6"> Location :</p>
        </div>
        <div class="col-sm-7 ">
            <p class="" id="location"><?php echo $dataRow['location'] ?></p>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-5">
            <p class="h6">Opening Date :</p>
        </div>
        <div class="col-sm-7 ">
            <p class="" id="openingDate"><?php echo $dataRow['opening_date'] ?></p>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-5 ">
            <p class="h6">Closing Date :</p>
        </div>
        <div class="col-sm-7 ">
            <p class="" id="closingDate"><?php echo $dataRow['closing_date'] ?></p>
        </div>
        </div>
        </div>
        <div class="col-sm-4">
        <?php if($dataRow["employerlogo"]!=null){ ?>
        <img src='Uploads/Logo/<?php echo $dataRow["employerlogo"] ?>' id="employerLogo" width="200px" height="200px"><?php } ?>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-12 mb-3" id="description"> 
        <?php echo $dataRow['description'] ?>             
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3 text-center">
        <?php if($dataRow["image"]!=null){ ?>
        <img src='Uploads/JobPostImages/<?php echo $dataRow["image"] ?>' id="jobPostImage" width="70%"><?php } ?>
        </div>
    </div><hr/>
    <div class="row">
    <div class="col-sm-12 mb-4 text-center">
        <?php if($dataRow['status']==1){ ?>
        <div id="alertApplyDone"></div>
        <button type="button" class="btn btn-primary btn-lg my-2 mx-4" onclick="checkIsUserLogged(1)"  ><strong>Apply Job</strong></button>
        <button type="button" class="btn btn-warning btn-lg my-2" onclick="checkIsUserLogged(2)"   ><i class="bi bi-star"></i>  Save for Later</button><?php } ?>
    </div>
</div>
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<!-- Verify Apply Job Model -->
<div class="modal fade" id="applyJobModal" role="dialog">
<div class="modal-dialog modal-md">
    <div class="modal-content">
    <div class="modal-header">          
        <h5 class="modal-title">Do you want to apply this job?</h5>
    </div>
    <div class="modal-body">
        <div class="col-12 mb-3">
            <h6><?php echo $dataRow['title'] ?></h6>
            <small class="text-muted"><?php echo $dataRow['employername'] ?></small>   
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-info" name="apply"  value="Yes" onclick="applyJob()">
        <button type="button" class="btn btn-default" onclick="$('#applyJobModal').modal('hide');">No</button>
    </div>
    </div>
</div>
</div>

<script>
function checkIsUserLogged(id){
    userType=  document.getElementById('hdnAccountType').value;
    if(userType=="JobSeeker"){
        if(id==1){
            $('#applyJobModal').modal('show');
        }else if(id==2){
            saveJob();
        }
       
    }else if(userType == "Employer"){
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       if(id==1){
        $('<div class="alert alert-warning">You cannot apply for a job from your employer\'s account</div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
       }
      else if(id==2){
        $('<div class="alert alert-warning">You cannot save a job for later from your employer\'s account</div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
      }
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }else{
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       if(id==1){
        $('<div class="alert alert-warning">You must be logged in to apply for a job</div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
       }else if(id==2){
        $('<div class="alert alert-warning">You must be logged in to save a job</div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
       }
       
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }
}

<?php sajax_show_javascript(); ?>

function applyJob(){
    jobRefNo = document.getElementById('hdnJobRefNo').value;
    jobSeekerID =  document.getElementById('hdnJobSeekerID').value;  
    $('#applyJobModal').modal('hide');  
    x_applyJob(jobRefNo+"_"+jobSeekerID,applyJob_x);
}

function applyJob_x(msg){
    if(msg){
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-success">You have successfully sent your details along with your CV </div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }else{
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-warning">You have already applied this job</div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }
    
}

function saveJob(){
    jobRefNo = document.getElementById('hdnJobRefNo').value;
    jobSeekerID =  document.getElementById('hdnJobSeekerID').value;  
    x_saveJob(jobRefNo+"_"+jobSeekerID,saveJob_x);
}

function saveJob_x(msg){
    if(msg){
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-success">You have successfully saved this job </div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }else{
        $("#alertApplyDone").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-warning">You have already saved this job </div>').hide().appendTo('#alertApplyDone').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#alertApplyDone").delay(4000).animate({
        height: '-=72px'
       }, 300);
    }
    
}
</script>

</body>
</html>
<?php 
function applyJob($data){
    try{
        // status 0 = Pending
        // status 1 = Accept
        // status 2 = Reject
        global $con;
        $dataAr = explode("_",$data);
        $sqlCheckAlreadyApplied="Select * from applied_job where job_seeker_id='$dataAr[1]' and job_ref_no=$dataAr[0]";
        $rs=mysqli_query($con,$sqlCheckAlreadyApplied);
        if(mysqli_num_rows($rs)>0){
            return false;
        }else{
            $sql= "insert into applied_job(job_seeker_id,job_ref_no,status) values('$dataAr[1]',$dataAr[0],0)";
            mysqli_query($con,$sql);
            return true;
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function saveJob($data){
    try{
        global $con;
        $dataAr = explode("_",$data);
        $sqlCheckAlreadySaved="Select * from job_save where job_seeker_id='$dataAr[1]' and job_ref_no=$dataAr[0]";
        $rs=mysqli_query($con,$sqlCheckAlreadySaved);
        if(mysqli_num_rows($rs)>0){
            return false;
        }else{
            $sql = "insert into job_save(job_seeker_id,job_ref_no) values('$dataAr[1]',$dataAr[0])";
            mysqli_query($con,$sql);
            return true;
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
?>