<?php require "../DBCon.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Job category</title>

    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\assets\css\jobslanka.css" rel="stylesheet">
    <link href="..\assets\css\dashboard.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table.min.css" rel="stylesheet">
    <link href="..\assets\css\bootstrap-table-sticky-header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script src="..\assets\js\bootstrap.bundle.min.js"></script>
    <script src="..\assets\js\feather.js"></script>
    <script src="..\assets\js\jquery-3.6.1.min.js"></script>
    <script src="..\assets\js\bootstrap-table.min.js"></script>
    <script src="..\assets\js\bootstrap-table-sticky-header.js"></script>

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a href="..\index.php" class="d-flex align-items-center mb-3 mb-md-0 pv-3 px-3 me-md-auto link-dark text-decoration-none">
                  <img src="..\Images\logo_noBack.png"
                    style="width: 200px;"  class="pb-3 py-3" alt="logo">
        </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">     
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              Users
            </a>
          </li>

          <li class="nav-item">
          <div class="accordion"id="ac1" >
            <div class="">
                  <button class="accordion-button py-0 px-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                      <a class="nav-link active" href="#">
                        <span data-feather="database" class="align-text-bottom"></span>
                        Table
                      </a>
                  </button>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#ac1">
                  <div class=" py-0 px-3">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" href="jobCategory.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Category
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Job Type
                          </a>
                        </li>                                                
                      </ul>
                  </div>
              </div>
            </div>
          </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Jobs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="mail" class="align-text-bottom"></span>
              Inquiry
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Feedback
            </a>
          </li>
          <hr/>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="user" class="align-text-bottom"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="log-out" class="align-text-bottom"></span>
              Log out
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     
    <h1 class="h2 mt-3">Job category</h1></br>
    <div class="row">
        <div class="table-responsive" >
            <table class="table table-striped table-sm " data-show-columns="true" data-height="300" id="jCat">
              <thead >
                <tr>
                  <th scope="col" class="col-1 ">ID</th>
                  <th scope="col" class="col-3 ">Name</th>
                  <th scope="col" class="col-3 ">Description</th>
                  <th scope="col" class="col-2 ">Manager Name</th>
                  <th scope="col" class="col-3 "></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sql= "select * from job_category";
                $result = mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['manager_id']; ?></td>
                  <td><input type="button" value="Update" class="btn btn-secondary btn-sm"/></td>
                </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
    </div>
    <hr>
    <h5 class="mb-3">Add Job Category</h5>
    <div class="row">
    <form method="POST" action="" class="needs-validation" novalidate>
    <div class="col-12 mb-3">
              <label  class="form-label">Job Category Name</label>
              <input type="text" class="form-control" id="name" placeholder="Category Name" value="" required>
              <div class="invalid-feedback">
                Valid job category name is required.
              </div>
    </div>

    <div class="col-12 mb-3">
              <label  class="form-label">Job Category Description</label>
              <input type="text" class="form-control" id="description" placeholder="Category Description" value="" required>
              <div class="invalid-feedback">
                Valid job category description is required.
              </div>
    </div>

    <div class="row ">
        <div class="col-12 mb-3">
            <input class=" btn btn-primary btn-md" type="submit" value="Add">
        </div>
    </div>

    </form>    
    </div>        
    </main>
  </div>
  </div>

  <script>
        var $table = $('#jCat');

            function buildTable($el) {
            var classes = $('.toolbar input:checked').next().text()

            $el.bootstrapTable('destroy').bootstrapTable({
                showFullscreen: true,
                search: true,
                stickyHeader: true
            })
            };

            $(function() {
                buildTable($table)
            })
    </script> 

  </body>
</html>
