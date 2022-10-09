<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Login</title>
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body >
<!-- Adding header -->
<?php include "header.php"; setprofile(2); ?>

<section class="h-100 gradient-form" style="background-color:  #dfe3e5;" >
  <div class="container py-3 ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-10">
        <div class="card rounded-4 text-black">
          <div class="row g-0">
            <div class="col-lg-7">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                   <a href="index.php">
                  <img src="Images\logo_noBack.png"
                    style="width: 280px;" class="pb-5 py-3" alt="logo"></a>
                  <h4 class="mt-1 mb-5 pb-1 ">Welcome to Jobs Lanka</h4>
                </div>

                <form>
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control"
                      placeholder="Email address" />                    
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="pw">Password</label>
                    <input type="password" id="pw" class="form-control" />
                  </div>

                  <div class="text-center pt-2 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                    <a class="text-muted" href="#!"> Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-1">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="signup.php"><button type="button" class="btn btn-outline-primary">Create new</button></a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 text-center">The Home of Your Dream Job</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>