<?php session_start();

include "connect.php";

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
    
    <title>Manage Phlebotomist</title>
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
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-active-800" style="margin-left:40% ; color:#9E5E31;";>Manage Phlebotomist</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4 " style="margin-top: 20px;">
        <div class="card-header py-3" style="background-color: #F5E3A6;">
            <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Phlebotomist Information</h6>
        </div>
        <div class="card-body" style="background-color: #FFFFE8;">
            <div class="table-responsive" style="background-color: #FFFFE8;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Reg. Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sno.</th>
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Mobile No.</th>
                             <th>Reg. Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $query = mysqli_query($link,"SELECT * FROM ctm.phlebotomist ;");
                        $count = 1;
                        while($row=mysqli_fetch_array($query)){
                        ?>

                        <tr>
                            <td><?php echo $count;?></td>
                            <td><?php echo $row['emp_id'];?></td>
                            <td><?php echo $row['full_name'];?></td>
                            <td><?php echo $row['mobile_num'];?></td>
                            <td><?php echo $row['registration_date'];?></td>
                            <td><a href="manage_phlebotomist.php?pid=<?php echo $row['p_id'];?>&&action=delete" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true" style="color:red" title="Delete this record"></i></a></td>
                        </tr>
                    <?php
                    $count++; }    
                    ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


  </article>

<footer>
<div style="color:#FEF0E5">
<?php

//Code to delete record
 $act = $_GET['action'];
if($act == 'delete'){
    $p_id = intval($_GET['pid']);
    $query =mysqli_query($link,"DELETE FROM ctm.phlebotomist WHERE p_id='$p_id';");
    echo '<script>alert(Record deleted)</script>';
    echo "<script>window.location.href='manage_phlebotomist.php'</script>";
}

?></div>
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