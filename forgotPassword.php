<?php include "DBCon.php";
require "Mail.php";

require("sajax.php");     
sajax_init();
sajax_export("verifyEmail");
sajax_handle_client_request();
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

</head>
<body >
<!-- Adding header -->
<?php include "header.php";?>

<section class="h-100 gradient-form" style="background-color:  #dfe3e5;" >
  <div class="container py-3 ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-8">
        <div class="card rounded-4 text-black">
          <div class="row g-0">
            <div class="col-lg-12">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                   <a href="index.php">
                  <img src="Images\logo_noBack.png"
                    style="width: 280px;" class="pb-5 py-3" alt="logo"></a>
                  <h4 class="mt-1 mb-3 pb-1 ">Forgot Your Password</h4>
                  <p>Enter your email below, and we'll email your verification code to reset your password.</p></br>
                </div>

                <form action="" method="POST" class="needs-validation" novalidate >
                  <p>Are you a Job Seeker or an Employer?</p>
                  <div class="col-sm-12 mb-3">
                  <div class='alert alert-danger alert-dismissible collapse' role='alert' id="loginErrorAlert">
                    Email or Password incorrect
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                  </div>
                  <div class="col-sm-12 mb-3">
                  <div class="form-check">
                    <input id="atype1" name="atype" type="radio" value="JobSeeker" class="form-check-input"  checked required>
                    <label class="form-check-label font-weight-bold" >Job Seeker</label>
                  </div>
                  <div class="form-check">
                    <input id="atype2" name="atype" type="radio" value="Employer" class="form-check-input"  required>
                    <label class="form-check-label font-weight-bold" >Employer</label>
                  </div>
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" >Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required/> 
                    <div id="response1">
                      
                    </div>                   
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-1">
                  <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" onclick="verifyEmail()" type="button" name="reset">Reset Password</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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


<!-- Adding footer -->
<?php include "footer.php" ?>
<script>
<?php sajax_show_javascript(); ?>

sendvc = 0;
function verifyEmail()
{      
    var re = /\S+@\S+\.\S+/;

    mailAddress="";
    componentIdName="";
    mailAddress = document.getElementById("email").value;
      
      
      if(re.test(mailAddress)){
        if(document.getElementById("atype1").checked==true){
            var accountType=document.getElementById("atype1").value;
        }else{
            var accountType=document.getElementById("atype2").value;
        }
       

        verifyCode = Math.random().toString().substr(2, 6);
        sendVerifyCode = verifyCode+"_"+mailAddress+"_"+accountType;
        sendvc = verifyCode;

        x_verifyEmail(sendVerifyCode,verifyEmail_x);
      }
      else{

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

      
    }
}

function verifyEmail_x(d){
    if(d){
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

        console.log(sendvc);
        $("#verifyCodeModal").modal("show");
    }else{
        $("#response1").animate({
        height: '+=72px'
        }, 300);
        $('<div class="alert alert-warning">This email has not an account..</div>').hide().appendTo('#response1').fadeIn(1000);

        $(".alert").delay(3000).fadeOut(
        "normal",
            function(){
            $(this).remove();
        });

        $("#response1").delay(4000).animate({
        height: '-=72px'
        }, 300);
    }
}

function validCode(){
      $("#verifyCodeModal").modal("hide");
      if(sendvc==document.getElementById("vcode").value){
        
        createCookie("emailOfUser", document.getElementById("email").value, "1");
        
        if(document.getElementById("atype1").checked==true){
            var accountType=document.getElementById("atype1").value;
        }else{
            var accountType=document.getElementById("atype2").value;
        }
        createCookie("accountTypeOfUser", accountType, "1");
        window.location.href="forgetPasswordEntry.php";

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

    function createCookie(name, value, days) {
        var expires;
        
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
        
        document.cookie = escape(name) + "=" + 
            escape(value) + expires + "; path=/";
    }
</script>

<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>
<script src="assets\js\form-validations.js"></script>
<script src="assets\js\fileValidation.js"></script>
</body>
</html>
<?php 

function verifyEmail($vcode){
    
    $valuesAr=explode("_",$vcode);
      $verifycode=$valuesAr[0];
      $mailAddress=$valuesAr[1];
      $accountType=$valuesAr[2];

      global $con;
      if($accountType=="JobSeeker"){
        $sql="select * from job_seeker where email='$mailAddress'";
      }else{
        $sql="select * from employer where email='$mailAddress'";
      }
      $rs=mysqli_query($con,$sql);
      if(mysqli_num_rows($rs)>0){
        $mail = new Mail();
        /*$v=$mail->sendMail($mailAddress, "JobsLanka Email Verification for forget password",
        "Hello
        You requested forgot your password.
        This is your verification code:".$verifycode
        );*/
        return true;
      }else{
        return false;
      }
     
  }

  
  ?>