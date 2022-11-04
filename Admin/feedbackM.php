<?php require "../DBCon.php"; 
require("../sajax.php"); 
sajax_init();
sajax_export("changeTableData");
sajax_handle_client_request();
session_start();
if(isset($_SESSION['userInfo']) && $_SESSION['userInfo']['job_role_id']==2){


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Feedback</title>
    <link rel="icon" type="image/x-icon" href="../images/logo-no-background.ico">
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\assets\css\jobslanka.css" rel="stylesheet">
    <link href="..\assets\css\dashboard.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script src="..\assets\js\bootstrap.bundle.min.js"></script>
    <script src="..\assets\js\feather.js"></script>
    <script src="..\assets\js\jquery-3.6.1.min.js"></script>
    <script src="..\assets\js\bootstrap-table.min.js"></script>
    <script src="..\assets\js\bootstrap-table-sticky-header.js"></script>
   

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a href="..\index.php" class="d-flex align-items-center mb-3 mb-md-0 pv-3 px-3 me-md-auto link-dark text-decoration-none">
                  <img src="..\Images\logo_noBack.png"
                    style="width: 200px;"  class="pb-3 py-3" alt="logo">
        </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap mx-5">
    <img src="../Uploads/ProfilePics/<?php echo $_SESSION['userInfo']['image']; ?>" alt="" width="35" height="35" class="rounded-circle me-2">
    <span class=" mx-2 pt-2 h6">Hi <?php echo $_SESSION['userInfo']['name']; ?> (<?php echo $_SESSION['userDepartmentName']; ?>)</span>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">     
        <ul class="nav flex-column">
          <li class="nav-item ">
            <a class="nav-link " aria-current="page" href="managerDash.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>

          <?php if(strlen($_SESSION['userDepartmentName'])){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="managerJobs.php" >
              <span data-feather="users" class="align-text-bottom"></span>
              Jobs
            </a>
          </li> <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="inquiryM.php">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Inquiry
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="feedbackM.php">
              <span data-feather="mail" class="align-text-bottom"></span>
              Feedback
            </a>
          </li>
          <hr/>
          <li class="nav-item">
            <a class="nav-link" href="myProfileM.php">
              <span data-feather="user" class="align-text-bottom"></span>
              My Profile 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ad-logout.php" >
              <span data-feather="log-out" class="align-text-bottom"></span>
              Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="h2 mt-3">Feedback</h1></br>  
    <div class="row my-3">
        <div class="col-2 ">
        <label  class="h6">Inquiry Status:</label></div>
        <div class="col-6 ">
        <select class="form-select form-select-sm" id="iStatus" name="iStatus" onchange="changeTableData()">
            <option value="0">All Feedback</option>
            <option value="1">Employer's Feedback</option>
            <option value="2">Job Seeker's Feedback</option>
        </select>
        </div>
    </div>
    <div class="row">
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="respondAlert">
        Responded for inquery..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
        <div class="table-responsive" >
            <table class="table table-striped table-sm "  data-height="500" id="feedback" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-3 " data-field="id">Name</th>
                  <th scope="col" class="col-2 ">Account Type</th>
                  <th scope="col" class="col-7 ">Feedback</th>
                </tr>
              </thead>
              <tbody id="feedbackTableBody">
              </tbody>
            </table>
          </div>
    </div>       
    </main>
  </div>
  </div>
            
<script>
    var $table = $('#feedback');

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

</script> 
<script src="..\assets\js\form-validations.js"></script>
<script>
    <?php sajax_show_javascript(); ?>

    function changeTableData(){
        inquiryStatus = document.getElementById('iStatus').value;
        x_changeTableData(inquiryStatus,changeTableData_x);
    }

    function changeTableData_x(msg){
        document.getElementById("feedbackTableBody").innerHTML = "";
        document.getElementById('feedbackTableBody').innerHTML = msg;

    }
    window.onload = changeTableData();

</script>
  </body>
</html>
<?php
}else{
    header("location: index.php");
}
function changeTableData($data){
    try{
      $status=$data;
      // status 0 = All Feedback
      // status 1 = Employer's Feedback
      // status 2 = Job Seeker's Feedback
  
      $sql="";
      if($status==0){
        $sql="select f.description,e.name as employername,j.name as jobseekername from feedback as f left join employer as e on f.employer_id = e.id left join job_seeker as j on  f.job_seeker_id = j.nic";
      }
      else if($status==1){
        $sql="select f.description,e.name as employername from feedback as f inner join employer as e on f.employer_id = e.id;";
      }
      else if($status==2){
        $sql="select f.description,j.name as jobseekername from feedback as f inner join job_seeker as j on f.job_seeker_id = j.nic;";
      }
      global $con;
      $values="";
      if($result=mysqli_query($con,$sql)){
        while($row=mysqli_fetch_assoc($result)){
          $name="";
          $accountType="";
          if(array_key_exists('employername',$row)){
              if(array_key_exists('jobseekername',$row)){
                  if($row['employername']!=null){
                      $name = $row['employername'];
                      $accountType="Employer";
                  }else{
                      $name = $row['jobseekername'];
                      $accountType = "JobSeeker";
                  }
              }else{  
                  $name = $row['employername'];
                  $accountType="Employer";
              }
          }else{
              $name = $row['jobseekername'];
              $accountType = "JobSeeker";
          }
  
  
          $values .= "<tr><td>".$name."</td>";
          $values .= "<td>".$accountType."</td>";
          $values .= "<td>".$row['description']."</td></tr>";
        }
      }
      return $values;
    }catch(Exception $e){
      echo $e->getMessage();
    }
    
}
?>