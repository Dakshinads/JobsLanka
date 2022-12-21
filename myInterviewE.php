<?php
require "DBCon.php";

session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer"){
  $email=$_SESSION['userData']['id'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka My Interviews</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\bootstrap-table.min.js"></script>
<script src="assets\js\bootstrap-table-sticky-header.js"></script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
    <div class="col-md-8 col-lg-12 ">
    <h4 class="mt-3">My Interviews</h4>
    <hr class="my-4">
    <div class="table-responsive my-4" >
        <table class="table table-striped table-sm " data-show-columns="true" data-height="500" id="interview" data-unique-id="id">
            <thead >
            <tr>
                <th scope="col" class="col-3 " data-field="id">Date</th>
                <th scope="col" class="col-3 ">Time</th>
                <th scope="col" class="col-3 ">Job Title</th>
                <th scope="col" class="col-3 ">Job Seeker's Name</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $employerId = $_SESSION['userData']['id'];
            $sql= "SELECT ta.date, it.time,j.title,js.name from time_allocate as ta, applied_job as aj, interview_timeslot as it, 
            job_seeker as js, job as j where ta.applied_job_id=aj.id and ta.interview_timeslot_id=it.id and aj.job_seeker_id=js.nic and 
            aj.job_ref_no=j.job_ref_no and ta.employer_id = $employerId order by ta.date,it.time;";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
            
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['name']; ?></td></td>
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </div>
  </div>
</div>
    <div class="row">
        <div class="col-sm-3">
            <input class=" btn btn-primary btn-md my-4" name="post" type="submit" onclick="window.location.href='addInterviewTimeslot.php'" value="Add Interview Time Slots">   
        </div> 
    </div>
</main>


<!-- Adding footer -->
<?php include "footer.php" ?>
<script>
    var $table = $('#interview');

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

    
</script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}

?>