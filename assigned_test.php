<?php
    session_start();
    include "connect.php";

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
    <script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>
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
    
    <title>Assigned Test</title>
</head>
<body>




<!-- topbar -->
<?php include "a_navbar.php";?>
<!-- topbar end -->


 <!-- Side menu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<?php include "a_sidebar.php";?>
<!-- End of side menu -->
  
  <article>
         <!-- Begin Page Content -->
         <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Assigned To Phlebotomist</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background-color: #F5E3A6;">
            <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Assigned test information</h6>
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
$query=mysqli_query($link, "SELECT tr.order_number,p.full_name,p.mobile_number,tr.test_type,tr.test_time_slot,tr.registration_date,tr.id AS test_id FROM test_record tr JOIN patients p ON p.mobile_number = tr.patient_mobile_number WHERE report_status like 'Assigned';");
$count = 1;
while($row=mysqli_fetch_array($query)){
?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $row['order_number']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['mobile_number']; ?></td>
        <td><?php echo $row['test_type']; ?></td>
        <td><?php echo $row['test_time_slot']; ?></td>
        <td><?php echo $row['registration_date']; ?></td>
        <td><a href="test_details.php?tid=<?php echo $row['test_id'];?>&&oid=<?php echo $row['order_number'];?>" class="btn btn-info btn-sm">View Details</a> </td>
        
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

<footer>

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



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>




</body>
</html>

<?php } ?>
