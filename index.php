<?php
session_start();
require "DBCon.php";
require "sajax.php";
require "fillCombo.php" ;
sajax_init();
sajax_export("changeTableData");
sajax_handle_client_request();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Home Page</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link href="assets\css\feeback.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<body>

<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\feather.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\bootstrap-table.min.js"></script>
<script src="assets\js\bootstrap-table-sticky-header.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="mb-3" style="background-color: #8ad2f6;">
  <section class="py-4 text-center container">
    <div class="row py-lg-1">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="display-5 fst-italic">The Home of Your Dream Job</h1>
        <p class="lead" >Join us to find an advanced job to succeed in the future with your job portal</p>
      </div>
    </div>
  </section>
</main>

<main class="container mt-5">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9">
      <div class ="row mb-5 shadow p-3 bg-white rounded">
        <div class="col-sm-3 px-1">
          <label  class="form-label"><strong>Search</strong></label>
          <input type="text" class="form-control form-control-sm rounded" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
        <div class="col-sm-3 px-1">
          <label  class="form-label"><strong>Category</strong></label>
          <select class="form-select form-select-sm" id="category" name="category">
            <option value="0">All category</option>
            <?php getComboValue('job_category'); ?>
          </select>
        </div>
        <div class="col-sm-2 px-1">
          <label  class="form-label"><strong>Location</strong></label>
          <select class="form-select form-select-sm" id="jlocation" name="jlocation" >
            <?php getComboLocation(); ?>
          </select>
        </div>
        <div class="col-sm-2 px-1">
          <label  class="form-label "><strong>Type</strong></label>
          <select class="form-select form-select-sm" id="type" name="type">
            <option value="0">All Type</option>
            <?php getComboValue('job_type'); ?>
          </select>
        </div>
        <div class="col-sm-2 px-1">
          <br/>
          <button type="button" class="btn btn-primary col-12 btn-md" name="find" id="find" onclick="changeTableData()">Find</button>
        </div>

      </div>
      <div class="table-responsive shadow bg-white rounded" >
        <table class="table table-sm "   data-height="600" id="jobs" data-unique-id="id">
          <thead style="background-color: #8ad2f6;">
            <tr>
              <th scope="col" class="col-7 text-center " data-field="id"><h6>Job Title</h6></th>
              <th scope="col" class="col-1 text-center "><h6>Opening Date</h6></th>
              <th scope="col" class="col-1 text-center "><h6>Closing Date</h6></th>
              <th scope="col" class="col-2 "></th>
            </tr>
          </thead>
          <tbody id="jobsTableBody">
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
    <div class=" order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Jobs by Category</span>
          <span class="badge bg-primary rounded-pill">
            <?php 
              $getNumberOfActiveJobsSql ="select count(*) as cJobs from job where active=1";
              $result = mysqli_query($con,$getNumberOfActiveJobsSql);
              $NumberOfJobs = mysqli_fetch_assoc($result);
              echo $NumberOfJobs['cJobs'];
            ?>
          </span>
        </h4>
        <ul class="list-group mb-3">
          <?php
          $NumberOfJobsCategorywiseSql ="SELECT jc.name,count(j.job_ref_no)as numberOfJobs from 
          job_category as jc left join job as j on jc.id = j.job_category_id where active=1 group by jc.id;";
          $result =  mysqli_query($con,$NumberOfJobsCategorywiseSql);
          while($NumberOfJobsCategoryWise = mysqli_fetch_assoc($result)){
            echo '<li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-2">'.$NumberOfJobsCategoryWise['name'].'</h6>
                  </div>
                  <span class="text-muted">'.$NumberOfJobsCategoryWise['numberOfJobs'].'</span>
                </li>';
          }
          ?>         
        </ul>
      </div>
    </div>
  </div>
