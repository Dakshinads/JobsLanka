<?php
require "DBCon.php";
require("sajax.php");     
sajax_init();
sajax_export("getComboInterviewTimeSlot");
sajax_export("reject");
sajax_handle_client_request();

session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer"){
  $UserID=$_SESSION['userData']['id'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Jobs</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='assets\css\bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>  

</head>
<body>
<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\bootstrap-table.min.js"></script>
<script src="assets\js\bootstrap-table-sticky-header.js"></script>
<script src='assets\js\bootstrap-datepicker.min.js' ></script>

<!-- Adding header -->
<?php include "header.php" ?>
<?php 
    $jobRefNo =  $_COOKIE['jobID'];

    $getTitleSql = "select title from job where job_ref_no = $jobRefNo";
    $dt = mysqli_fetch_assoc(mysqli_query($con,$getTitleSql));
?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
    <div class="col-md-8 col-lg-12 ">
    <h4 class="mt-3">Details of Applicants</h4>
    <hr class="my-4">
    <input type="hidden" id="hdnUserID" value="<?php echo $UserID ?>"/>
    <h5 class="text-muted">Job Title: <strong class="text-primary"><?php echo $dt['title'] ?></strong></h5>
    <div class="table-responsive my-4" >
        <table class="table table-striped table-sm " data-show-columns="true" data-height="500" id="jobs" data-unique-id="id">
            <thead >
            <tr>
                <th scope="col" class="col-3 " data-field="id">Name</th>
                <th scope="col" class="col-1 text-center">Gender</th>
                <th scope="col" class="col-2 text-center">Email</th>
                <th scope="col" class="col-1 text-center">Contact No</th>
                <th scope="col" class="col-2 text-center">CV</th>
                <th scope="col" class="col-1 text-center">Status</th>
                <th scope="col" class="col-2 "></th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $sql= "select js.nic,js.name,js.gender,js.email,js.phone_no,aj.status,js.cv, j.title, aj.id as appliedjobid from job_seeker as js, applied_job as aj, job as j 
            where aj.job_seeker_id=js.nic and aj.job_ref_no = j.job_ref_no and j.job_ref_no=$jobRefNo;";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
            
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td class="text-center"><p class="py-2"><?php echo ($row['gender']=="M")?'Male':'Female'; ?><p></td>
                <td class="text-center"><?php echo $row['email']; ?></td>
                <td class="text-center"><?php echo $row['phone_no']; ?></td>
                <td class="text-center"><a href="Uploads/CV/<?php echo $row['cv'] ?>" target="_blank"><button type="button" class="btn btn-secondary btn-sm">View CV</button></a>
                <td class="text-center">
                    <?php 
                        $status=$row['status']; 
                        if($status==0){
                            echo "<span class='badge bg-primary'>Pending</span>";
                        }else if($status==1){
                            echo "<span class='badge bg-success'>Accepted</span>";
                        }else if($status ==2){
                            echo "<span class='badge bg-danger'>Rejected</span>";
                        }
                    ?></td>

                <td class="text-center"><?php 
                if($status==0){ ?>
                    <button type="button" class="btn btn-success btn-sm "  onclick="openAcceptModal('<?php echo $row['nic']; ?>',<?php echo $row['appliedjobid'] ?>)" >Accept</button>
                    <button type="button" class="btn btn-danger btn-sm"  onclick="reject(<?php echo $row['appliedjobid'] ?>)" >Reject</button>
                <?php } else if($status==1){ ?>
                    <button type="button" class="btn btn-warning btn-sm "  onclick="openUpdateModal('<?php echo $row['nic']; ?>',<?php echo $row['appliedjobid'] ?>)" >Update Interview Details</button>
                <?php } ?>
                </td>
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </div>
  </div>
</div>
</main>
 

<!-- Adding footer -->
<?php include "footer.php" ?>

<!-- Update Model -->
<div class="modal fade" id="acceptJobModal"  role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Accept Job</h5>
        </div>
        <form method="post" action="" class="needs-validation" novalidate>
        <div class="modal-body row">
            <input type="hidden" id="hdnAppliedID" name="hdnAppliedID">
            <div class="col-sm-12 mb-6">
                <label  class="form-label">Interview Date</label>
                <div class="input-group " >
                    <input type="text" class="form-control" id="interviewDate" onchange="getComboInterviewTimeSlot()" name="interviewDate" required/>
                </div>
                <div class="invalid-feedback">
                    Please provide a valid Interview Date.
                </div>
            </div>
             <div class="col-sm-12 mb-6">
                <label  class="form-label">Interview Time</label>
                <select class="form-select" id="interviewTime" name="interviewTime"required>
                </select>
                <div class="invalid-feedback">
                Please provide a valid Location.
                </div>
            </div> 
        </div>
        <div class="modal-footer mt-2">
          <input type="submit" class="btn btn-success" name="accept" value="Accept"/>
          <button type="button" class="btn btn-default" onclick="$('#acceptJobModal').modal('hide');">Close</button>
        </div>
        </form> 
      </div>
    </div>
  </div> 

<script src="assets\js\form-validations.js"></script>
<script>
var $table = $('#jobs');

function buildTable($el) {
    var classes = $('.toolbar input:checked').next().text()

    $el.bootstrapTable('destroy').bootstrapTable({
        showFullscreen: true,
        search: true,
        stickyHeader: true,        
    })
};

$(function() {
    buildTable($table)
});

var monthAfterDate = new Date();
    monthAfterDate.setDate(monthAfterDate.getDate() +30);

$(document).ready(function(){
    $('#interviewDate').datepicker({
        format: "yyyy-mm-dd",
        startDate: new Date(),
        endDate: monthAfterDate
    }).datepicker("setDate", "0");    
});

<?php sajax_show_javascript(); ?>

function reject(appliedJobID){
    x_reject(appliedJobID,reject_x)
}

function reject_x(msg){
    window.location.href = "viewApplicants.php";
}

function openAcceptModal(jobSeekerID,appliedJobID){
    document.getElementById('hdnAppliedID').value=appliedJobID;
    $('#acceptJobModal').modal('show');
}

function getComboInterviewTimeSlot(){
    userID=document.getElementById('hdnUserID').value;
    datep =document.getElementById('interviewDate').value;
    x_getComboInterviewTimeSlot(datep+"_"+userID,getComboInterviewTimeSlot_x);
}

function getComboInterviewTimeSlot_x(msg){

    $('#interviewTime option').remove();
    $('#interviewTime').append(msg);
}
window.onload = getComboInterviewTimeSlot();
</script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}

