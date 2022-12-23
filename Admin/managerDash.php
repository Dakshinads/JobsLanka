<?php require "../DBCon.php"; 
session_start();
require("../sajax.php");
sajax_init();
sajax_export("changeTableDatab");
sajax_export("changeTableDatac");
sajax_handle_client_request();
if(isset($_SESSION['userInfo']) && $_SESSION['userInfo']['job_role_id']==2){


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Manager Dashboard</title>
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
            <a class="nav-link active" aria-current="page" href="managerDash.php">
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
            <a class="nav-link" href="feedbackM.php">
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
     
    <h1 class="h2 mt-3">Dashboard</h1></br> 
    <input type="hidden" name="hdnUserDeptID" id="hdnUserDeptID" value="<?php echo $_SESSION['userDepartmentID']?>" >
    <input type="hidden" name="hdnUserDeptName" id="hdnUserDeptName" value="<?php echo $_SESSION['userDepartmentName']?>" >

    <div class="row shadow p-3 my-3 bg-white rounded" >
      <h5 class="h5 mb-5 text-center">The Most Job Posted Employers in  <?php echo $_SESSION['userDepartmentName']; ?></h5>
      <div class="col-7">
        <div id="chart3" ></div>
      </div>
      <div class="col-5">
      <div class="table-responsive" >
            <table class="table table-striped table-sm "  data-height="350" id="table3" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-8 " data-field="id">Employer's Name</th>
                  <th scope="col" class="col-4 ">Number of Job Posted</th>
                </tr>
              </thead>
              <tbody id="tableBodyc">
              </tbody>
            </table>
        </div>
      </div>
    </div>

    <div class="row shadow p-3 my-3 bg-white rounded" >
      <div class="row my-4">
        <div class="col-6">
        <select class="form-select form-select-sm" id="rp" name="rp" onchange="changeTableDatab()">
            <option value="0">Most approved job posted company</option>
            <option value="1">Most declined job posted company</option>
        </select>
        </div>
      </div>
   
    <h5 class="h5 mb-5 text-center" id="lblheading"></h5>
      <div class="col-7">
        <div id="chart2" ></div>
      </div>
      <div class="col-5">
      <div class="table-responsive" >
            <table class="table table-striped table-sm "  data-height="350" id="table2" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-8 " data-field="id">Employer's Name</th>
                  <th scope="col" class="col-4 ">Number of Job Posted</th>
                </tr>
              </thead>
              <tbody id="tableBodyb">
              </tbody>
            </table>
        </div>
      </div>
    </div>

    </main>
  </div>
  </div>
   <script src="..\assets\js\form-validations.js"></script>
   <script src="..\assets\js\bootstrap.bundle.min.js"></script>
    <script src="..\assets\js\feather.js"></script>
    <script src="..\assets\js\jquery-3.6.1.min.js"></script>
    <script src="..\assets\js\bootstrap-table.min.js"></script>
    <script src="..\assets\js\bootstrap-table-sticky-header.js"></script>
    <script src="..\assets\js\apexchart.js"></script>

<script>
  var $table1 = $('#table2');

  function buildTable($el) {
  var classes = $('.toolbar input:checked').next().text()

  $el.bootstrapTable('destroy').bootstrapTable({
      showFullscreen: false,
      search: false,
      stickyHeader: false,        
  })
  };

  $(function() {
      buildTable($table1)
  }); 

  var $table2 = $('#table3');

  function buildTable($el) {
  var classes = $('.toolbar input:checked').next().text()

  $el.bootstrapTable('destroy').bootstrapTable({
      showFullscreen: false,
      search: false,
      stickyHeader: false,        
  })
  };

  $(function() {
      buildTable($table2)
  });

  <?php sajax_show_javascript(); ?>

  // third table data bind
  function changeTableDatac(){
      id= $('#hdnUserDeptID').val();
      x_changeTableDatac(id,changeTableDatac_x);
    }

    function changeTableDatac_x(msg){
      var ar = new Array();
      ar = JSON.parse(msg);
      
      var names=new Array();
      names=ar[1];
      var numberOfApplied=new Array();
      numberOfApplied=ar[0];
      
        
      $('#table3 tbody tr').remove();

      if(names.length>0){  
        for(i=0;i<names.length;i++){    
          var html="<tr><td>"+names[i]+"</td><td class='text-center'>"+numberOfApplied[i]+"</td></tr>";    
          $('#table3 tbody').append(html);  
        }  
      }
        //chart 3 creation
        document.getElementById("chart3").innerHTML="";
        var options = {
          series: numberOfApplied.map(i=>Number(i)),
          chart: {
          height: 300,
          type: 'pie',
          toolbar: {
        show: true,
        offsetX: 0,
        offsetY: 0,
        tools: {
          download: true,
        },
        export: {
          csv: {
            filename: undefined,
            columnDelimiter: ',',
            headerCategory: 'category',
            headerValue: 'value',
            dateFormatter(timestamp) {
              return new Date(timestamp).toDateString()
            }
          },
          svg: {
            filename: undefined,
          },
          png: {
            filename: undefined,
          }
        },
        autoSelected: 'zoom' 
      },
        },
        labels: names,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();

    }
    window.onload = changeTableDatac();


     // Second table data bind
     function changeTableDatab(){
      var id=document.getElementById('rp').value;
      var deptName=document.getElementById('hdnUserDeptName').value;
      var depid= $('#hdnUserDeptID').val();
      if(id==0){
        document.getElementById('lblheading').innerHTML="Most Approved Job Posted Company in "+deptName;
      }else{
        document.getElementById('lblheading').innerHTML="Most Declined Job Posted Company in "+deptName;
      }
      x_changeTableDatab(id+"_"+depid,changeTableDatab_x);
    }

    function changeTableDatab_x(msg){
      var ar = new Array();
      ar = JSON.parse(msg);
      
      var names=new Array();
      names=ar[1];
      var numberOfposted=new Array();
      numberOfposted=ar[0];
      
        
      $('#table2 tbody tr').remove();

      if(names.length>0){ 
        for(i=0;i<names.length;i++){    
          var html="<tr><td>"+names[i]+"</td><td class='text-center'>"+numberOfposted[i]+"</td></tr>";    
          $('#table2 tbody').append(html);  
        }  
      }
          // chart 2 creation
          document.getElementById("chart2").innerHTML="";
          var options = {
          chart: {
            type: 'bar',
            height:300,
            
          },
          series: [{
            name: 'Number of Appliers',
            data: numberOfposted
          }],
          xaxis: {
            categories: names
          }
        }
        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();

    }
    window.onload = changeTableDatab();
</script>
  </body>
</html>
<?php
}else{
    header("location: index.php");
}

function changeTableDatac($d){
  try{
    global $con;
    $sql="select COUNT(j.job_ref_no) jscount, e.name from job as j, employer as e where j.employer_id=e.id and j.job_category_id=$d 
    GROUP by e.id order by jscount desc;";
    $rs=mysqli_query($con,$sql);
    $countar=array();
    $namear=array();
    while($r=mysqli_fetch_assoc($rs)){
      array_push($countar,$r['jscount']);
      array_push($namear,$r['name']);
    }

    $tarray=array($countar,$namear);
    return json_encode($tarray);
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

function changeTableDatab($d){
  try{
    global $con;
    $idar=explode("_",$d);
    if($idar[0]==0){
      $sql="SELECT COUNT(j.job_ref_no) as jscount, e.name FROM job as j, employer as e where e.id=j.employer_id and j.status in (1,3) 
      and j.job_category_id=$idar[1] group by e.id order by jscount desc;";
    }else{
      $sql="SELECT COUNT(j.job_ref_no) as jscount, e.name FROM job as j, employer as e where e.id=j.employer_id and j.status in (2) 
      and j.job_category_id=$idar[1] group by e.id order by jscount desc;";
    }
    
    $rs=mysqli_query($con,$sql);
    $countar=array();
    $namear=array();
    while($r=mysqli_fetch_assoc($rs)){
      array_push($countar,$r['jscount']);
      array_push($namear,$r['name']);
    }

    $tarray=array($countar,$namear);
    return json_encode($tarray);
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}
?>