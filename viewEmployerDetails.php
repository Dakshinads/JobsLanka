<?php
session_start();
require "DBCon.php";

if(isset($_GET['id'])){
    try{
        $employerId= $_GET['id'];
        $sql="select name,website,logo from employer where id=$employerId ";
        $result = mysqli_query($con,$sql);
        $dataRow= mysqli_fetch_assoc($result);        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Lanka Employer Details</title>
    <link rel="icon" type="image/x-icon" href="images/logo-no-background.ico">
    
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\jobslanka.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
    tr:hover {
        background-color: #11bbee;
      }
    </style>
</head>
<body>
<script src="assets\js\bootstrap.bundle.min.js"></script>
<script src="assets\js\jquery-3.6.1.min.js"></script>

<!-- Adding header -->
<?php include "header.php" ?>

<main class="container shadow p-3 my-3 bg-white rounded" >
<div class="row">
        <div class="col-sm-12 text-center">
        <h2 class="mb-3"><?php echo $dataRow['name'] ?></h2>
        <h5 id="companyName" class="text-muted"><a href="<?php echo $dataRow['website'] ?>" target="_blank" ><?php echo $dataRow['website'] ?>  </a></h5>
        <img src='Uploads/Logo/<?php echo $dataRow["logo"] ?>' id="employerLogo" width="200px" height="200px" class='img-thumbnail'><hr/>
        </div>
</div>

<div class="row">
        <div class="col-sm-12">
        <h4 class="mb-3">Open Vacancies</h4>
        <div class="table-responsive my-4" >
        <table class="table table-striped table-sm " data-show-columns="true" data-height="350" id="jobs" data-unique-id="id">
            <thead >
            <tr>
                <th scope="col" class="col-6 " data-field="id">Job Title</th>
                <th scope="col" class="col-2 ">Opening Date</th>
                <th scope="col" class="col-2 ">Closing Date</th>
                <th scope="col" class="col-2 "></th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $sql= "SELECT job_ref_no,title,opening_date,closing_date FROM job where employer_id=$employerId and active = 1";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
            
            <tr>
                <td ><?php echo $row['title']; ?></td>
                <td><?php echo $row['opening_date']; ?></td>
                <td ><?php echo $row['closing_date']; ?></td>

                <td class='text-center '>
                    <button class=' btn btn-info btn-sm text-dark' onclick='window.location.href="viewJob.php?id=<?php echo $row["job_ref_no"] ?>"' >View Details</button>
                </td>
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </div>
        </div>
</div>

</main>

<!-- Adding footer -->
<?php include "footer.php" ?>


</body>
</html>
