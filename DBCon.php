<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "jobslanka";

$con = mysqli_connect($server,$user,$pass,$db);
if($con)
{
	//echo "A successful  connection <hr/>";
}
else{
	echo "Not a Successful connection".mysqli_connect_error($con);
}

?>