<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Sign up</title>
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

            <h5 class="mt-3">Are you a Job Seeker or an Employer?</h5>
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
            <hr class="my-4">

            <form method="POST" action="" class="needs-validation" id="frmEmployer" novalidate>
            <!-- Employer Sign up div--> 
            <div id="odiv">
            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Organization Name</label>
              <input type="text" class="form-control" id="oname" placeholder="Name" minlength="2" value="" required>
              <div class="invalid-feedback">
                Valid organization name is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="oemail" placeholder="Email" value="" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label"></label></br></br>
              <a href=""id="ovemail" >Verify Email</a>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="ocno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Web site</label>
              <input type="url" class="form-control" id="oweb" placeholder="Web site" value="">
              <div class="invalid-feedback">
                Enter valid web site.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="opw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('opw','opwc')" required>
              <div class="invalid-feedback">
                Valid password no is required.
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
            <input class="form-control" id="ologo" type="file">
            </div>
            </div>
            <div class="row ">
              <div class="col-6 mb-5">
                  <input class=" btn btn-primary btn-lg" type="submit" value="Register">
              </div>
              </div>
            </div>
            </form>


            <!-- Job Seeker Sign up div--> 
            <form method="POST" action="" class="needs-validation" id="frmJobSeeker" novalidate>
            <div id="jdiv">
            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">NIC</label>
              <input type="text" class="form-control" id="jnic" placeholder="NIC" maxlength="12" minlength="10" value="" required>
              <div class="invalid-feedback">
                Valid NIC is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Full Name</label>
              <input type="text" class="form-control" id="jname" placeholder="Full Name" minlength="2" value="" required>
              <div class="invalid-feedback">
                Valid Name is required.
              </div>
            </div>   
            </div>  
            
            <div class="row ">
            <div class="col-sm-4 mb-3">
            <label  class="form-label">Gender</label>
            <div class="form-check">
              <input id="jgender" name="jgender" type="radio" value="male" class="form-check-input" checked required>
              <label class="form-check-label" >Male</label>
            </div>
            <div class="form-check">
              <input id="jgender" name="jgender" type="radio" value="female" class="form-check-input" required>
              <label class="form-check-label">Female</label>
            </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="jcno" maxlength="10" minlength="10" pattern="^\d{10}$" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>

            <div class="col-sm-4 mb-3">
              <label  class="form-label">Home Town</label>
              <select class="form-select" id="jtown" required>
                <option value="">Choose...</option>
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
              <input type="email" class="form-control" id="jemail" placeholder="Email" value="" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label"></label></br></br>
              <a href=""id="jvemail" >Verify Email</a>
            </div>
            </div>

            <div class="row ">
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="jpw" placeholder="Password" value="" minlength="8" oninput="checkPasswordConfirmation('jpw','jpwc')" required>
              <div class="invalid-feedback" id="jpwAlert">
                Valid password is required.
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
            <input class="form-control" id="jcv" type="file" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Prefered Job Category</label>
              <select class="form-select" id="jcategory" required>
                <option value="">Choose...</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid Job Category.
              </div>
            </div>
            </div>

            <div class="row ">
              <div class="col-6 mb-5">
                  <input class=" btn btn-primary btn-lg" type="submit" value="Register">
              </div>
              </div>
            </div>
          </form>
            
        </div>
        
    </div>
</main>
<script>isEmployer();</script>
<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\form-validations.js"></script>

</body>
</html>
