<?php
    session_start();
    include "connect.php";

    // validating session
    if($_SESSION['loggedin']!=true)
    {
        header('location:logout.php');
    }else{
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
   <link rel="stylesheet" href="css/a_dashboard.css">
   <link rel="stylesheet" href="css/sidebar.css">
   <link rel="stylesheet" href="css/sb-admin-2.min.css"> 
   <link rel="stylesheet" href="css/style.css"> 
    
   <style>
        <?php include "css/sidebar.css";?>
    </style>
    
    <title>a_dashboard</title>
</head>

<body>

<!-- sidemenu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>


<!-- The sidebar -->

<?php include_once "a_sidebar.php";?>
<script><?php include "js/sidebar.js";?></script>

<!-- sidemenu end -->




<!-- topbar -->
<?php include "a_navbar.php";?>
<!-- topbar end -->

<?php 
  $query = mysqli_query($link,"SELECT id FROM ctm.test_record");
  $total_test=mysqli_num_rows($query);
  $query1 = mysqli_query($link,"SELECT id FROM ctm.test_record where report_status = 'Assigned';");
  $total_assigned_test=mysqli_num_rows($query1);
  $query2 = mysqli_query($link,"SELECT id FROM ctm.test_record where report_status = 'On the way for sample collection';");
  $total_on_the_way_test=mysqli_num_rows($query2);
  $query3 = mysqli_query($link,"SELECT id FROM ctm.test_record where report_status = 'Sample Collected';");
  $total_sample_collected=mysqli_num_rows($query3);
  $query4 = mysqli_query($link,"SELECT id FROM ctm.test_record where report_status = 'Sent to Lab';");
  $total_sample_sent_to_lab_test=mysqli_num_rows($query4);
  $query5 = mysqli_query($link,"SELECT id FROM ctm.test_record where report_status = 'Delivered';");
  $total_report_delivered_test=mysqli_num_rows($query5);
  $query6 = mysqli_query($link,"SELECT patient_id FROM ctm.patients;");
  $total_patients=mysqli_num_rows($query6);
  $query7 = mysqli_query($link,"SELECT p_id FROM ctm.phlebotomist;");
  $total_phlebotomists=mysqli_num_rows($query7);
?>










<div class="main_p">
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4" >
    <h1 class="h2 mb-0 text" style="color:#9E5E31; margin-left:43%" >Dashboard</h1>
    
</div>

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<div class="row">
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem; height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-virus fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>TOTAL TEST</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_test"); ?></h3>
            </div>
        </div>  
    </div>    
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem; height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-user fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>TOTAL ASSIGNED</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_assigned_test"); ?></h3>
            </div>
        </div>  
  </div>
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem; height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-motorcycle fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 5px;"><center>ON THE WAY FOR THE SAMPLE COLLECTION</center></h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_on_the_way_test"); ?></h3>
            </div>
        </div>  
  </div>
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem;height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-prescription-bottle fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>SAMPLE COLLECTED</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_sample_collected"); ?></h3>
            </div>
        </div>  
  </div>
  
</div><div class="row">
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem;height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-prescription-bottle fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>SAMPLE SENT TO LAB</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_sample_sent_to_lab_test "); ?></h3>
            </div>
        </div>  
    </div>    
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem;height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-microscope fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>REPORT DELIVERED</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_report_delivered_test"); ?></h3>
            </div>
        </div>  
  </div>
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3" style="max-width: 18rem;height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"><center><i class="fas fa-users fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>TOTAL REGISTERED PATIENTS</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_patients"); ?></h3>
            </div>
        </div>  
  </div>
  <div class="col">
            <!-- Content Row -->

        <div class="card border-warning mb-3 " style="max-width: 18rem;height: 12rem;">
        <div class="card-header" style="background-color: #fffbef;"> <center><i class="fas fa-user-nurse fa-2x text-gray-500"></i></center></div>
        <div class="card-body text-warning">
            <h5 class="card-title" style="font-size:large;margin-top: 11px;"><center>TOTAL REGISTERED PHLEBOTOMIST</h5>
        </div>
        <div class="output" align="center">
              <h3 style="margin-bottom: 10px;"><?php echo ("$total_phlebotomists"); ?></h3>
            </div>
        </div>  
  </div>
  
</div>











    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



</body>
</html>

<?php 
    }
?>