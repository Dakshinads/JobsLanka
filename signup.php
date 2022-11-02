<?php require "fillCombo.php";
require "DBCon.php";
require "Mail.php";

require("sajax.php");     
sajax_init();
sajax_export("verifyEmail");
sajax_handle_client_request();

session_start();
if(isset($_SESSION['userData'])){
  if($_SESSION['atype']=="Employer"){
    header("location: myProfileE.php");
  }else if($_SESSION['atype']=="JobSeeker"){
    header("location: myProfileJ.php");
  }
}else{
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Sign up</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

    <script>    

    function isEmployer(){
        if(document.getElementById("atype1").checked){
          document.getElementById('jdiv').style.visibility="visible";
          document.getElementById('odiv').style.visibility="hidden";
          document.getElementById('jdiv').style.display="block";
          document.getElementById('odiv').style.display="none";
        }
        else if(document.getElementById("atype2").checked){
          document.getElementById('jdiv').style.visibility="hidden";
          document.getElementById('odiv').style.visibility="visible";
          document.getElementById('jdiv').style.display="none";
          document.getElementById('odiv').style.display="block";
        }
    }

    <?php sajax_show_javascript(); ?>

    sendvc = 0;
    function verifyEmail()
    {      
      var re = /\S+@\S+\.\S+/;
 
      mailAddress="";
      componentIdName="";
      if(document.getElementById("atype1").checked){
          mailAddress = document.getElementById("jemail").value;
      }else{
        mailAddress = document.getElementById("oemail").value;
      }
      
      if(re.test(mailAddress)){
        verifyCode = Math.random().toString().substr(2, 6);
        sendVerifyCode = verifyCode+"_"+mailAddress;
        sendvc = verifyCode;

        x_verifyEmail(sendVerifyCode,verifyEmail_x);
      }
      else{

      if(document.getElementById("atype2").checked){
      $("#response1").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-danger">Email is invalid</div>').hide().appendTo('#response1').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response1").delay(4000).animate({
        height: '-=72px'
       }, 300);

      }else{

        $("#response2").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-danger">Email is invalid</div>').hide().appendTo('#response2').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response2").delay(4000).animate({
        height: '-=72px'
       }, 300);
      }

      }
    }

    function verifyEmail_x(d){

      if(document.getElementById("atype2").checked){
      $("#response1").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-success">Verification Mail send.</div>').hide().appendTo('#response1').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response1").delay(4000).animate({
        height: '-=72px'
       }, 300);

      }else{

        $("#response2").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-success">Verification Mail send.</div>').hide().appendTo('#response2').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response2").delay(4000).animate({
        height: '-=72px'
       }, 300);
      
      }
      console.log(sendvc);
      $("#verifyCodeModal").modal("show");
    }

    function validCode(){
      $("#verifyCodeModal").modal("hide");
      if(sendvc==document.getElementById("vcode").value){
        if(document.getElementById("atype1").checked){
          var btnV= document.getElementById("jvemail");
          btnV.innerHTML="Verified";
          btnV.disabled = true;
        }else{
          var btnV= document.getElementById("ovemail");
          btnV.innerHTML="Verified";
          btnV.disabled = true;
        }
      }else{
          alert("Not verified");
      }
    }

    function checkCodeValidity(v){
        if(sendvc==v){
          document.getElementById("vcode").classList.add('is-valid');
          document.getElementById("vcode").classList.remove('is-invalid');
        }else{
          document.getElementById("vcode").classList.add('is-invalid');
          document.getElementById("vcode").classList.remove('is-valid');
        }
    }

    function isEmailChanged(){
      if(document.getElementById("atype1").checked){
        if(document.getElementById("jvemail").innerHTML=="Verified"){
          document.getElementById("jvemail").innerHTML= "Verify Email";
          document.getElementById("jvemail").disabled = false;
        }
      }else{
        if(document.getElementById("ovemail").innerHTML=="Verified"){
          document.getElementById("ovemail").innerHTML= "Verify Email";
          document.getElementById("ovemail").disabled = false;
        }
      }
    }

    function validate_formj(){
      if(document.getElementById("jvemail").disabled==true){        
        return true;
      }else{
        $("#response2").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-info">Please verify.</div>').hide().appendTo('#response2').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response2").delay(4000).animate({
        height: '-=72px'
       }, 300);
        return false;
      }
    }

    function validate_formo(){
      if(document.getElementById("ovemail").disabled==true){        
        return true;
      }else{
        $("#response1").animate({
        height: '+=72px'
       }, 300);
       $('<div class="alert alert-info">Please verify.</div>').hide().appendTo('#response1').fadeIn(1000);
  
       $(".alert").delay(3000).fadeOut(
        "normal",
           function(){
            $(this).remove();
        });
  
       $("#response1").delay(4000).animate({
        height: '-=72px'
       }, 300);
        return false;
      }
    }


    </script>