</main>
<main class="mb-5">
<div class="items container mb-5">
  <?php
    $getFeedbacksSql="SELECT f.description,js.name as jsname,e.name as ename,e.logo FROM feedback as f left join job_seeker as js on f.job_seeker_id=js.nic 
    LEFT JOIN employer as e on f.employer_id=e.id;";
    $rs=mysqli_query($con,$getFeedbacksSql);
    while($fbrow=mysqli_fetch_assoc($rs)){
  ?>
  <div class="card">
    <div class="card-body">
        <h4 class="card-title"><img src="Images/quote-left.png"></h4>
        
        <div class="template-demo">
            <p><?php echo $fbrow['description'] ?></p>
        </div><hr>

        <div class="row">
          <div class="col-sm-2">
            <?php if(strlen($fbrow['jsname'])>0){ ?>
              </div>
              <div class="col-sm-10">
                <div class="profile">
                <h4 class="cust-name"><?php
                if(str_word_count($fbrow['jsname'])>2){
                  $strName=explode(" ",$fbrow['jsname']);
                  echo $strName[0]." ".$strName[1];
                }else{
                  echo $fbrow['jsname'];
                }
                ?></h4>
                
                  <p class="cust-profession">Job Seeker</p>    
                </div>        
              </div>
            <?php }else{ ?>
              <img class="profile-pic" src="Uploads/Logo/<?php echo $fbrow['logo'] ?>"> 
              </div>
              <div class="col-sm-10">
                <div class="profile">
                <h4 class="cust-name"><?php echo $fbrow['ename'] ?></h4>
                  <p class="cust-profession">Employer</p>    
                </div>        
              </div>

            <?php } ?>
        </div>
    </div>
  </div>
  <?php } ?>
 </div>
</main>
<script>
$(document).ready(function(){
    
    $('.items').slick({
  dots: true,
  infinite: true,
  speed: 800,
 autoplay: true,
 autoplaySpeed: 2000,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});
          });

  var $table = $('#jobs');
 
  function buildTable($el) {
  var classes = $('.toolbar input:checked').next().text()

  $el.bootstrapTable('destroy').bootstrapTable({
      showFullscreen: false,
      search: false,
      stickyHeader: false,        
  })
  };

  $(function() {
      buildTable($table)
  });

  <?php sajax_show_javascript(); ?>

  function changeTableData(){
    category = document.getElementById('category').value;
    jlocation = document.getElementById('jlocation').value;
    type = document.getElementById('type').value;
    var dataAr = [category,jlocation,type];
    x_changeTableData(JSON.stringify(dataAr),changeTableData_x);
  }

  function changeTableData_x(msg){
    document.getElementById("jobsTableBody").innerHTML = "";
    document.getElementById('jobsTableBody').innerHTML = msg;
    document.getElementById("jobs").classList.remove('table-bordered');

  }
  window.onload = changeTableData();

$('#search').keyup(function() {
 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("jobs");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

});

</script>

<!-- Adding footer -->
<?php include "footer.php" ?>

</body>
</html>
<?php
function changeTableData($data){
  try{

    $dataAr = json_decode($data);
    // Index 0 = category id
    // Index 1 = location
    // Index 2 = type
    $sql="select j.job_ref_no, j.title, e.name as companyname, jt.name as typename, j.opening_date, j.closing_date from job as j, job_category as jc, 
    job_type as jt, employer as e where j.job_category_id = jc.id and j.job_type_id = jt.id and j.employer_id = e.id and j.active = 1 ";
    if($dataAr[0] !=0){
      $sql = $sql." and j.job_category_id = ".$dataAr[0]." "; 
    }
    if($dataAr[1] !="All Locations"){
      $sql = $sql." and j.location = '".$dataAr[1]."' "; 
    }
    if($dataAr[2] !=0){
      $sql = $sql." and j.job_type_id = ".$dataAr[2]." "; 
    }
    $sql = $sql." order by j.job_ref_no desc";
    global $con;
    $values="";
    if($result=mysqli_query($con,$sql)){
      while($row=mysqli_fetch_assoc($result)){

        $values .= "<tr ><td><h6 class='mt-2 '>".$row['title']."</h6> <small class='text-muted'>".$row['companyname']."  </small>  <span class='badge bg-success mb-2'>".$row['typename']."</span></td>";
        $values .= "<td class='text-center '>".$row['opening_date']."</td>";
        $values .= "<td class='text-center '>".$row['closing_date']."</td>";
        $values .= "<td class='text-center '><button class=' btn btn-info btn-sm text-dark' onclick='window.location.href=\"viewJob.php?id=".$row['job_ref_no']."\" ' >View Details</button></td></tr>";

      }
    }
    return $values;
  }catch(Exception $e){
    echo $e->getMessage();
  }  
}
?>