function getComboInterviewTimeSlot($data){
    global $con;
    try{
        $dataAr = explode("_",$data);
        $sql="select i.id,i.time from interview_timeslot as i left join time_allocate as ta on i.id=ta.interview_timeslot_id 
        where i.employer_id=$dataAr[1]  and i.isactive=1 and i.id NOT IN ( select ta.interview_timeslot_id from time_allocate as ta 
        where ta.employer_id= $dataAr[1] and ta.date = '$dataAr[0]');";
        $result=mysqli_query($con,$sql);
        $values="";
        while($row =mysqli_fetch_assoc($result)){
            $values.= "<option value='".$row['id']."'>".$row['time']."</option>";
        }
        return $values;
    }catch(Exception $e){
        $e->getMessage();
    }
}

if(isset($_POST['accept'])){
    try{
        $interviewDate=$_POST['interviewDate'];
        $interviewTime=$_POST['interviewTime'];
        $appliedJobId= $_POST['hdnAppliedID'];
        $sql= "insert into time_allocate(applied_job_id,employer_id,interview_timeslot_id,date) values ($appliedJobId,$UserID,$interviewTime,'$interviewDate')";
        mysqli_query($con,$sql);

        $sql="update applied_job set status=1 where id=$appliedJobId";
        mysqli_query($con,$sql);
        echo "<script>window.location.href='viewApplicants.php'</script>";

    }
    catch(Exception $e){
        $e->getMessage();
    }
}

function reject($id){
try{
    global $con;

    $sql="update applied_job set status=2 where id=$id";
    mysqli_query($con,$sql);
    return true;

}
catch(Exception $e){
    $e->getMessage();
}
}
?>