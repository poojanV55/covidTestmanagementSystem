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
  <a href="signup.php"><i class="fa fa-fw fa-user" style="margin-right:10px;"></i>Admin</a>

</div>
<!-- End of side menu -->
  
  <article style="height: 100%;">
    <div class="heading_1">
      <h1 style="font-size: 30px; color:#9E5E31;" >Search Report</h1>
    </div>
<form action="test_report.php" method="post" class="form_1 shadow p-3 mb-5 bg-body rounded">
  
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label" style="color:#b17f4ac9;">Search By Patient Name or Mobile Number or Order Number</label>
    <input type="text" class="form-control" id="searchinfo" name="searchinfo" required="true" placeholder="Enter name or mobile number or Order Number">
  </div>
  <div class="mb-6">
    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="width: 100%; background-color: #E58423; border-color:#E2872C;" >
  </div>
  
  
</form>


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

