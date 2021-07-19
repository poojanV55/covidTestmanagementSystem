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

<style>
  <?php include "css/sidebar.css";?>
  <?php include "css/style.css";?>
  <?php include "css/sb-admin-2.css";?>

</style>
    <title>Document</title>
</head>
<body>



<header>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">    
   
</nav>
</header>

 <!-- Side menu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<div class="sidebar">
  <a href="#Title"><i class="fas fa-virus"></i> COVID-19 TMS</a>
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
  <a href="signup.php"><i class="fas fa-fw fa-user" style="margin-right:10px;"></i>Admin</a>

</div>
<!-- End of side menu -->
  
  <article style="height: 100%; margin-left:18%; color:#E2872C;">
      <div class="heading_1">
        <h1 style="font-size: 30px; color:#9E5E31;" >Covid 19 Testing | Already registered User</h1>
      </div>
      <form method="post" class="form_1 shadow p-3 mb-5 bg-body rounded">
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" style="color: #b17f4ac9;">Registered Mobile Number</label>
          <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true">
        </div>
        <div class="mb-6">
          <input type="submit" class="btn btn-primary" name="search" id="search" style="width: 100%; background-color: #E58423; border-color:#E2872C;" value="Search" >
        </div>
      </form>

<div class="reg_form" style="margin-top:200px; margin-right:2%;">
<hr>

  <?php

if(isset($_POST['submit'])){
  $mnumber=$_POST['mobilenumber'];
  $testtype=$_POST['testtype'];
  $timeslot=$_POST['timeslot'];
  $orderno= mt_rand(100000000, 999999999);
  $query="insert into ctm.test_record(patient_mobile_number,test_type,test_time_slot,order_number) values('$mnumber','$testtype','$timeslot','$orderno');";
  $result = mysqli_query($link, $query);
  if ($result) {
  echo '<script>alert("Your test request submitted successfully.Your order number is '.$orderno.'")</script>';
    echo "<script>window.location.href='user_registered.php'</script>";
  } 
  else {
      echo "<script>alert('Something went wrong. Please try again.');</script>";  
  echo "<script>window.location.href='user_registered.php'</script>";
  }
  }





    if(isset($_POST['search'])){
      ?>
      <h3 align="center">Information related to Mob no : <?php echo $_POST['mobilenumber'];?></h3>
      <?php
      $mob_number = $_POST['mobilenumber'];
      $sql = mysqli_query($link,"select * from ctm.patients where mobile_number='$mob_number'; ");
      $row = mysqli_num_rows($sql);
      if($row>0){
        while($result=mysqli_fetch_array($sql)){
  ?>



  <form name="newtesting" method="post">
  <div class="row">
                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4" >
                                <div class="card-header py-3" style="background-color: #F5E3A6;">
                                    <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;"><center> Personal Information </center></h6>
                                </div>
                                <div class="card-body" style="background-color: #FFFFE8;">
                        <div class="form-group" style="background-color: #FFFFE8;">
                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"  value="<?php echo $result['full_name']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                             <label>Mobile Number</label>
                                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['mobile_number']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                             <label>DOB (yyyy-mm-dd)</label>
                                            <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['dob']; ?>">
                                        </div>
                                        <div class="form-group">
                                               <label>Any Govt Issued ID</label>
                                            <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" value="<?php echo $result['govt_issued_id']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                              <label>Govt Issued ID Number</label>
                                            <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['govt_issued_id_no']; ?>" readonly="true">
                                        </div>
                          

                               <div class="form-group">
                                              <label>Address</label>
                                            <textarea class="form-control" id="address" name="address" readonly="true"><?php echo $result['full_address']; ?></textarea>
                                        </div>
 <div class="form-group">
                                              <label>State</label>
                                      <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['state']; ?>" readonly="true">
                                        </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                           <div class="card shadow mb-4">
                                <div class="card-header py-3" style="background-color: #F5E3A6;">
                                    <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;"><center> Testing Information </center></h6>
                                </div>
                                <div class="card-body" style="background-color: #FFFFE8;">
                             <div class="form-group" style="background-color: #FFFFE8;">
                                              <label>Test Type</label>
                                              <select class="form-control" id="testtype" name="testtype" required="true">
                                            <option value="">Select</option> 
                                            <option value="Antigen">Antigen</option>  
                                            <option value="RT-PCR">RT-PCR</option>   
                                              </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Time Slot for Test</label>
                                 <input type="datetime-local" class="form-control" id="timeslot" name="timeslot" class="form-control">                                        
                             </div>
                       <div class="form-group">
                                 <input type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block" style="background-color:#E58423; border-color: #E2872C;" name="submit">                           
                             </div>

                                </div>
                            </div>
                       

                        </div>

                    </div>

  <?php
     }
    }else{ ?>

      <h4 align="center" style="color: #E2872C;">No records Found</h4>

      <?php 

    }

  }
  ?>        
</div>

  </article>


  






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

