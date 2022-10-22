<?php
require "DBCon.php";

function getComboValue($name){
    global $con;
    try{
        if(strlen($name)>0){
            $sql = "select id, name from ".$name;
            $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $value = $row['id'];
                    $namehtml = $row['name'];
                    echo "<option value='$value'>$namehtml</option>";
                }
        }else{
            return false;
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}

?>