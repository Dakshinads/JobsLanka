<?php require "../DBCon.php";
require "../fillCombo.php";
require("../sajax.php");     
sajax_init();
sajax_export("changeTableData");
sajax_handle_client_request();
session_start();
if(isset($_SESSION['userInfo']) && $_SESSION['userInfo']['job_role_id']==1){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Jobs</title>
    <link rel="icon" type="image/x-icon" href="../images/logo-no-background.ico">
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\assets\css\jobslanka.css" rel="stylesheet">
    <link href="..\assets\css\dashboard.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


   

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
          <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="adminDash.php">
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
                      <a class="nav-link " href="#">
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
                          <a class="nav-link " href="jobType.php">
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
            <a class="nav-link active" href="jobs.php">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inquiry.php">
              <span data-feather="mail" class="align-text-bottom"></span>
              Inquiry
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Feedback
            </a>
          </li>
          <hr/>
          <li class="nav-item">
            <a class="nav-link" href="myProfileA.php">
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
        <h1 class="h2 mt-3">Jobs</h1></br> 
        <div class="row">
        <div class="col-1 ">
        <label  class="h6">Job Status:</label></div>
        <div class="col-5 ">
        <select class="form-select form-select-sm" id="jStatus" name="jStatus" onchange="changeTableData()">
            <option value="0">All Jobs</option>
            <option value="1">Approval Pending Jobs</option>
            <option value="2">Approved Jobs</option>
            <option value="3">Declined Jobs</option>
            <option value="4">Achived Jobs</option>
        </select>
        </div>
        <div class="col-1 ">
        <label  class="h6">Search:</label></div>
        <div class="col-5 ">
          <input type="text" class="form-control form-control-sm rounded" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>
    <div class="row">
      <div class="table-responsive my-4" >
        <table class="table table-striped table-sm "  data-height="500" id="jobs"  data-unique-id="id" >
            <thead >
            <tr>
                <th scope="col" class="col-2 " data-field="id">Job Reference No</th>
                <th scope="col" class="col-3 ">Employer Name</th>
                <th scope="col" class="col-3 ">Title</th>
                <th scope="col" class="col-2 ">Category</th>
                <th scope="col" class="col-1 ">Status</th>
                <th scope="col" class="col-1 "></th>
            </tr>
            </thead>
            <tbody id="jobsTableBody">              
            </tbody>
        </table>
        </div>
    </div>
    </main>
  </div>
  </div>

  <!-- View Model -->
  <div class="modal fade" id="viewJobModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">

        <div class="row">
          <div class="col-sm-12 mt-5 text-center">
          <h4 class="mb-3" id ="title"></h4>
          <h6 id="companyName"></h6><hr/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-5">
                <p class="h6">Type :</p>
            </div>
            <div class="col-sm-7">
                <p class="" id="jobType"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
                <p class="h6"> Location :</p>
            </div>
            <div class="col-sm-7 ">
                <p class="" id="location"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
                <p class="h6">Opening Date :</p>
            </div>
            <div class="col-sm-7 ">
                <p class="" id="openingDate"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5 ">
                <p class="h6">Closing Date :</p>
            </div>
            <div class="col-sm-7 ">
                <p class="" id="closingDate"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
                <p class="h6">Job Status :</p>
            </div>
            <div class="col-sm-7 ">
                <p class="" id="status">
                </p>
            </div>
          </div>
          </div>
          <div class="col-sm-4">
            <img src='' id="employerLogo" width="80%">
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-sm-12 mb-3" id="description">              
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 mb-3">
            <img src='' id="jobPostImage" width="90%">
          </div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="$('#viewJobModal').modal('hide');">Close</button>
        </div>
      </div>
    </div>
  </div>

   <script src="..\assets\js\form-validations.js"></script>
   <script src="..\assets\js\bootstrap.bundle.min.js"></script>
    <script src="..\assets\js\feather.js"></script>
    <script src="..\assets\js\jquery-3.6.1.min.js"></script>
    <script src="..\assets\js\bootstrap-table.min.js"></script>
    <script src="..\assets\js\bootstrap-table-sticky-header.js"></script>
   <script>
  <?php sajax_show_javascript(); ?>

  function changeTableData(){
    jobStatus = document.getElementById('jStatus').value;
    x_changeTableData(jobStatus,changeTableData_x);
  }
  function changeTableData_x(msg){
    document.getElementById("jobsTableBody").innerHTML = "";
    document.getElementById('jobsTableBody').innerHTML = msg;
  

  }

  var $table = $('#jobs');

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
  

  Window.onload = changeTableData();

  function viewModel(datar)
  {
    var datav=JSON.parse(JSON.stringify(datar));  
    $("#viewJobModal").modal("show");
    document.getElementById('title').innerHTML = datav['title'];
    document.getElementById('companyName').innerHTML = datav['employername'];
    document.getElementById('jobType').innerHTML = datav['typename'];
    document.getElementById('location').innerHTML = datav['location'];
    document.getElementById('openingDate').innerHTML = datav['opening_date'];
    document.getElementById('closingDate').innerHTML = datav['closing_date'];
    status="";
    if(datav['status']==0){
      status = "Pending for Approval";  
    }else if(datav['status']==1){
      if(datav['active']==0){
        status = "Approved( Inactive)"; 
      }
      else if(datav['active']==1){
        status = "Approved( Active)";
      }
    }
    else if(datav['status']==2){
      reason = datav['reason'];
      status= "Declined ( Reason: "+reason+")";
    }
    else if(datav['status']==3){      
      status= "Achieved";
    }
    document.getElementById('status').innerHTML = status;
    document.getElementById('description').innerHTML = datav['description'];
    if(datav['image'].length>0){
     document.getElementById('jobPostImage').src ="../Uploads/JobPostImages/"+ datav['image'];
    } else{
    document.getElementById('jobPostImage').src ="";
    }
    if(datav['employerlogo']!=null){
     document.getElementById('employerLogo').src ="../Uploads/Logo/"+ datav['employerlogo'];
    } else{
      document.getElementById('employerLogo').src ="";
    }
  }

  $('#search').keyup(function() {
 
 var input, filter, table, tr, td, i, txtValue;
 input = document.getElementById("search");
 filter = input.value.toUpperCase();
 table = document.getElementById("jobs");
 tr = table.getElementsByTagName("tr");

 // Loop through all table rows, and hide those who don't match the search query
 for (i = 0; i < tr.length; i++) {
   td1 = tr[i].getElementsByTagName("td")[1];
   td2 = tr[i].getElementsByTagName("td")[2];
   td3 = tr[i].getElementsByTagName("td")[3];
   if (td1) {
     txtValue1 = td1.textContent || td1.innerText;
     txtValue2 = td2.textContent || td2.innerHTML;
     txtValue3 = td3.textContent || td3.innerHTML;
     if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
       tr[i].style.display = "";
     } else {
       tr[i].style.display = "none";
     }
   }

 }

});

