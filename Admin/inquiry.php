<?php require "../DBCon.php";
require("../sajax.php"); 
session_start();
sajax_init();
sajax_export("changeTableData");
sajax_export("checkRespond");
sajax_handle_client_request();
if(isset($_SESSION['userInfo']) && $_SESSION['userInfo']['job_role_id']==1){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Inquiry</title>
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
    <span class=" mx-2 pt-2 lead">Hi <?php echo $_SESSION['userInfo']['name']; ?> </span>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">     
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="adminDash.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Users
            </a>
          </li>

          <li class="nav-item">
          <div class="accordion"id="ac1" >
            <div class="">
                  <button class="accordion-button collapsed py-0 px-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                      <a class="nav-link" href="#">
                        <span data-feather="database" class="align-text-bottom"></span>
                        Table
                      </a>
                  </button>
              <div id="collapseOne" class="accordion-collapse collapse hide" data-bs-parent="#ac1">
                  <div class=" py-0 px-3">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link" href="jobCategory.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Category
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  " href="jobType.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Type
                          </a>
                        </li>                                               
                      </ul>
                  </div>
              </div>
            </div>
          </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="inquiry.php">
              <span data-feather="mail" class="align-text-bottom"></span>
              Inquiry
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Feedback
            </a>
          </li>
          <hr/>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="user" class="align-text-bottom"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ad-logout.php">
              <span data-feather="log-out" class="align-text-bottom"></span>
              Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     
    <h1 class="h2 mt-3">Inquiry</h1></br>
    <div class="row">
        <div class="col-1 ">
        <label  class="h6">Inquiry Status:</label></div>
        <div class="col-6 ">
        <select class="form-select form-select-sm" id="iStatus" name="iStatus" onchange="changeTableData()">
            <option value="0">All Inquiries</option>
            <option value="1">Respond Pending Inquiries</option>
            <option value="2">Responded Inquiries</option>
        </select>
        </div>
    </div>
    <div class="row">
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="respondAlert">
        Responded for inquery..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
        <div class="table-responsive" >
            <table class="table table-striped table-sm "  data-height="500" id="inquiry" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-1 " data-field="id">ID</th>
                  <th scope="col" class="col-2 ">Name</th>
                  <th scope="col" class="col-2 ">Email</th>
                  <th scope="col" class="col-1 ">Contact No</th>
                  <th scope="col" class="col-3 ">Message</th>
                  <th scope="col" class="col-1 ">Is Respond</th>
                  <th scope="col" class="col-2 ">Responded Person Name</th>
                </tr>
              </thead>
              <tbody id="inquiryTableBody">
              </tbody>
            </table>
          </div>
    </div>        
    </main>
  </div>
  </div>

  <script>
    var $table = $('#inquiry');

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
  document.getElementById("inquiryTableBody").innerHTML = "";
  document.getElementById('inquiryTableBody').innerHTML = msg;

}
window.onload = changeTableData();

function checkRespond(id){
  checkRespondID="resondCheck_"+id;
  if(document.getElementById(checkRespondID).checked==true){
    $data=id;
    x_checkRespond($data,checkRespond_x);
  }

}

function checkRespond_x(msg){
  changeTableData();
  $('#respondAlert').show().delay(200).addClass('in').fadeOut(2000)
}
</script>
  </body>
</html>
<?php
}
else{
  header("location:ad-logout.php");
}

function changeTableData($data){
  try{
    $status=$data;
    // status 0 = All Inquiries
    // status 1 = Respond Pending Inquiries
    // status 2 = Responded Inquiries

    $sql="";
    if($status==0){
      $sql="select i.*,s.name as staffName from inquiry as i left join staff as s on i.staff_id=s.nic;";
    }
    else if($status==1){
      $sql="select i.*,s.name as staffName from inquiry as i left join staff as s on i.staff_id=s.nic where i.staff_id IS NULL;";
    }
    else if($status==2){
      $sql="select i.*,s.name as staffName from inquiry as i left join staff as s on i.staff_id=s.nic where i.staff_id IS NOT NULL;";
    }
    global $con;
    $values="";
    if($result=mysqli_query($con,$sql)){
      while($row=mysqli_fetch_assoc($result)){
        $values .= "<tr><td>".$row['id']."</td>";
        $values .= "<td>".$row['name']."</td>";
        $values .= "<td>".$row['email']."</td>";
        $values .= "<td>".$row['phone_no']."</td>";
        $values .= "<td>".$row['message']."</td>";
        $state="";
        if($row['staff_id']!= NULL){
          $state= "checked disabled";
        }
        $values .= "<td >
        <div class='form-check'>
          <input class='form-check-input '  type='checkbox' id='resondCheck_".$row['id']."' onclick='checkRespond(".$row['id'].")' $state>
        </div>
        </td>";
        $values .= "<td>".$row['staffName']."</td></tr>";

      }
    }
    return $values;
  }catch(Exception $e){
    echo $e->getMessage();
  }
  
}
function checkRespond($data){
  try{
    global $con;
    $userID=$_SESSION['userInfo']['nic'];
    $sql = "update inquiry set staff_id='$userID' where id=$data ";
    mysqli_query($con,$sql);

  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}
?>