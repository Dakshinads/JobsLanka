<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Contact Us</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container">
            <h4 class="mt-3">Contact Us</h4>
            <hr class="my-4">
            <p>Have questions or would like to contact us? we'd love to hear from you. </p></br>
            <p><strong>Mailing Address : </strong> info.jobslanka@gmail.com</p>
            <p><strong>Contact No : </strong> 0719025153</p>
            <hr class="my-4">
            <h5 class="mt-3">Inquiry</h5>

            <form method="POST" action="" class="needs-validation" novalidate>
            <div class="col-md-8 col-lg-12">
            
            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name" value="" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email" value="" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Contact No</label>
              <input type="tel" class="form-control" id="cno" placeholder="Contact No" value="" required>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-12 mb-3">
              <label  class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Message"></textarea>
              <div class="invalid-feedback">
                Valid contact no is required.
              </div>
            </div>
            </div>

            <div class="row ">
            <div class="col-6 mb-5">
                <input class=" btn btn-primary " type="submit" value="Submit">
            </div>
            </div>

            </div>
            </form>            
            </main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>
