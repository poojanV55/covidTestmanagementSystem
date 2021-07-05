<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom styles for this template-->
   <!-- Load an icon library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css"> 
<style>
  <?php include "css/sidebar.css";?>
</style>
    

    <title>dashboard</title>
</head>


<body id="page_top">


<!-- sidemenu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<div class="sidebar">
  <a href="#Title"><i class="fas fa-virus"></i> COVID-19 TMS</a>
  <hr style="width: 85%;">

  <a href="#Dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
  <hr style="width: 85%;">

  <div class="sh_text">COVID TESTING</div>
  
  <button class="dropdown-btn"><i class="fas fa-cog"></i>Testing
    <i class="fa fa-caret-down" style="float:right;"></i>
  </button>
    <div class="dropdown-container">
      <a href="new_user.php">New User</a>
      <a href="#">Already Registered User</a>
    </div>

  <a href="#Test Report"><i class="fas fa-file-medical-alt"></i>Test Report</a>
  <a href="#admin"><i class="fa fa-fw fa-user"></i>Admin</a>

</div>  

<script src="js/sidebar.js"></script>

</body>
</html>