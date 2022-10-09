<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Sign up</title>
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container">
    <div class="row">
        <form method="POST" action="" class="needs-validation" novalidate>
        <div class="col-md-8 col-lg-12">
            <h4 class="mt-3">SIGN UP</h4>
            <hr class="my-4">

            <!-- Employer Sign up div--> 
            <div class="row " id="odiv">
            <div class="col-12 mb-3">
              <label  class="form-label">Organization Name</label>
              <input type="text" class="form-control" id="oname" placeholder="Name" value="" required>
              <div class="invalid-feedback">
                Valid organization name is required.
              </div>
            </div>

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

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="ocno" maxlength="10" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Web site</label>
              <input type="url" class="form-control" id="oweb" placeholder="Web site" value="">
              <div class="invalid-feedback">
                Valid web site is required.
              </div>
            </div>

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="opw" placeholder="Password" value="" minlength="8" required>
              <div class="invalid-feedback">
                Valid password no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="opwc" placeholder="Confirm Password" minlength="8" value="" required>
              <div class="invalid-feedback">
                Password Mismatch
              </div>
            </div>

            <div class="col-6 mb-3">
            <label class="form-label">Logo</label>
            <input class="form-control" id="ologo" type="file">
            </div>
            </div>

            <!-- Job Seeker Sign up div--> 
            <div class="row " id="jdiv">
            <div class="col-12 mb-3">
              <label  class="form-label">NIC</label>
              <input type="text" class="form-control" id="jnic" placeholder="Name" value="" required>
              <div class="invalid-feedback">
                Valid organization name is required.
              </div>
            </div>

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

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="ocno" maxlength="10" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Web site</label>
              <input type="url" class="form-control" id="oweb" placeholder="Web site" value="">
              <div class="invalid-feedback">
                Valid web site is required.
              </div>
            </div>

            <div class="col-sm-6 mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="opw" placeholder="Password" value="" minlength="8" required>
              <div class="invalid-feedback">
                Valid password no is required.
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label  class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="opwc" placeholder="Confirm Password" minlength="8" value="" required>
              <div class="invalid-feedback">
                Password Mismatch
              </div>
            </div>

            <div class="col-6 mb-3">
            <label class="form-label">Logo</label>
            <input class="form-control" id="ologo" type="file">
            </div>
            </div>

            <div class="row ">
            <div class="col-6 mb-5">
                <button class=" btn btn-primary btn-lg" type="submit">Register</button>
            </div>
            </div>
        </div>
        </form>
    </div>
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>
