<?php

include ("connect.php");

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
<style>
  <?php include "css/sidebar.css";?>
  <?php include "css/style.css";?>
  <?php include "css/sb-admin-2.css";?>
</style>
    <title>Document</title>
</head>
<body>

<script>
  function mobileAvalability(){
    $("#loaderIcon").show();
    jQuery.ajax({
      url:"check_availability.php",
      data:'mobnumber='+$("#mobilenumber").val(),
      type:"POST",
      success:function(data){
        $("mob_num_av_status").html(data);
        $("#loaderIcon").hide();
      },
      error:function(){}
    });
  }
</script>




<!-- topbar -->
<header>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="color: #E2872C; margin-left:18%"> 
<?php
try{
if(isset($_POST['submit']))
{
$full_name = $_POST['fullname'];
$m_num = $_POST['mobilenumber'];
$dob = $_POST['dob'];
$govtid = $_POST['govtissuedid'];
$govtidnum = $_POST['govtidnumber'];
$address = $_POST['address'];
$state = $_POST['state'];
$testtype = $_POST['testtype'];
$timeslot = $_POST['timeslot'];
$orderno = mt_rand(100000000,999999999);
$query="INSERT INTO ctm.patients(full_name,mobile_number,dob,govt_issued_id,govt_issued_id_no,full_address,state) values('$full_name' , '$m_num' , '$dob' , '$govtid' , '$govtidnum' , '$address' , '$state'); INSERT INTO ctm.test_record(patient_mobile_number,test_type,test_time_slot,order_number) values( '$m_num' , '$testtype' , '$timeslot','$orderno');";
// $query.="INSERT INTO ctm.test_record(patient_mobile_number,test_type,test_time_slot,order_number) values( '$m_num' , '$testtype' , '$timeslot','$orderno');";
$result = mysqli_multi_query($link,$query);
if($result){
  //echo 'test successfully';
  echo '<script>alert("Your test request submitted successfully.")</script>';
  echo "<script>window.location.href='new_user.php'</script>";
}
else{
  //echo 'not successful';
  echo '<script>alert("Request not successfull. Please try again")</script>';
  echo "<script>window.location.href='new_user.php'</script>";
}
}}
catch(Exception $e){
  echo $e;
}


?>

</nav>
</header>
<!-- topbar end -->




 <!-- Side menu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<div class="sidebar">
  <a href="#Title"><i class="fas fa-virus" ></i> COVID-19 TMS</a>
  <hr style="width: 85%;">
  <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
  <hr style="width: 85%;">
  <div class="sh_text">COVID TESTING</div>
  <button class="dropdown-btn"><i class="fas fa-cog"></i>Testing
    <i class="fa fa-caret-down" style="float:right;"></i>
  </button>
    <div class="dropdown-container">
      <a href="new_user.php">New User</a>
      <a href="user_registered.php">Already Registered User</a>
    </div>

  <a href="search_test_report.php"><i class="fas fa-file-medical-alt"></i> Test Report</a>
  <a href="signup.php"><i class="fa fa-fw fa-user" style="margin-right:10px;"></i>Admin</a>

</div>
<!-- End of side menu -->
  
  <article>
    <div class="heading_1">
      <h1 style="font-size: 30px; color:#9E5E31;" >Covid 19 Testing</h1>
    </div>
<form name="newtesting" method="post">
  <fieldset class="form_1 shadow p-3 mb-5 bg-body rounded">
    <legend style="color:#ec8b40;">Personal Details</legend>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Full name</label>
    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" pattern="[A-Za-z ]+" title="letters only" required="true">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" onBlur="mobileAvailability()">
    <span id="mob_num_av_status" style="font-size:12px;"></span>

  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob" required="true">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Any Govt issued ID</label>
    <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" placeholder="Pancard / Driving License / Voter id / any other" required="true">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Govt issued ID number</label>
    <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" placeholder="Enter Government Issued ID Number" required="true">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Address</label>
    <textarea class="form-control" id="address" name="address" required="true" placeholder="Enter your full addres here"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Enter your State Here" required="true">
  </div>
  </fieldset>



  <fieldset class="form_2 shadow p-3 mb-5 bg-body rounded">
    <legend style="color:#ec8b40;">Testing Details</legend>
  
  <div class="mb-3">
     <label>Test Type</label>
     <select class="form-control" id="testtype" name="testtype" required="true">
     <option value="">Select</option> 
     <option value="Antigen">Antigen</option>  
     <option value="RT-PCR">RT-PCR</option>
     <option value="CB-NAAT">CB-NAAT</option>    
     </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Time slot for the test</label>
    <input type="datetime-local" class="form-control" id="timeslot" name="timeslot" class="form-control">
  </div>
  <div class="mb-6">
    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="width: 100%; background-color: #E58423; border-color:#E2872C;" >
  </div>
  </fieldset>
  
</form>




  </article>

<footer style="color: #E2872C; margin-left:20%">

</footer>







    <!-- Sidebar javascript -->
    <script><?php include "js/sidebar.js";?></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

