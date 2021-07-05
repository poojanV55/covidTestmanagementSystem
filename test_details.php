<?php

include ("connect.php");

 //validating session
//  if($_SESSION['loggedin']!=true)
//  {
//      header('location:logout.php');
//  }else{

//code for assign to 
if(isset($_POST['submit'])){
  $test_id = intval($GET['tid']);
  $ato = $_POST['assignto'];
  $assignto=explode("-",$ato);
  $aname =$assignto[0];
  $pid=$assignto[1];
  $status='Assigned';
  $assigntime=date('d-m-Y h:i:s A',time());
  $query = mysqli_query($link,"UPDATE test_record SET report_status='$status',assign_name='$aname',assignedToEmpId='$pid',AssignTime='$assignTime' where id='$test_id';");
  echo '<script>alert("Assigned to Phlebotomist successfully.")</script>';
  echo "<script>window.location.href='assigned_test.php'</script>";
}

//code for take action
if(isset($_POST['takeaction'])){
  $orderid = intval($_POST['takeaction']);
  $orderd=intval($_GET['oid']);
  $statud = $_POST['status'];
  $remark = $_POST['remark'];
  $rby = $_SESSION['aid'];
  //For delivered Status
  if($status == 'Delivered'):
    $uploadtime=date('d-m-Y h:i:s A',time ());
    //For checking the image type
    $reportfile-$_FILES["report"]["name"];
    //get the image extension
    $allowed_extensions = array(".doc",".pdf",".PDF");
    //Validation for allowed extensions .inarray() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
      echo "<script>alert('Invalid format. Only doc / pdf format allowed');</script>";
    }
    else{
      //rename the image file
      $newreportfile=md5($reportfile).time().$extension;
      //Code for move miage into directory
      move_uploaded_file($_FILES["report"]["tmp_name"],"reportfiles/".$newreportfile);
      $query=mysqli_query($con,"insert into report_tracking(order_number,status,remark,remark_by) values('$orderid','$status','$remark','$rby')");
      $query2=mysqli_query($con,"update test_record set report_status='$status',final_report='$newreportfile',report_upload_time='$uploadtime' where order_number='$orderid'");
      echo '<script>alert("Status updated successfully")</script>';
      echo "<script>window.location.href='all_test.php'</script>";
}
// For other status
else:
  $query=mysqli_query($con,"insert into report_tracking(order_number,status,remark,remark_by) values('$orderid','$status','$remark','$rby')");
  $query2=mysqli_query($con,"update test_record set report_status='$status' where order_number='$orderid'");
  echo '<script>alert("Status updated successfully")</script>';
  echo "<script>window.location.href='all_test.php'</script>";
  endif;  
    }



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
    <title>Covid-19 Test Management System</title>
</head>
<body>



<header>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">    
   
</nav>
</header>

 <!-- Side menu -->

<script src="https://kit.fontawesome.com/cdfa1f424e.js" crossorigin="anonymous"></script>

<!-- The sidebar -->
<?php include "a_sidebar.php";?>
<!-- End of side menu -->
  
  <article style="height: 100%; margin-left:18%;">
  <h1 class="h3 mb-4 text-gray-800">Test Details# <?php echo intval($_GET['oid']);?></h1>
  <div class="row">

