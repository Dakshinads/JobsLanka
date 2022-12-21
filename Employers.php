<?php
require "DBCon.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Employer</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">

    <style>
    .imgd:hover {
        background-color: #11bbee;
      }
    </style>
</head>
<body>
<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded">
    <h4 class="mt-3">Employers</h4>
    <hr class="my-4">
    <div class="row">
        <?php 
            $sql = "SELECT id,name,logo FROM employer;";
            $rs=mysqli_query($con,$sql);

            while($row=mysqli_fetch_assoc($rs)){
                $logo = $row['logo'];
                $eid = $row['id'] ;
                echo "<div class='col-2'><img src='Uploads/Logo/$logo' onclick='window.location.href=\"viewEmployerDetails.php?id=$eid \"' class='img-thumbnail imgd' style='width:80%; height: 80%'  /></div> ";
            }
        ?>
    </div>
             
</main>

<!-- Adding footer -->
<?php include "footer.php" ?>

<script src="assets\js\form-validations.js"></script>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>


</body>
</html>
