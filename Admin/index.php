<?php include "../DBCon.php";
session_start();
if(isset($_SESSION['userInfo'])){
  /* job role id 
      1=Admin
      2=Manager */
  if($_SESSION['userInfo']['job_role_id']==1){
    header('location:myprofileA.php');
  }else if($_SESSION['userInfo']['job_role_id']==2){
    header('location:myprofileM.php');
  }
  
}else{

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Admin Login </title>
    <link rel="icon" type="image/x-icon" href="../images/logo-no-background.ico">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/signin.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="" method="POST" class="needs-validation" novalidate>
    <a href="../index.php"><img class="mb-4" src="../Images/logo_noBack.png" alt="" width="300" ></a>
    <h1 class="h3 mb-3 fw-normal">LOGIN</h1>
    <div class='alert alert-danger alert-dismissible collapse' role='alert' id="loginErrorAlert">
        Email or Password incorrect
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter a email" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="pw" name="pw" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <input type="submit" class="w-100 btn btn-lg btn-primary" name="login" value="Login"/>
  </form>
</main>
<script src="..\assets\js\form-validations.js"></script>
<script src="..\assets\js\bootstrap.bundle.min.js"></script>
<script src="..\assets\js\jquery-3.6.1.min.js"></script>
</body>
</html>
<?php } 

if(isset($_POST['login'])){
  try{

    $email = $_POST['email'];
    $pw = md5($_POST['pw']);

    $sql="select * from staff where email='$email' and password='$pw' and isactive=1";
    
    if($result = mysqli_query($con,$sql)){
      if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['userInfo'] = $row;
        if($_SESSION['userInfo']['job_role_id']==1){
          header('location:adminDash.php');
        }
        else if($_SESSION['userInfo']['job_role_id']==2){
          $userNIC = $_SESSION['userInfo']['nic'];
          $queryForGetDepartment = "select jc.name,jc.id from job_category as jc, staff as s where s.nic=jc.manager_id and s.nic='$userNIC'";
          $result = mysqli_query($con,$queryForGetDepartment);
          $row=mysqli_fetch_assoc($result);
          $_SESSION['userDepartmentName'] = $row['name'];
          $_SESSION['userDepartmentID'] = $row['id'];
          header('location:managerDash.php');
        }

      }else{
        echo "<script>
        $('#loginErrorAlert').fadeIn(10);
        </script>";
      }
    } 
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}

?>