<?php
require "DBCon.php";

$locationAr = ['All Locations','Gampaha','Matara','Galle','Hambantota','Colombo','Kaluthara','Kandy','Matale','Nuwara Eliya','Kegalle','Ratnapura','Monaragala',
                'Badulla','Polonnaruwa','Anuradapura','Puttalam','Kurunegala','Trincomalee','Ampara','Batticola','Mullativu','Vavuniya','Mannar',
                'Kilinochchi','Jaffna']; 

function getComboValue($name){
    global $con;
    try{
        if(strlen($name)>0){
            $sql = "select id, name from ".$name." where isactive=1";
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

function getComboValueM(){
    global $con;
    try{
            $sql = "select s.nic, s.name from staff as s, job_role as j where s.isactive=1 and j.id=s.job_role_id and j.name='Manager' and s.nic NOT IN( select IFNULL(jc.manager_id,0) from job_category as jc);";
            $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $value = $row['nic'];
                    $namehtml = $row['name'];
                    echo "<option value='$value'>$namehtml</option>";
                }
       
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function  getComboValueWithValue($name,$v){
    global $con;
    try{
        if(strlen($name)>0){
            $sql = "select id, name from ".$name." where isactive=1";
            $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $value = $row['id'];
                    $namehtml = $row['name'];
                    $isSelect = ($v == $value) ? "selected":"";
                    echo "<option value= '$value' $isSelect>$namehtml</option>";
                }
        }else{
            return false;
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function getComboLocation(){
    global $locationAr;
    foreach($locationAr as $v){
        echo "<option value= '$v'>$v</option>";
    }
}

function getSelectedComboLocation($value){
    global $locationAr;
    foreach($locationAr as $v){
        $isSelect = ($v==$value )? "selected":"";
        echo "<option value= '$v' $isSelect>$v</option>";
    }
}
?>