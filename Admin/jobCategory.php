<?php require "../DBCon.php";
require "../fillCombo.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Job category</title>
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
                  <button class="accordion-button py-0 px-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                      <a class="nav-link active" href="#">
                        <span data-feather="database" class="align-text-bottom"></span>
                        Table
                      </a>
                  </button>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#ac1">
                  <div class=" py-0 px-3">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" href="jobCategory.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Category
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="jobType.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Type
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="location.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Location
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
            <a class="nav-link" href="#">
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
            <a class="nav-link" href="#">
              <span data-feather="log-out" class="align-text-bottom"></span>
              Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     
    <h1 class="h2 mt-3">Job category</h1></br>
    <div class="row">
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="updateDoneAlert">
        Job category updated..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="deleteDoneAlert">
        Job category deleted..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
        <div class="table-responsive" >
            <table class="table table-striped table-sm " data-show-columns="true" data-height="350" id="jCat" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-1 " data-field="id">ID</th>
                  <th scope="col" class="col-3 ">Name</th>
                  <th scope="col" class="col-3 ">Description</th>
                  <th scope="col" class="col-2 ">Manager Name with ID</th>
                  <th scope="col" class="col-3 "></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sql= "select j.*,s.name as managerName from job_category as j left join staff as s on j.manager_id =s.nic where j.isactive=1 ";
                $result = mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php 
                  if($row['managerName']!="")
                    echo $row['managerName']."-".$row['manager_id']; ?></td>
                  <td class="text-center">
                  <button type="button" class="btn btn-info btn-sm"  onclick="openUpdateModel(<?php echo $row['id']; ?>)" ><i class="bi bi-arrow-repeat"></i>Update</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="openDeleteModel(<?php echo $row['id']; ?>)"  ><i class="bi bi-trash"></i>Delete</button>
                  </td>
                </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
    </div>
    <hr>
    <h5 class="mb-3">Add Job Category</h5>
    <div class='alert alert-success alert-dismissible collapse' role='alert' id="addDoneAlert">
      New Job category added..
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <div class="row">
    <form method="POST" action="" class="needs-validation" novalidate>
    <div class="col-12 mb-3">
              <label  class="form-label">Name</label>
              <input type="text" class="form-control" id="aname" name="aname" placeholder="Category Name" value="" required>
              <div class="invalid-feedback">
                Valid job category name is required.
              </div>
    </div>

    <div class="col-12 mb-3">
              <label  class="form-label">Description</label>
              <input type="text" class="form-control" id="adescription" name="adescription" placeholder="Category Description" value="" >
              <div class="invalid-feedback">
                Valid job category description is required.
              </div>
    </div>

    <div class="row ">
        <div class="col-12 mb-3">
            <input class=" btn btn-primary btn-md" name="add" type="submit"  value="Add">
        </div>
    </div>

    </form>    
    </div>        
    </main>
  </div>
  </div>

  <script>
    var $table = $('#jCat');

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
        
    var createdOptionValue='';
    function openUpdateModel(id){
      var $table = $('#jCat')
      var data=JSON.parse(JSON.stringify($table.bootstrapTable('getRowByUniqueId', id)));
      $('#updateDataModal').modal({backdrop: 'static', keyboard: false});
      $('#updateDataModal').modal("show");
        document.getElementById('uid').value =id;
        document.getElementById('uname').value = data[1];
        document.getElementById('udescription').value = data[2];
        managerAr =data[3].split("-");
        createdOptionValue='';

        if(managerAr.length>1){
          var x = document.getElementById("umanager");
          var option = document.createElement("option");
          option.text = managerAr[0];
          option.value = managerAr[managerAr.length-1];
          option.selected = true;
          x.add(option);
          createdOptionValue=managerAr[1];
        }
        
    }

    function clearOption(){
        if(createdOptionValue.length>1){
          $("#umanager option[value='"+createdOptionValue+"']").remove();
        }
        
    }

    function openDeleteModel(id){
      var $table = $('#jCat')
      var data=JSON.parse(JSON.stringify($table.bootstrapTable('getRowByUniqueId', id)));
      $("#deleteDataModal").modal("show");
        document.getElementById('did').value =id;
        document.getElementById('deleteItem').innerHTML =data[1];
    }

    </script> 
