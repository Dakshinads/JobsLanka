<?php
session_start();
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

</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded">
    <h4 class="mt-3">Frequently Asked Questions</h4>
    <hr class="my-4">

    <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               #1 Can I apply for more than one vacancy in a company?
              </button>
            </h4>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
                <strong>Yes</strong> you can apply for any number of vacancies advertised by a company
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              #2 Can I edit my profile on a later date?
              </button>
            </h4>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              <strong> Yes </strong> you can edit your profile at any time by logging in to your account.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              #3 Once I apply for a vacancy can I view the status of my application?
              </button>
            </h4>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              <strong>Yes </strong> you can view the status of your application once you have submitted it. There will be an indication as to what stage your application is currently in.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingfour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
              #4 How do I register to jobslanka?
              </button>
            </h4>
            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              You can register easily by clicking 'Sign Up' on the Home Page
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
              #5 Can I post adverts by my self?
              </button>
            </h4>
            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              <strong>Yes </strong> our system is designed for you to put up the adverts your self. If you are struggling alternatively you can send it to us too
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingsix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
              #6 How do I post an job vacancy?
              </button>
            </h4>
            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              Posting an vacancy in  is quick and easy! Simply click the yellow Post Ad button and follow the instructions. If you are not already logged in, you will need to log in as the first step of posting your ad. Your ad will go live once it has been reviewed (this usually takes less than 4 hours during office hours).
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingseven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
              #7 How do I edit my vacancy?
              </button>
            </h4>
            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              To edit a vacancy, please go to your vacancy's dashboard and click on the "Edit button" option
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingeight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
              #8 Why has my job vacancy been rejected?
              </button>
            </h4>
            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              All of the vacancies are manually reviewed - if your vacancy violates our posting rules it will be rejected. You can read what changes you have to make before the vacancy can be approved in the rejection email.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header" id="headingnine">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
              #9 Why has my job application been rejected?
              </button>
            </h4>
            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine" data-bs-parent="#accordionExample">
              <div class="accordion-body mx-3">
              All of applications are reviewed by employers. They can reject your application, because your application does not match their company
              </div>
            </div>
          </div>
        </div>
            
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>
