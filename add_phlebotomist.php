<?php include "connect.php";?>

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
    
  <script>
  function emp_id_availability(){
    $('#loadeerIcon').show();
    jQuery.ajax({
      url:"check_availability.php",
      data:'employee_id='+$("#emp_id").val(),
      type: 'POST',
      success:function (data){
        $("#emp_id_avalability_status").html(data);
        $("#loaderIcon").hide();
      },
      error: function(){}
    });
  }
  </script>


    <title>Add Phlebotomist</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){
  $emp_id = $_POST['emp_id'];
  $p_full_name = $_POST['p_full_name'];
  $p_mobile_number = $_POST['p_mobile_number'];


  if(empty($emp_id)){
    echo "<script>alert('Please enter employee id.');</script>";  
  }
  if(empty($p_full_name)){
    echo "<script>alert('Please enter fullname.');</script>";  
  }
  if(empty($p_mobile_number)){
    echo "<script>alert('Please enter moobile number.');</script>";  
  }

  if(!(empty($emp_id) && empty($p_full_name) && empty($p_mobile_number))){
    $query = "INSERT INTO ctm.phlebotomist(emp_id,full_name,mobile_num) VALUES('$emp_id','$p_full_name','$p_mobile_number');";
    $result = mysqli_query($link,$query);
    if($result)
    {
      echo "<script>alert('Phlebotomist added succesfully.');</script>";  
    }
    else{
      echo "<script>alert('Something went wrong , please try again !!');</script>";
    }
  }
  }
?>





<!-- topbar -->
<?php include "a_navbar.php";?>
<!-- topbar end -->


 <!-- Side menu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<?php include "a_sidebar.php";?>
<!-- End of side menu -->
  
  <article>
    <div class="heading_1">
      <h1 style="font-size: 30px;">Add Phlebotomist</h1>
    </div>
<form name="add_phlebotomist" method="post">
  <fieldset class="form_1 shadow p-3 mb-5 bg-body rounded">
    <legend>Personal Information</legend>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Employee ID</label>
    <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter employee id.." required="true" onBlur="emp_id_availability()" required>
    <span id="emp_id_avalability_status" style="font-size:12px ;"></span>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="p_full_name" name="p_full_name"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" required="true" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="p_mobile_number" name="p_mobile_number" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" >
  </div>
  <div class="mb-6">
    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="width: 100%; background-color: #E58423; border-color:#E2872C;" >
  </div>
  </fieldset>

</form>


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

