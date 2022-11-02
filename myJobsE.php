<?php
require "DBCon.php";
require "fillCombo.php";
require("sajax.php");     
sajax_init();
sajax_export("updateActiveStatus");
sajax_handle_client_request();

session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer"){
  $email=$_SESSION['userData']['id'];


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

<main class="container" >
<div class="row">
    <div class='alert alert-success alert-dismissible collapse' role='alert' id="updateDoneAlert">
        Job Details Updated.. Now Your job is send to approval. 
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <div class="col-md-8 col-lg-12 ">
    <h4 class="mt-3">My Jobs</h4>
    <hr class="my-4">
    <div class="table-responsive my-4" >
        <table class="table table-striped table-sm " data-show-columns="true" data-height="500" id="jobs" data-unique-id="id">
            <thead >
            <tr>
                <th scope="col" class="col-1 " data-field="id">Job Reference No</th>
                <th scope="col" class="col-2 ">Title</th>
                <th scope="col" class="col-2 ">Category</th>
                <th scope="col" class="col-1 ">Opening Date</th>
                <th scope="col" class="col-1 ">Closing Date</th>
                <th scope="col" class="col-1 ">Active</th>
                <th scope="col" class="col-1 ">Status</th>
                <th scope="col" class="col-2 "></th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $employerId = $_SESSION['userData']['id'];
            $sql= "select j.*,jc.name as category from job as j, job_category as jc where employer_id=$employerId and jc.id=j.job_category_id order by job_ref_no desc;";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
            
            <tr>
                <td><?php echo $row['job_ref_no']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['opening_date']; ?></td>
                <td><?php echo $row['closing_date']; ?></td>

                <td>
                    <?php $checkValue="";
                    $checkStatus="";
                     if($row['status']==1){
                        if($row['active']==1){
                            $checkValue="checked";
                            $checkStatus = "Active";
                        }else{
                            $checkValue="";
                            $checkStatus = "Inactive";
                        }
                     }else{
                        $checkValue="disabled";
                        $checkStatus = "Inactive";
                     } ?>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="<?php echo 'chk_'.$row['job_ref_no'] ?>" onchange="updateActiveStatus(<?php echo $row['job_ref_no'] ?>)"  <?php echo $checkValue; ?>>
                <label class="form-check-label" id="<?php echo 'checkStatusText_'.$row['job_ref_no'] ?>" ><?php echo $checkStatus; ?></label>
                </div></td>

                <td><?php 
                /* 
                    Status and their status code
                     0 = Pending for Approval
                     1 = Approved
                     2 = Declined
                     3 = Achieved
                */
                if($row['status']==0){
                    echo "<span class='badge bg-primary'>Pending for Approval</span>";
                }else if($row['status']==1) {
                    echo "<span class='badge  bg-success'>Approved</span>";
                }
                else if($row['status']==2) {
                    $reason = $row['reason'];
                    echo "<span class='badge bg-danger'>Declined</span>
                    <button type='button' class='btn btn-link' data-bs-container='body' title='Reason for Declined' data-bs-toggle='popover' data-bs-placement='top' data-bs-content='$reason'> Reason</button>";
                
                }
                else if($row['status']==3) {
                    echo "<span class='badge bg-warning'>Achieved</span>";
                }
                ?></td>
                <td class="text-center">
                <button type="button" class="btn btn-info btn-sm"  onclick="viewJob(<?php echo $row['job_ref_no']; ?>)" ><i class="bi bi-eye"></i>view</button>
                <?php if($row['status']!=3) { ?><button type="button" class="btn btn-secondary btn-sm" onclick="updateJob(<?php echo $row['job_ref_no']; ?>)"  >
                    <i class="bi bi-arrow-repeat"></i>Update</button><?php } ?>
                </td>
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
            <input class=" btn btn-primary btn-md my-4" name="post" type="submit" onclick="window.location.href='createJob.php'" value="Post a Job">   
        </div> 
    </div>
</main>
<script>
    <?php sajax_show_javascript(); ?>

    function updateActiveStatus(id) {
        chkid="chk_"+id;
        data="";
        if(document.getElementById(chkid).checked){
            data=id+"_"+1;
            textid="checkStatusText_"+id;
            document.getElementById(textid).innerHTML = "Active";
        }else{
            data=id+"_"+0;
            textid="checkStatusText_"+id;
            document.getElementById(textid).innerHTML = "Inactive";
        }
        x_updateActiveStatus(data,updateActiveStatus_x);
    }

    function updateActiveStatus_x(msg){
        
    }
</script>

<!-- Adding footer -->
<?php include "footer.php" ?>
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

    $(function () {
        $('[data-bs-toggle="popover"]').popover()
    })

    function viewJob(jobId){
        createCookie("jobID", jobId, "1");
        window.location.href = "viewJobE.php";
    }
    function updateJob(jobId){
        createCookie("uJobID", jobId, "1");
        window.location.href = "updateJob.php";
    }

    function createCookie(name, value, days) {
        var expires;
        
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
        
        document.cookie = escape(name) + "=" + 
            escape(value) + expires + "; path=/";
    }
</script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}

function updateActiveStatus($data) {
    try{
        global $con;
        $valuesAr=explode("_",$data);
        $jobId=$valuesAr[0];
        $activeCode=$valuesAr[1];

        $sql="update job set active =$activeCode where job_ref_no=$jobId";
        mysqli_query($con,$sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $jobId;
}
?>