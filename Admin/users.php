<?php require "../DBCon.php";
require "../fillCombo.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Users</title>
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
            <a class="nav-link active" href="users.php">
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
                          <a class="nav-link  " href="jobType.php">
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
     
    <h1 class="h2 mt-3">Users</h1></br>
    <div class="row">
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="updateDoneAlert">
        User updated..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      <div class='alert alert-success alert-dismissible collapse' role='alert' id="deleteDoneAlert">
        User deleted..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
        <div class="table-responsive" >
            <table class="table table-striped table-sm " data-show-columns="true" data-height="550" id="user" data-unique-id="id">
              <thead >
                <tr>
                  <th scope="col" class="col-1 " data-field="id">NIC</th>
                  <th scope="col" class="col-2 ">Name</th>
                  <th scope="col" class="col-2 ">Email</th>
                  <th scope="col" class="col-2 ">Contact No</th>
                  <th scope="col" class="col-1 ">Job Role</th>
                  <th scope="col" class="col-1 ">Department</th>
                  <th scope="col" class="col-3 "></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sql= "select s.nic,s.name,s.address,s.email,s.phone_no,s.gender,s.image,j.name as jobrole, jc.name as department,j.id as job_role_id from job_role as j, staff as s left join job_category as jc on s.nic=jc.manager_id where s.isactive=1 and j.id=s.job_role_id;";
                $result = mysqli_query($con,$sql);?>
                <?php
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                
                <tr>
                  <td><?php echo $row['nic'];?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone_no']; ?></td>
                  <td><?php echo $row['jobrole']; ?></td>
                  <td><?php echo $row['department']; $datar =json_encode($row); ?></td>
                  <td class="text-center">
                    
                  <button type="button" class="btn btn-secondary btn-sm"  onclick='viewModel(<?php echo $datar ?>)' ><i class="bi bi-eye"></i>View</button>
                  <button type="button" class="btn btn-info btn-sm"  onclick='openUpdateModel(<?php echo $datar ?>)' ><i class="bi bi-arrow-repeat"></i>Update</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="openDeleteModel('<?php echo $row['nic']; ?> ')" ><i class="bi bi-trash"></i>Delete</button>
                  </td>
                </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <input class=" btn btn-primary btn-md" name="add" type="submit" onclick="window.location.href='userRegistration.php'" value="Add User">   
        </div> 
    </div>        
    </main>
  </div>
  </div>

  
<!-- Delete Model -->
<div class="modal fade" id="deleteDataModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title" >Delete User</h5>
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

<!--view Data Modal-->
<div class="modal fade" id="viewDataModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">User Profile</h5>
        </div>
        <div class="modal-body">
        <div class="row ">
            <div class="col-sm-7 mb-3">
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>NIC :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vnic">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Name :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vname">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Address :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vaddress">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Gender :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vgender">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Contact No :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vcno">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Email :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vemail">V</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb=3">
                            <h6>Job role :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vjrole">V</p>
                        </div>
                    </div>
                    <div class="row invisible" id="vdepdiv">
                        <div class="col-sm-4 mb=3">
                            <h6>Department :</h6>
                        </div>
                        <div class="col-sm-8 mb=3">
                            <p id="vdep">V</p>
                        </div>
                    </div>                  
            </div>
            <div class="col-sm-5 mb-3">
                <img src="" alt="" id ="vimage" style="width: 250px; height: 250px;" class="img-thumbnail">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="$('#viewDataModal').modal('hide');">Close</button>
        </div>
      </div>
    </div>
  </div>


