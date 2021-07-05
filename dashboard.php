<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom styles for this template-->
   <!-- Load an icon library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css"> 

    <style>
      body{
        background-color: #FEF0E5;
      }
    </style>

    <title>dashboard</title>
</head>


<body >



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



<header>
<!-- <div class = "topbar_menu"> -->
<!-- Topbar Navbar -->
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">    
    
</nav>
<!-- End of Topbar -->
<!-- </div>s -->
</header>




<div class="main_p">    
    <h1>Statewise Testing Dashboard </h1>
     
            <table>
            <tr>
                <th>S No.</th>
                <th>State Name</th>
                <th>Total Test done</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gujarat</td>
                <td>5</td>
            </tr> 
            <tr>
                <td>2</td>
                <td>Maharashtra</td>
                <td>10</td>
            </tr>
            
            </table>
</div>




    <!-- Sidebar javascript -->
    <script><?php include "js/sidebar.js";?></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>