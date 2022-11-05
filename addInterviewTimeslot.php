<?php
require "DBCon.php";
require "fillCombo.php";
require("sajax.php");     
sajax_init();
sajax_export("updateActiveStatus");
sajax_handle_client_request();

session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="Employer"){
  $id=$_SESSION['userData']['id'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Interview Timeslots</title>
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
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\bootstrap-table.min.js"></script>
<script src="assets\js\bootstrap-table-sticky-header.js"></script>


<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
    <div class='alert alert-success alert-dismissible collapse' role='alert' id="addDoneAlert">
        New Timeslot Added..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <h4 class="mt-3">My Timeslots</h4>
    <hr class="my-4">
    <div class="table-responsive my-2 col-md-6 col-lg-6" >
        <table class="table table-striped table-sm " data-show-columns="true" data-height="500" id="timeslots" data-unique-id="id">
            <thead >
            <tr>
                <th scope="col" class="col-8 " data-field="id">Timeslot</th>
                <th scope="col" class="col-4 ">Active</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $employerId = $_SESSION['userData']['id'];
            
            $sql= "select * from interview_timeslot where employer_id=$employerId ";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
            
            <tr>
                <td><?php echo $row['time']; ?></td>

                <td>
                    <?php $checkValue="";
                    $checkStatus="";
                     if($row['isactive']==1){
                            $checkValue="checked";
                            $checkStatus = "Active";
                      
                     }else{
                        $checkValue="";
                        $checkStatus = "Inactive";
                     } ?>
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="<?php echo 'chk_'.$row['id'] ?>" onchange="updateActiveStatus(<?php echo $row['id'] ?>)"  <?php echo $checkValue; ?>>
                <label class="form-check-label" id="<?php echo 'checkStatusText_'.$row['id'] ?>" ><?php echo $checkStatus; ?></label>
                </div></td>
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </div>
        <div class="col-sm-6 px-3 py-3">
            <form action="" method="POST" class="needs-validation" onsubmit="return checkTime()" novalidate>
                <div class="row">
                <h5>Add Timeslot</h5><hr/>
                    <div class="col-sm-12">
                        <label class="form-label" >Start time</label>
                    </div>
                    <div class="col-sm-12 mb-3">
                    <div class="bootstrap-timepicker ">
                        <input id="starttime" name="starttime" type="time" class="form-control " required>
                        <div class="invalid-feedback">
                            Please provide a valid start date.
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" >End time</label>
                    </div>
                    <div class="col-sm-12 mb-3">
                    <div class="bootstrap-timepicker ">
                        <input id="endtime" name="endtime" type="time" class="form-control  " required>
                        <div class="invalid-feedback">
                            Please provide a valid end date.
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div id="invalidTimeslotCreation"></div>
                    <input class=" btn btn-primary btn-md my-3" name="add" type="submit" value="Add Timeslot">   
                    </div>
                </div>
            </form>
        </div>

</div>
    <div class="row"><hr/>
        <div class="col-sm-3">
            <input class=" btn btn-primary btn-md my-2" type="button" onclick="window.location.href='createJob.php'" value="Show My Interviews">   
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
    var $table = $('#timeslots');

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

    function checkTime(){
        //console.log(document.getElementById('starttime').value=="");
        if(document.getElementById('starttime').value=="" || document.getElementById('endtime').value==""){
            
            if(document.getElementById('starttime').value==""){
                document.getElementById('starttime').classList.add('is-invalid');
                document.getElementById('starttime').classList.remove('is-valid');                
            }else{
                document.getElementById('starttime').classList.add('is-valid');
                document.getElementById('starttime').classList.remove('is-invalid');       
            }
            if(document.getElementById('endtime').value==""){
                document.getElementById('endtime').classList.add('is-invalid');
                document.getElementById('endtime').classList.remove('is-valid');
            }else{
                document.getElementById('endtime').classList.add('is-valid');
                document.getElementById('endtime').classList.remove('is-invalid'); 
            }
            return false;
        }else{
            if(document.getElementById('starttime').value<document.getElementById('endtime').value){
                return true;
            }else{
                $("#invalidTimeslotCreation").animate({
                    height: '+=72px'
                }, 300);
                $('<div class="alert alert-danger">Invalid time slot.</div>').hide().appendTo('#invalidTimeslotCreation').fadeIn(1000);
            
                $(".alert").delay(3000).fadeOut(
                    "normal",
                    function(){
                        $(this).remove();
                    });
            
                $("#invalidTimeslotCreation").delay(4000).animate({
                    height: '-=72px'
                }, 300);
                return false;
            }           
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

function updateActiveStatus($data) {
    try{
        global $con;
        $valuesAr=explode("_",$data);
        $timeslotId=$valuesAr[0];
        $activeCode=$valuesAr[1];

        $sql="update interview_timeslot set isactive =$activeCode where id=$timeslotId";
        mysqli_query($con,$sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $timeslotId;
}

if(isset($_POST['add'])){
     try{
        $startTime = $_POST['starttime'];
        $endTime = $_POST['endtime'];
        $time = $startTime."-".$endTime; 
        $sql = "insert into interview_timeslot (time,employer_id,isactive) values ('$time',$id,1)";
        mysqli_query($con,$sql);
        echo "<script>window.location.href='addInterviewTimeslot.php'</script>";
     }
     catch(Exception $e){
        echo $e->getMessage();
     }
}
?>