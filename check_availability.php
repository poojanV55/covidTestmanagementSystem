<?php

require_once ("connect.php");

//To check if the mobile number is avaiilable or not 
if(!empty($_POST["mobnumber"])){
    $mnumber = $POST["mobnumber"];

    $result = mysqli_query($link,"select p.patient_id from ctm.patients p where p.mobile_number='$mnumber'");
    $count = mysqli_num_rows($result);

    if($count > 0)
    {
        echo "<span style='color:red'>Mobile number already exists.Please try another number.</script>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
	
        echo "<span style='color:green'> Mobile available for Registration .</span>";
     echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

//To check if the employee id of phlebotomist is avaiilable or not 
if(!empty($_POST["employee_id"])){
    $employee_id = $_POST["employee_id"];

    $result = mysqli_query($link,"SELECT p.emp_id from ctm.phlebotomist p where p.emp_id='$employee_id';");
    $count = mysqli_num_rows($result);

    if($count > 0)
    {
        echo "<span style='color:red'>Employee id already exists.Please try another id number.</script>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<span style='color:green'> Employee id  available for Registration .</span>";
     echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}





?>