<!-- Update Model -->
  <div class="modal fade" id="updateDataModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Update User</h5>
        </div>
        <form method="post" action="" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="modal-body">
        <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">NIC</label>
              <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC"  minlength="10" maxlength="12" value="" readonly>
            </div>
            <div class="col-sm-6 mb-3 ">
            <label  class="form-label">Full Name</label>
            <input type="text" class="form-control " id="name" name="name" placeholder="Name" value="" minlength="3" required>
            <div class="invalid-feedback">
              Valid Name is required.
            </div>
          </div> 
        </div>
            
        <div class="row ">
          <div class="col-sm-12 mb-3 ">
            <label  class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Address" minlength="4" required></textarea>
            <div class="invalid-feedback">
              Valid address is required.
            </div>
          </div>   
        </div>  
            
        <div class="row ">
          <div class="col-sm-6 mb-3">
          <label  class="form-label">Gender</label>
            <div class="form-check">
              <input id="gender1" name="gender" type="radio" value="M" class="form-check-input" required>
              <label class="form-check-label" >Male</label>
            </div>
            <div class="form-check">
              <input id="gender2" name="gender" type="radio" value="F" class="form-check-input" required>
              <label class="form-check-label">Female</label>
            </div>
          </div>

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="cno" name="cno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Job Role</label>
              <select class="form-select" id="jrole" name="jrole" required>
                <option value="">Choose...</option>
                  <?php getComboValue("job_role") ?>
              </select>
              <div class="invalid-feedback">
                Valid job role is required.
              </div>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Current Image</label>
              <img src="" alt="" id ="image" style="width: 80px; height: 80px;" class="img-thumbnail">
              <input type="hidden" name="imagehdn" id="imagehdn" />
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" oninput="checkEmail();" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
            <label class="form-label">Profile Picture</label>
              <input class="form-control" id="pp" name="pp" type="file" accept="image/png, image/jpeg" onchange="logoValidation('pp')">
              <div class="invalid-feedback">
                File type must be .png or .jpeg
              </div>
            </div>
            </div><hr/>

            <div class="row ">
                <div class="mb-3 form-check">
                <label class="form-check-label" >Do you want to update password? Check to enable password fields </label>
                <input type="checkbox" class="form-check-input " id="activePass" name="activePass" onclick="isActivePass()">
                 </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label"> New Password</label>
              <input type="password" class="form-control" id="pw" name="pw" placeholder="Password" value="" minlength="8" disabled oninput="checkPasswordConfirmation('pw','pwc')" required>
              <div class="invalid-feedback" id="jpwAlert">
                Password should be more than 8 characters.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="pwc" name="pwc" placeholder="Confirm Password" minlength="8" disabled oninput="checkPasswordConfirmation('pw','pwc')" value="" required>
              <div class="invalid-feedback" id="jpwcAlert">
                Password Mismatch
              </div>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-info" name="updatem"  value="Update">
          <button type="button" class="btn btn-default" onclick="$('#updateDataModal').modal('hide');">Close</button>
        </div>
        </form> 
      </div>
    </div>
  </div>

  
  <script>
    var $table = $('#user');

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
        

    function openUpdateModel(v){
        
        var datav=JSON.parse(JSON.stringify(v));
        $("#updateDataModal").modal("show");
        document.getElementById('nic').value = datav['nic'];
        document.getElementById('name').value = datav['name'];
        document.getElementById('address').value = datav['address'];
        if(datav['gender']=="M"){
            document.getElementById('gender1').checked=true;
        }else{
            document.getElementById('gender2').checked=true;
        }
        document.getElementById('cno').value = datav['phone_no'];
        document.getElementById('jrole').value = datav['job_role_id'];
        document.getElementById('email').value = datav['email'];
        document.getElementById('image').src = "";
        if(datav['image'].length>2){
            document.getElementById('image').src = "../Uploads/ProfilePics/"+datav['image'];
            document.getElementById('imagehdn').value=datav['image'];
        }

    }

    function openDeleteModel(id){
        
      $("#deleteDataModal").modal("show");
        document.getElementById('did').value =id;
        document.getElementById('deleteItem').innerHTML =id;
    }

    function viewModel(v){
        var datav=JSON.parse(JSON.stringify(v));
        $("#viewDataModal").modal("show");
        document.getElementById('vnic').innerHTML = datav['nic'];
        document.getElementById('vname').innerHTML = datav['name'];
        document.getElementById('vaddress').innerHTML = datav['address'];
        if(datav['gender']=="M"){
            document.getElementById('vgender').innerHTML="Male";
        }else{
            document.getElementById('vgender').innerHTML="Female";
        }
        document.getElementById('vcno').innerHTML = datav['phone_no'];
        document.getElementById('vemail').innerHTML = datav['email'];
        document.getElementById('vjrole').innerHTML = datav['jobrole'];
        if(datav['jobrole']=="Manager"){
            document.getElementById('vdepdiv').classList.add('visible');
            document.getElementById('vdepdiv').classList.remove('invisible');
            document.getElementById('vdep').innerHTML = datav['department'];
        }
        else{
            document.getElementById('vdepdiv').classList.add('invisible');
            document.getElementById('vdepdiv').classList.remove('visible');
        }
        document.getElementById('vimage').src = "../Uploads/ProfilePics/"+datav['image'];
    }

    function isActivePass(){
        if(document.getElementById('activePass').checked == true){
                document.getElementById("pw").disabled = false;
                document.getElementById("pwc").disabled = false;
        }else{
                document.getElementById("pw").disabled = true;
                document.getElementById("pwc").disabled = true;
        }
    }

    </script> 
   <script src="..\assets\js\form-validations.js"></script>
   <script src="..\assets\js\fileValidation.js"></script>
  </body>
</html>
<?php

if(isset($_POST['updatem'])){
    try{
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $cno = $_POST['cno'];
        $jrole = $_POST['jrole'];
        $email = $_POST['email'];        
      
        $pp ="";
        if(strlen($_POST['imagehdn'])>1){
            $pp=$_POST['imagehdn'];
        }

        if($_FILES['pp']["size"] !==0) {
        $file = $_FILES['pp'];
      
        $fileName = $_FILES['pp']['name'];
        $fileTmpName = $_FILES['pp']['tmp_name'];
        $fileSize = $_FILES['pp']['size'];
        $fileError = $_FILES['pp']['error'];
        $fileType = $_FILES['pp']['type'];
      
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed =array('jpg','jpeg','png');
      
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 5000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../Uploads/ProfilePics/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $pp = $fileNameNew;
                }else{
                    echo "Your file is too big!";
                }
            }else{
                echo " There was an error uploading your file!";
            }
        }
        }
        
        $sql="";
        if(isset($_POST['activePass'])){
            $pass = md5($_POST['pw']);
            $sql = "update staff set name='$name',address='$address',email='$email',phone_no='$cno',gender='$gender',password='$pass',
            image='$pp',job_role_id=$jrole where nic='$nic'";  
            // update user details with password      
        }
        else{
            $sql="update staff set name='$name',address='$address',email='$email',phone_no='$cno',gender='$gender',
            image='$pp',job_role_id=$jrole where nic='$nic'";  
        }
      
        if(mysqli_query($con,$sql)){
            echo "<script>
            $('#updateDoneAlert').fadeIn(10);
            </script>";
          echo "<script>window.location.href='users.php';</script>";
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
    $sql="update staff set isactive=0 where nic='$id'";
    $sql1 ="update job_category set manager_id=NULL where manager_id='$id'";
    mysqli_query($con,$sql1);
    if(mysqli_query($con,$sql)){
      echo "<script>
      $('#deleteDoneAlert').fadeIn(10);
      </script>";
      echo "<script>window.location.href='users.php';</script>";
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