<?php

    $test_id = intval($_GET['tid']);
    $query = mysqli_query($link,"SELECT * FROM ctm.test_record tr JOIN ctm.patients p ON tr.patient_mobile_number = p.mobile_number WHERE tr.id='$test_id';");
    while($row = mysqli_fetch_array($query)){
?>





<!-- personal information --->
    <div class="col-lg-6">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4" >
            <div class="card-header py-3" style="background-color:#fbf1cf;">
                      <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Personal Information</h6>
              </div>
        <div class="card-body" style="background-color: #FFFFE8;">
   
          <table class="table table-bordered"  width="100%" cellspacing="0" style="color: #f38c3e;">
              <tr>
              <th>Full Name</th> 
              <td><?php 
              echo $row['full_name'];
              ?></td>
              </tr>

              <tr>
              <th>Mobile Number</th> 
              <td><?php 
               echo $row['mobile_number'];
              ?></td>
              </tr>

              <tr>
              <th>DOB (Date of Birth)</th> 
              <td><?php 
              echo $row['dob'];
              ?></td>
              </tr>


              <tr>
              <th>Govt Issued Id</th> 
              <td><?php 
              echo $row['govt_issued_id'];
              ?></td>
              </tr>


              <tr>
              <th>Govt Issued Id No</th> 
              <td><?php 
              echo $row['govt_issued_id_no'];
              ?></td>
              </tr>


              <tr>
              <th>Full Address</th> 
              <td><?php 
              echo $row['full_address'];
              ?></td>
              </tr>

              <tr>
              <th>State</th> 
              <td><?php 
              echo $row['state'];
              ?></td>
              </tr>

              <tr>
              <th>Profile Reg Date</th> 
              <td><?php 
              echo $row['registration_date'];
              ?></td>
              </tr>
          </table>           
        </div>
    </div>
</div>


<!-- Test information --->
<div class="col-lg-6">

<!-- Basic Card Example -->
<div class="card shadow mb-4" >
    <div class="card-header py-3" style="background-color:#fbf1cf;">
              <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;">Test Information</h6>
      </div>
<div class="card-body" style="background-color: #FFFFE8;">

  <table class="table table-bordered"  width="100%" cellspacing="0" style="color: #f38c3e;">
      <tr>
      <th>Order Number</th> 
      <td><?php 
       echo $row['order_number'];
      ?></td>
      </tr>

      <tr>
      <th>Test Type</th> 
      <td><?php 
      echo $row['mobile_number'];
      ?></td>
      </tr>

      <tr>
      <th>Time Slot</th> 
      <td><?php 
      echo $row['test_time_slot'];
      ?></td>
      </tr>


      <tr>
      <th>Report Status</th> 
      <td><?php if($row['report_status']==''):
        echo "Not Processed yet";
      else:
        echo $row['report_status'];
      endif;
      ?></td>
      </tr>

      <?php if($row['assignedToEmpId']!=''):?>
      <tr>
        <th>Assign To</th>
        <td><?php echo $row['AssignToName'];?>-(<?php echo $row['assignToEmpId'];?>)</td>
      </tr>

      <tr>
      <th>Assigned Date</th>
      <td><?php echo $row['AssignTime'];?></td>
      </tr>
      <?php endif;?>

      <?php if($row['final_report']!=''):?>
      <tr>
        <th>Report</th>
        <td>
        <a href="reportfiles/<?php echo $row['final_report'];?>" target="_blank">Download</a>
        </td>
      </tr>


      <tr>
      <th>Report Delivered Time</th>
      <td><?php echo  $row['report_upload_time'];?></td>
      </tr>
      <?php endif;?>
  </table>           

<?php if($row['assignedToEmpId'] == ''):?>
<div class="form-group">
    <button type = "button" class = "btn btn-info btn-sm" data-toggle="modal" data-target="assignto">Assign To</button>
</div>
<?php
    $rstatus = $row['report_status'];
    if($rstatus == 'Assigned' || $rstatus == 'On the way for sample collection' || $rstatus == 'Sample Collected' || $rstatus == 'Sent to lab'): 
?>
<button type = "button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#takeaction">Take Action</button>
<?php 
    endif;
    endif;
?>
                        </div>
                    </div>
                </div>


<?php } ?>




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

<script type="text/javascript">

  //For report file
  $('#reportfile').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Delivered')
  {
  $('#reportfile').show();
  jQuery("#report").prop('required',true);  
  }
  else{
  $('#reportfile').hide();
  }
})}) 
</script>




</body>
</html>

