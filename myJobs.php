<?php
require "DBCon.php";
require "fillCombo.php";
require("sajax.php");     
sajax_init();
sajax_export("changeTableData");
sajax_handle_client_request();

session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="JobSeeker"){
  $userID=$_SESSION['userData']['nic'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka My Jobs</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\bootstrap-table.min.js"></script>
<script src="assets\js\bootstrap-table-sticky-header.js"></script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
    <div class="col-md-8 col-lg-12 ">
    <h4 class="mt-3">My Jobs</h4>
    <hr class="my-4">
    <input type="hidden" id="hdnJobSeekerID" value="<?php echo $userID ?>"/>
    <div class="table-responsive my-4" >
        <table class="table table-striped table-sm " data-height="500" id="myJobs" data-unique-id="id">
            <thead >
            <tr>
              <th scope="col" class="col-6 text-center " data-field="id"><h6>Job Title</h6></th>
              <th scope="col" class="col-2 text-center "><h6>Closing Date</h6></th>
              <th scope="col" class="col-2 text-center "><h6>Status</h6></th>
              <th scope="col" class="col-2 "></th>
            </tr>
            </thead>
            <tbody id="myJobTableBody"></tbody>
        </table>
        </div>
  </div>
</div>
</main>
<script>
    <?php sajax_show_javascript(); ?>


</script>

<!-- Adding footer -->
<?php include "footer.php" ?>
<script>
    var $table = $('#myJobs');

    function buildTable($el) {
    var classes = $('.toolbar input:checked').next().text()

    $el.bootstrapTable('destroy').bootstrapTable({
        showFullscreen: false,
        search: false,
        stickyHeader: true,        
    })
    };

    $(function() {
        buildTable($table)
    });

    <?php sajax_show_javascript(); ?>

    function changeTableData(){
        id = document.getElementById('hdnJobSeekerID').value;
        x_changeTableData(id,changeTableData_x);
    }

    function changeTableData_x(msg){
        document.getElementById("myJobTableBody").innerHTML = "";
        document.getElementById('myJobTableBody').innerHTML = msg;
        document.getElementById("myJobs").classList.remove('table-bordered');
    }
    window.onload = changeTableData();

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
function changeTableData($data){
    try{
      $sql="select j.job_ref_no, j.title, e.name as companyname, jt.name as typename, j.opening_date, j.closing_date ,ap.status,
       it.time, ta.date from job as j, job_category as jc, job_type as jt, employer as e, job_seeker as js, applied_job as ap left join 
       time_allocate as ta on ap.id=ta.applied_job_id left join interview_timeslot as it on it.id=ta.interview_timeslot_id where
        j.job_category_id = jc.id and j.job_type_id = jt.id and j.employer_id = e.id and ap.job_ref_no = j.job_ref_no and 
        ap.job_seeker_id=js.nic and  ap.job_seeker_id = '$data';";
      global $con;
      $values="";
      if($result=mysqli_query($con,$sql)){
        while($row=mysqli_fetch_assoc($result)){
         
        $values .= "<tr ><td><h6 class='mt-2 '>".$row['title']."</h6> <small class='text-muted'>".$row['companyname']."  </small>  <span class='badge bg-success mb-2'>".$row['typename']."</span></td>";
        $values .= "<td class='text-center '>".$row['closing_date']."</td>";
        // status 0 = Pending
        // status 1 = Accept
        // status 2 = Reject
        $status=$row['status'];
        if($status==0){
            $values .= "<td class='text-center '><span class='badge bg-primary'>Pending</span></td>";
        }else if($status == 1){
            $values .= "<td class='text-center '><span class='badge bg-success'>Accepted</span>
            <button type='button' class='btn btn-link' data-bs-container='body' title='Interview Date and timeslot' data-bs-toggle='popover' data-bs-placement='top' data-bs-content='Date:".$row['date']."<br/> Time: ".$row['time']."'>Interview Details</button>
            </td>";
        }else if($status == 2){
            $values .= "<td class='text-center '><span class='badge bg-danger'>Rejected</span></td>";
        }
        
        $values .= "<td class='text-center '><button class=' btn btn-info btn-sm text-dark' onclick='window.location.href=\"viewJob.php?id=".$row['job_ref_no']."\" ' >View Details</button></td></tr>";
          
        }
      }
      return $values;
    }catch(Exception $e){
      echo $e->getMessage();
    } 
}

?>