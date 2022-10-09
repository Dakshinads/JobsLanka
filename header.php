<?php $profile = 0; 

function setprofile($i){
  global $profile;
  $profile = $i;
}

?>

<header class="p-3 mb-1 border-bottom mybgColor shadow " >
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="Images/logo_noBack.png"  width="250" />
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Employers</a></li>
          <!--<li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>-->
        </ul>

<!-- non-login users dropdown -->
<?php if($profile==0){ ?>
    <div class="col-md-3 text-end">
    <button type="button" class="btn btn-outline-primary me-2"><b>Post a Job</b></button>
    <a href="signup.php"><button type="button" class="btn btn-warning me-2">Sign up</button></a>
    <a href="login.php"><button type="button" class="btn btn-primary">Log in</button></a>
    </div>
<?php } ?>

<!-- Employer dropdown -->
<?php if($profile==1){ ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li><a class="dropdown-item" href="#">Jobs</a></li>
            <li><a class="dropdown-item" href="#">Interview</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Log Out</a></li>
          </ul>
        </div>
<?php } ?>
    
<!-- job seeker dropdown -->
<?php if($profile==2){ ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li><a class="dropdown-item" href="#">My Jobs</a></li>
            <li><a class="dropdown-item" href="#">Saved Jobs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Log Out</a></li>
          </ul>
        </div>
<?php } ?>

      </div>
    </div>
  </header>