</script>
  </body>
</html>
<?php
}else{
    header("location: index.php");
}

function changeTableData($data){
    try{
      // value="0">All Jobs
      // value="1">Approval Pending Jobs
      // value="2">Approved Jobs
      // value="3">Not Approved Jobs
      // value="4">Achived Jobs
      $sql="";
      if($data==0){
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname from job as j, job_category as jc, job_type as jt,
        employer as e where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id order by categoryname ";
      }
      else if($data==1){
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname from job as j, job_category as jc, job_type as jt,
        employer as e where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id and j.status =0 order by categoryname";
      }
      else if($data==2){
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname from job as j, job_category as jc, job_type as jt,
        employer as e where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id and j.status =1 order by categoryname";
      }
      else if($data==3){
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname from job as j, job_category as jc, job_type as jt,
        employer as e where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id and j.status =2 order by categoryname";
      }
      else if($data==4){
        $sql="select j.*,e.name as employername, jt.name as typename, e.logo as employerlogo, jc.name as categoryname from job as j, job_category as jc, job_type as jt,
        employer as e where j.job_category_id=jc.id and j.job_type_id=jt.id and j.employer_id = e.id and j.status =3 order by categoryname";
      }
      
      global $con;
      $values="";
      if($result=mysqli_query($con,$sql)){
        while($row = mysqli_fetch_assoc($result)){
  
          $values.="<tr><td> ".$row['job_ref_no']."</td>";
          $values.="<td>".$row['employername']."</td>"; 
          $values.="<td>".$row['title']."</td>";
          $values.="<td>".$row['categoryname']."</td>";
          if($row['status']==0){
            $values.= "<td><span class='badge bg-primary'>Pending for Approval</span></td>";
        }else if($row['status']==1) {
          $values.=  "<td><span class='badge  bg-success'>Approved</span></td>";
        }
        else if($row['status']==2) {
            $reason = $row['reason'];
            $values.=  "<td><span class='badge bg-danger'>Declined</span></td>";
        
        }
        else if($row['status']==3) {
          $values.= "<td><span class='badge bg-warning'>Achieved</span></td>";
        } 
          $datar =json_encode($row);
          $values.='<td class="text-center"><button type="button" class="btn btn-secondary btn-sm"  onclick=\'viewModel('.$datar.')\' ><i class="bi bi-eye"></i> View</button>';
          $values.="</td></tr>";
        }
      }
  
      return $values;
    }catch(Exception $e){
      echo $e->getMessage();
    }
    
  }
?>