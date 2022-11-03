<?php require "../DBCon.php";
require "../fillCombo.php"; 
session_start();
if(isset($_SESSION['userInfo']) && $_SESSION['userInfo']['job_role_id']==1){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka User Registration</title>
    <link rel="icon" type="image/x-icon" href="../images/logo-no-background.ico">
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\assets\css\jobslanka.css" rel="stylesheet">
    <link href="..\assets\css\dashboard.css" rel="stylesheet">

    <script src="..\assets\js\bootstrap.bundle.min.js"></script>
    <script src="..\assets\js\feather.js"></script>
    <script src="..\assets\js\jquery-3.6.1.min.js"></script>
   

</head>
<body>
  <script>
    function checkEmail(){
      var re = /\S+@\S+\.\S+/;
      mailAddress = document.getElementById("email").value;
      if(re.test(mailAddress)){
        document.getElementById("email").classList.add('is-valid');
        document.getElementById("email").classList.remove('is-invalid');
      }else{
        document.getElementById("email").classList.add('is-invalid');
        document.getElementById("email").classList.remove('is-valid');
      }
    }
  </script>

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
                  <button class="accordion-button py-0 px-0 bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
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
            <a class="nav-link" href="inquiry.php">
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
     
    <h1 class="h2 mt-3">User Registration</h1></br>
    <div class="row">
        <form method="POST" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="row ">
            <div class="col-sm-12 mb-3">
              <label  class="form-label">NIC</label>
              <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC"  minlength="10" maxlength="12" value="" required>
              <div class="invalid-feedback">
                Valid NIC is required.
              </div>
            </div>
        </div>

        <div class="row ">
          <div class="col-sm-12 mb-3 ">
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
              <input id="gender1" name="gender" type="radio" value="M" class="form-check-input" checked required>
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
              <label class="form-label">Profile Picture</label>
              <input class="form-control" id="pp" name="pp" type="file" accept="image/png, image/jpeg" onchange="logoValidation('pp')">
              <div class="invalid-feedback">
                File type must be .png or .jpeg
              </div>
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
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="pw" name="pw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('pw','pwc')" required>
              <div class="invalid-feedback" id="jpwAlert">
                Password should be more than 8 characters.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="pwc" name="pwc" placeholder="Confirm Password" minlength="8" oninput="checkPasswordConfirmation('pw','pwc')" value="" required>
              <div class="invalid-feedback" id="jpwcAlert">
                Password Mismatch
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-6 mb-5">
                <input class=" btn btn-primary btn-md" name="register" type="submit" value="Register">
            </div>
            </div>
        </form>
    </div>
    </main>
  </div>
  </div>


  <script src="..\assets\js\fileValidation.js"></script>
   <script src="..\assets\js\form-validations.js"></script>
</body>
</html>
<?php
}else{
  header("location: index.php");
}

if(isset($_POST['register'])){
  try{
  $nic = $_POST['nic'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $cno = $_POST['cno'];
  $jrole = $_POST['jrole'];
  $email = $_POST['email'];
  $pass = md5($_POST['pw']);

  $pp ="";
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

  $sql = "insert into staff (nic,name,address,email,phone_no,gender,password,image,job_role_id,isactive) values
  ('$nic','$name','$address','$email','$cno','$gender','$pass','$pp',$jrole,1)";

  if(mysqli_query($con,$sql)){
    // mail send to user
    echo "<script>window.location.href='users.php';</script>";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
}
catch(Exception $e){
  echo $e->getMessage();
}
}

?>