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


<?php $search_info = $_POST['searchinfo'];?>

<!-- End of side menu -->
  


  <article>
         <!-- Begin Page Content -->
         <div class="container-fluid">

<!-- Page Heading -->
<h1 style="font-size: 30px;">Search Result of <?php echo $search_info;?></h1>


<!-- DataTales Example -->
<div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background-color: #F5E3A6;">
            <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Report Results</h6>
        </div>
        <div class="card-body" style="background-color: #FFFFE8;">
            <div class="table-responsive" style="background-color: #FFFFE8;">
            <form name="assignto" method="post">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Order No.</th>
                        <th>Patient Name</th>
                        <th>Mobile No.</th>
                        <th>Test Type</th>
                        <th>Time Slot</th>
                        <th>Reg. Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  <tfoot>
                        <tr>
                        <th>Sno.</th>
                        <th>Order No.</th>
                        <th>Patient Name</th>
                        <th>Mobile No.</th>
                        <th>Test Type</th>
                        <th>Time Slot</th>
                        <th>Reg. Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
<!-- php of table -->
<?php
  $query = mysqli_query($link,"SELECT tr.order_number,p.full_name,p.mobile_number,tr.test_type,tr.test_time_slot,tr.registration_date,tr.id AS test_id FROM test_record tr JOIN patients p ON p.mobile_number = tr.patient_mobile_number WHERE (p.full_name like '%$search_info%' || p.mobile_number like '%$search_info%' || tr.order_number like '%$search_info%')");
  
  $count = 1 ;

  while($row = mysqli_fetch_array($query)){
    ?>
    <tr>
      <td><?php echo $count;   ?></td>
      <td><?php echo $row['order_number'];   ?></td>
      <td><?php echo $row['full_name'];   ?></td>
      <td><?php echo $row['mobile_number'];   ?></td>
      <td><?php echo $row['test_type'];   ?></td>
      <td><?php echo $row['test_time_slot'];   ?></td>
      <td><?php echo $row['registration_date'];   ?></td>
      <td>
        <a href="report_details.php?tid=<?php echo $row['test_id'];?>&&oid=<?php echo $row['tr.order_number'];?>" class="btn btn-info btn-sm" style="background-color: #F4903A; border-color:#F5E3A6;"   target="blank">View Details</a>
      
      
      </td>
    </tr>
<?php
  $count++;}
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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

