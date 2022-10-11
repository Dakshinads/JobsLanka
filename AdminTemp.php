
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Admin</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\assets\css\jobslanka.css" rel="stylesheet">

    
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  
        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
      </style>

</head>
<body>
<!-- Adding header -->

<main>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar sidebar-sticky" style="width: 250px; height:100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <a href="index.php">
                  <img src="..\Images\logo_noBack.png"
                    style="width: 200px;" class="pb-3 py-3" alt="logo"></a>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              Dashboard
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Users
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              Table
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Feedback
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
              Jobs
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
              Inquiry
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Username</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
    </div>
</main>


<!-- Adding footer -->

<script src="..\assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>
