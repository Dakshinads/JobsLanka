<?php
require "DBCon.php";
require "fillCombo.php";
session_start();
if(isset($_SESSION['userData']) && $_SESSION['atype']=="JobSeeker"){
  $email=$_SESSION['userData']['email'];
  $sql="select * from job_seeker where email='$email'";
  $result = mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka My Profile</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>

<script>
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

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container" >
<div class="row">
  <div class="col-md-8 col-lg-12 ">
  <h4 class="mt-3">My Profile</h4>
  <hr class="my-4">
  <div class='alert alert-success alert-dismissible collapse' role='alert' id="updateAlert">
    Your account is succssesfully updated.  
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>

  <form method="POST" action="" onsubmit="" class="needs-validation" id="frmJobSeeker" enctype="multipart/form-data" novalidate>

    <div class="row ">
    <div class="col-sm-6 mb-3">
        <div class="col-sm-12 mb-3">
            <label  class="form-label">NIC</label>
            <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" maxlength="12" minlength="10" value="<?php echo $row['nic'] ?>" readonly>
            <div class="invalid-feedback">
            Valid NIC is required.
            </div>
        </div>
        <div class="col-sm-12 mb-3">
              <label  class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" minlength="2" value="<?php echo $row['name'] ?>" required>
              <div class="invalid-feedback">
                Valid Name is required.
              </div>
        </div>
        <div class="row">
        <div class="col-sm-6 mb-3">
            <label  class="form-label">Gender</label>
            <div class="form-check">
              <input id="gender1" name="gender" type="radio" value="M" class="form-check-input" <?php echo ($row['gender']=='M')?'checked':'' ?> required>
              <label class="form-check-label" >Male</label>
            </div>
            <div class="form-check">
              <input id="gender2" name="gender" type="radio" value="F" class="form-check-input" <?php echo ($row['gender']=='F')?'checked':'' ?> required>
              <label class="form-check-label">Female</label>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="cno" name="cno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="<?php echo $row['phone_no'] ?>" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-6 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?php echo $row['email'] ?>" readonly>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
        </div>
        <div class="col-sm-6 mb-3">
              <label  class="form-label">Home Town</label>
              <select class="form-select" id="town" name="town" required>
                <option value="">Choose...</option>
                <?php  getSelectedComboLocation($row['location'])?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid Home Town.
              </div>
        </div>
        </div>
        <div class="row">
        <div class="col-6 mb-3">
            <label class="form-label">CV</label>
            <input class="form-control" id="cv" name="cv" type="file" accept=".pdf" onchange="cvValidation('cv')"  >
            <div class="invalid-feedback">
              File type must be .pdf
            </div>
        </div>
        <div class="col-sm-6 mb-3">
              <label  class="form-label">Prefered Job Category</label>
              <select class="form-select" id="category" name="category" required>
                <option value="">Choose...</option>
                <?php getComboValueWithValue('job_category',$row['job_category_id']); ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid Job Category.
              </div>
        </div>
        </div>
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
    
    <div class="col-sm-6 mb-3">
    <label  class="form-label">Current CV</label><br/>    
    <iframe src="Uploads/CV/<?php echo $row['cv'] ?>" id ="image" style="width:90%; height: 90%"></iframe>>
    </div>
    </div>

    <div class="row ">
      <div class="col-6 mb-5">
        <input type="hidden" name="cvhdn" value="<?php echo $row['cv'] ?>"/>
          <input class=" btn btn-primary btn-md" type="submit" name="save" value="Save Changes">
      </div>
    </div>
  </form>
  </div>
  
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
</body>
</html>
<?php
}
else{
  header('location:login.php');
}

if(isset($_POST['save'])){
  try{

    $nic=$_POST['nic'];
    $name = $_POST['name'];
    $cno = $_POST['cno'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $town= $_POST['town'];
    $pjcategory = $_POST['category'];

    $pp ="";
    if(strlen($_POST['cvhdn'])>1){
        $pp=$_POST['cvhdn'];
    }

    if($_FILES['cv']["size"] !==0) {
    $file = $_FILES['cv'];

    $fileName = $_FILES['cv']['name'];
    $fileTmpName = $_FILES['cv']['tmp_name'];
    $fileSize = $_FILES['cv']['size'];
    $fileError = $_FILES['cv']['error'];
    $fileType = $_FILES['cv']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed =array('pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'Uploads/CV/'.$fileNameNew;
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
        $sql = "update job_seeker set name='$name',phone_no='$cno',gender='$gender',cv='$pp',location='$town',job_category_id=$pjcategory, password='$pass' where email='$email'";      
    }
    else{
        $sql = "update job_seeker set name='$name',phone_no='$cno',gender='$gender',cv='$pp',location='$town',job_category_id=$pjcategory where email='$email'";      
    }
      if(mysqli_query($con,$sql)){
          echo "<script>
          $('#updateAlert').fadeIn(10);
          </script>";
         echo "<script>
          window.location.href='myProfileJ.php';</script>";
      }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }
    catch(Exception $e){
      echo $e->getMessage();
    }
}
?>