<!-- Update Model -->
<div class="modal fade" id="updateDataModal"  role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Job Category Update</h5>
        </div>
        <form method="post" action="" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="col-12 mb-3">
                <label  class="form-label">ID</label>
                <input type="text" class="form-control" id="uid" name="uid" value="" readonly>               
          </div>
          <div class="col-12 mb-3">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" id="uname" name="uname" value="" required>
                <div class="invalid-feedback">
                  Valid job category name is required.
                </div>
          </div>
          <div class="col-12 mb-3">
                    <label  class="form-label">Description</label>
                    <input type="text" class="form-control" id="udescription" name="udescription" value="" >
                    <div class="invalid-feedback">
                      Valid job category description is required.
                    </div>
          </div>
          <div class="col-12 mb-3">
                    <label  class="form-label">Manager Name</label>
                    <select class="form-select" id="umanager" name="umanager" >
                    <option value="0">None</option>
                      <?php getComboValueM(); ?>
                    </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-info" name="updatem"  value="Update">
          <button type="button" class="btn btn-default" onclick="$('#updateDataModal').modal('hide');clearOption();">Close</button>
        </div>
        </form> 
      </div>
    </div>
  </div>  

<!-- Delete Model -->
<div class="modal fade" id="deleteDataModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Job Category Delete</h5>
        </div>
        <form method="post" action="" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="col-12 mb-3">
                <h6>Do you want to delete '<span id="deleteItem"></span>' ? </h6>   
                <input type="hidden" name="did" id="did"/>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-info" name="deletem"  value="Delete">
          <button type="button" class="btn btn-default" onclick="$('#deleteDataModal').modal('hide');">Close</button>
        </div>
        </form> 
      </div>
    </div>
  </div>





   <script src="..\assets\js\form-validations.js"></script>
  </body>
</html>
<?php

if(isset($_POST['add'])){
  try{
    $name=$_POST['aname'];
    $description = null;
    if(!empty($_POST['adescription'])){
        $description = $_POST['adescription'];
    }

    $sql = "insert into job_category(name,description,isactive) values ('$name','$description',1)";
    if(mysqli_query($con,$sql)){
      echo "<script>
      $('#addDoneAlert').fadeIn(10);
      </script>";
      echo "<script>window.location.href='jobCategory.php';</script>";
      exit;
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

if(isset($_POST['updatem'])){
  try{
    $id=$_POST['uid'];
    $name=$_POST['uname'];
    $description = null;
    if(!empty($_POST['udescription'])){
        $description = $_POST['udescription'];
    }
    $managerid='';

    $sql="";
    echo "------------------------------------------------------".$_POST['umanager'];
    if($_POST['umanager']>0){
      $managerid = $_POST['umanager'];
      $sql="update job_category set name ='$name', description='$description', manager_id='$managerid' where id=$id ";
    }else{
      $sql="update job_category set name ='$name', description='$description', manager_id=NULL where id=$id ";
    }
      
    if(mysqli_query($con,$sql)){
      echo "<script>
      clearOption();
      $('#updateDoneAlert').fadeIn(10);
      </script>";
      echo "<script>window.location.href='jobCategory.php';</script>";
      exit;
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

if(isset($_POST['deletem'])){
  try{
    $id=$_POST['did'];
    $sql="update job_category set isactive=0, manager_id=NULL where id=$id ";
    if(mysqli_query($con,$sql)){
      echo "<script>
      $('#deleteDoneAlert').fadeIn(10);
      </script>";
      echo "<script>window.location.href='jobCategory.php';</script>";
      exit;
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

?>