</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container">
    <div class="row">
        
        <div class="col-md-8 col-lg-12 ddd">
            <h4 class="mt-3">SIGN UP</h4>
            <hr class="my-4">
            <div class='alert alert-success alert-dismissible collapse' role='alert' id="signupDoneAlert">
            Your account is succssesfully created.  <a href='login.php' class='alert-link'>Log in...</a>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <h5 class="mt-3">Are you a Job Seeker or an Employer?</h5>
            <form method="POST" action="">
            <div class="col-sm-6 mb-3">
            <div class="form-check">
              <input id="atype1" name="atype" type="radio" value="JobSeeker" class="form-check-input" onchange="isEmployer();" checked required>
              <label class="form-check-label font-weight-bold" >Job Seeker</label>
            </div>
            <div class="form-check">
              <input id="atype2" name="atype" type="radio" value="Employer" class="form-check-input" onchange="isEmployer();" required>
              <label class="form-check-label font-weight-bold" >Employer</label>
            </div>
            </div>
            </form>
            <hr class="my-4">

            <form method="POST" action="" onsubmit="return validate_formo();" class="needs-validation" id="frmEmployer" enctype="multipart/form-data" novalidate>
            <!-- Employer Sign up div--> 
            <div id="odiv">
            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Organization Name</label>
              <input type="text" class="form-control" id="oname" name="oname" placeholder="Name" minlength="2" value="" required>
              <div class="invalid-feedback">
                Valid organization name is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="oemail" name="oemail" onchange="isEmailChanged()" placeholder="Email" value="" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label"></label></br></br>
              <button type="button" id="ovemail" name="ovemail" class="btn btn-link" onclick="verifyEmail();">Verify Email</button> 
              <div id="response1"></div>             
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="ocno" name="ocno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Web site</label>
              <input type="url" class="form-control" id="oweb" name="oweb" placeholder="https://" value="">
              <div class="invalid-feedback">
                Enter valid web site.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="opw" name="opw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('opw','opwc')" required>
              <div class="invalid-feedback">
                Password should be more than 8 characters.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="opwc" placeholder="Confirm Password" minlength="8" oninput="checkPasswordConfirmation('opw','opwc')" value="" required>
              <div class="invalid-feedback">
                Password Mismatch
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-6 mb-3">
            <label class="form-label">Logo</label>
            <input class="form-control" id="ologo" type="file" name="ologo" accept="image/png, image/jpeg" onchange="logoValidation('ologo')">
            <div class="invalid-feedback">
              File type must be .png or .jpeg
            </div>
            </div>
            </div>
            <div class="row ">
              <div class="col-6 mb-5">
                  <input class=" btn btn-primary btn-lg" type="submit" name="oregister" value="Register">
              </div>
              </div>
            </div>
            </form>


            <!-- Job Seeker Sign up div--> 
            <form method="POST" action="" onsubmit="return validate_formj();" enctype="multipart/form-data" class="needs-validation" id="frmJobSeeker" novalidate>
            <div id="jdiv">
            <div class="row ">
            <div class="col-sm-12 mb-3">
              <label  class="form-label">NIC</label>
              <input type="text" class="form-control" id="jnic" name="jnic" placeholder="NIC" maxlength="12" minlength="10" value="" required>
              <div class="invalid-feedback">
                Valid NIC is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Full Name</label>
              <input type="text" class="form-control" id="jname" name="jname" placeholder="Full Name" minlength="2" value="" required>
              <div class="invalid-feedback">
                Valid Name is required.
              </div>
            </div>   
            </div>  
            
            <div class="row ">
            <div class="col-sm-4 mb-3">
            <label  class="form-label">Gender</label>
            <div class="form-check">
              <input id="jgender1" name="jgender" type="radio" value="M" class="form-check-input" checked required>
              <label class="form-check-label" >Male</label>
            </div>
            <div class="form-check">
              <input id="jgender2" name="jgender" type="radio" value="F" class="form-check-input" required>
              <label class="form-check-label">Female</label>
            </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="jcno" name="jcno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label  class="form-label">Home Town</label>
              <select class="form-select" id="jtown" name="jtown" required>
                <option value="">Choose...</option>
                <?php getComboLocation(); ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid Home Town.
              </div>
            </div>
            <div class ="col-sm-6 mb-3"></div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="jemail" name="jemail" placeholder="Email" onchange="isEmailChanged()" value="" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label"></label></br></br>
              <button type="button" id="jvemail" name="jvemail" class="btn btn-link" onclick="verifyEmail();">Verify Email</button>            
              <div id="response2"></div>   
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="jpw" name="jpw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('jpw','jpwc')" required>
              <div class="invalid-feedback" id="jpwAlert">
              Password should be more than 8 characters.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="jpwc" placeholder="Confirm Password" minlength="8" oninput="checkPasswordConfirmation('jpw','jpwc')" value="" required>
              <div class="invalid-feedback" id="jpwcAlert">
                Password Mismatch
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-6 mb-3">
            <label class="form-label">CV</label>
            <input class="form-control" id="jcv" name="jcv" type="file" accept=".pdf" onchange="cvValidation('jcv')"  required>
            <div class="invalid-feedback">
              File type must be .pdf
            </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Prefered Job Category</label>
              <select class="form-select" id="jcategory" name="jcategory" required>
                <option value="">Choose...</option>
                <?php getComboValue('job_category'); ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid Job Category.
              </div>
            </div>
            </div>

            <div class="row ">
              <div class="col-6 mb-5">
                  <input class=" btn btn-primary btn-lg" name="jregister"  type="submit" value="Register">
              </div>
              </div>
            </div>
          </form>
            
        </div>
        
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="verifyCodeModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Enter a verification code</h5>
        </div>
        <form method="post" class="" novalidate>
        <div class="modal-body">
            <input type="text" class="form-control" id="vcode"  minlength="6" maxlength="6" value="" oninput="checkCodeValidity(this.value)" required>       
            <div class="invalid-feedback"> 
                Verify code is invalid
              </div>  
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" onclick="validCode();" value="Verify">
          <button type="button" class="btn btn-default" onclick="$('#verifyCodeModal').modal('hide');">Close</button>
        </div>
        </form> 
      </div>
    </div>
  </div>

