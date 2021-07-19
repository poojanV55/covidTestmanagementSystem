<?php include "connect.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom styles for this template-->
   <!-- Load an icon library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
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




<article style="margin-left: 225px;">
         <!-- Begin Page Content -->
         <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-800" style="color: #9E5E31;margin-top: 20px; " align="center">Statewise Test Details</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4 " style="margin-top: 20px;">
        <div class="card-header py-3" style="background-color: #F5E3A6; ">
            <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Statewise Test Details</h6>
        </div>
        <div class="card-body" style="background-color: #FFFFE8;">
            <div class="table-responsive" style="background-color: #FFFFE8;">
            <form name="assignto" method="post">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>Sno.</th>
                        <th>State Name</th>
                        <th>Total Tests</th>
                        
                    </tr>
                </thead>
                  <tfoot>
                        <tr align="center">
                        <th>Sno.</th>
                        <th>State Name</th>
                        <th>Total Tests</th>
                    </tr>
                </tfoot>
                <tbody >
<!-- php of table -->
<?php
$query=mysqli_query($link, "SELECT p.state,count(tr.id) AS total_tests from patients p JOIN test_record tr ON p.mobile_number = tr.patient_mobile_number GROUP BY p.state;");
$count = 1;
while($row=mysqli_fetch_array($query)){
?>
    <tr align="center">
        <td align="center"><?php echo $count; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['total_tests']; ?></td>
    </tr>


<?php
$count++;
}
?>
                </tbody>
            </table>
                 </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
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

</body>
</html>