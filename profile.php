<?php 

  include "connect.php";
  session_start();

  if(isset($_POST['update'])){
      $admin_id = $_SESSION['aid'];
      $admin_name = $_POST['admin_name'];
      $mob_num = $_POST['mobile_number'];
      $email = $_POST['email'];

      $query = mysqli_query($link,"UPDATE admin_details SET a_name='$admin_name',a_mobile_num = '$mob_num' , a_email_id='$email' where a_id='$admin_id';");
      if($query){
          echo '<script>alert("Profile has been updated")</script>';
      }
      else{
        echo '<script>alert("Something went wrong. Please try again.")</script>';
    }
}


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
    
  

    <title>Admin Details</title>
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
  

  <article >
    <div class="heading_1">
      <h1 style="font-size: 30px;  
      color: #b17f4ac9;"><center>Admin Profile</h1>
    </div>
<?php
$aid = $_SESSION['aid'];
$res = mysqli_query($link,"SELECT * FROM admin_details WHERE a_id ='$aid'");
$cnt = 1;
while($row = mysqli_fetch_array($res)){
?>

<div >
<form name="admin_profile" method="post" >
  <fieldset class="form_1 shadow p-3 mb-5 bg-body rounded" style="margin-left: 24%;">
    <legend>Personal Information</legend>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Admin Name</label>
    <input type="text" class="form-control" name="admin_name" value="<?php  echo $row['a_name'];?>" required='true'>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email Id</label>
    <input type="email" class="form-control" name="email" value="<?php  echo $row['a_email_id'];?>" required='true'>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" name="mobile_number" value="<?php  echo $row['a_mobile_num'];?>" required='true' maxlength='10'>
  </div>
  <div class="mb-6">
     <input type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #F4903A; border-color: #F4903A;" name="update" id="update" value="Update">                           
  </div>
  </fieldset>
<?php } ?>

</form>
</div>

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