<script>isEmployer();
</script>
<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\fileValidation.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

<!-- Adding footer -->
<?php include "footer.php"; ?>

</body>
</html>
<?php
}

function verifyEmail($vcode){
    
  $valuesAr=explode("_",$vcode);
    $verifycode=$valuesAr[0];
    $mailAddress=$valuesAr[1];

    $mail = new Mail();
    /*$v=$mail->sendMail($mailAddress, "JobsLanka Email Verification",
    "Hello
    You requested to use this email address to access your JobsLanka account.
    This is your verification code:".$verifycode
    );*/
  $v=1;
    return $v;
}

if(isset($_POST['oregister'])){
  try{

  $organizationName = $_POST['oname'];
  $email = $_POST['oemail'];
  $cno = $_POST['ocno'];

  $website=Null;
  if(!empty($_POST['oweb'])){
    $website=$_POST['oweb'];
  }

  $password = md5($_POST['opw']);

  $logo ="";
  if($_FILES['ologo']["size"] !==0) {
  $file = $_FILES['ologo'];

  $fileName = $_FILES['ologo']['name'];
  $fileTmpName = $_FILES['ologo']['tmp_name'];
  $fileSize = $_FILES['ologo']['size'];
  $fileError = $_FILES['ologo']['error'];
  $fileType = $_FILES['ologo']['type'];

  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed =array('jpg','jpeg','png');

  if(in_array($fileActualExt,$allowed)){
      if($fileError === 0){
          if($fileSize < 5000000){
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = 'Uploads/Logo/'.$fileNameNew;
              move_uploaded_file($fileTmpName,$fileDestination);
              $logo = $fileNameNew;
          }else{
              echo "Your file is too big!";
          }
      }else{
          echo " There was an error uploading your file!";
      }
  }
  }
  $sql = "insert into employer(email,name,phone_no,password,website,logo) Values (
          '$email','$organizationName','$cno','$password','$website','$logo')";
  if(mysqli_query($con,$sql)){
      echo "<script>
      $('#signupDoneAlert').fadeIn(100);
      </script>";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  }
  catch(Exception $e){
    echo $e->getMessage();
  }

}


if(isset($_POST['jregister'])){
  try{
    $nic = $_POST['jnic'];
    $name = $_POST['jname'];
    $gender = $_POST['jgender'];
    $cno = $_POST['jcno'];
    $location = $_POST['jtown'];
    $email = $_POST['jemail'];
    $pw = md5($_POST['jpw']);
    $jobCategory =$_POST['jcategory']; 

    $cv="";
    if($_FILES['jcv']["size"]!==0) {
      //echo "<script>alert()</script>";
    $file = $_FILES['jcv'];
    
    $fileName = $_FILES['jcv']['name'];
    $fileTmpName = $_FILES['jcv']['tmp_name'];
    $fileSize = $_FILES['jcv']['size'];
    $fileError = $_FILES['jcv']['error'];
    $fileType = $_FILES['jcv']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed =array('pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'Uploads/CV/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $cv = $fileNameNew;
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo " There was an error uploading your file!";
        }
    }
    }
    $sql = "insert into job_seeker(nic,name,email,password,gender,cv,phone_no,location,job_category_id) Values (
      '$nic','$name','$email','$pw','$gender','$cv',$cno,'$location',$jobCategory)";
    if(mysqli_query($con,$sql)){
      echo "<script>
      $('#signupDoneAlert').fadeIn(100);
      </script>";
      // move to the profile
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    

  }catch(Exception $e){
    echo $e->getMessage();
  }
}


?>