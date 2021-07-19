<?php

include ("connect.php");
session_start();
 //validating session
//  if($_SESSION['loggedin']!=true)
//  {
//      header('location:logout.php');
//  }else{

//code for assign to 
if(isset($_POST['submit'])){
  $test_id = intval($_GET['tid']);
  $ato = $_POST['assignto'];
  $assignto=explode("-",$ato);
  $aname =$assignto[0];
  $pid=$assignto[1];
  $status='Assigned';
  $assigntime=date('d-m-Y h:i:s A',time());
  $query = mysqli_query($link,"UPDATE test_record SET report_status='$status',AssignToName='$aname',assignedToEmpId='$pid',AssignTime='$assigntime' where id='$test_id';");
  echo '<script>alert("Assigned to Phlebotomist successfully.")</script>';
  echo "<script>window.location.href='assigned_test.php'</script>";
}

//code for take action
if(isset($_POST['takeaction'])){
  $orderid=intval($_GET['oid']);
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $aid = $_SESSION['aid'];
  //For delivered Status
  if($status == 'Delivered'):
    $uploadtime=date('d-m-Y h:i:s A',time ());
    //For checking the image type
    $reportfile=$_FILES["report"]["name"];
    //get the image extension
    $extension = substr($reportfile,strlen($reportfile)-4,strlen($reportfile));
    //allowed extension for the file 
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
      $query=mysqli_query($link,"INSERT INTO report_tracking(order_number,status,remark,remark_by) values('$orderid','$status','$remark','$aid')");
      $query2=mysqli_query($link,"UPDATE test_record SET report_status='$status',final_report='$newreportfile',report_upload_time='$uploadtime' where order_number='$orderid'");
      echo '<script>alert("Status updated successfully")</script>';
      // echo "<script>window.location.href='all_test.php'</script>";
}
// For other status
else:
  $query=mysqli_query($link,"INSERT INTO report_tracking(order_number,status,remark,remark_by) VALUES('$orderid','$status','$remark','$aid')");
  $query2=mysqli_query($link,"UPDATE test_record SET report_status='$status' WHERE order_number='$orderid'");
  echo '<script>alert("Status updated successfully")</script>';
  // echo "<script>window.location.href='all_test.php'</script>";
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
  <h1 class="h3 mb-4 text-gray-800 " style="margin-top: 10px; color: #9E5E31;">Test Details #<?php echo intval($_GET['oid']);?></h1>
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
                      <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;" align="center">Personal Information</h6>
              </div>
        <div class="card-body" style="background-color: #FFFFE8;">
   
          <table class="table table-bordered"  width="100%" cellspacing="0" style="color:#785D49;">
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
              <h6 class="m-0 font-weight-bold text" style="color: #b17f4ac9;" align="center">Test Information</h6>
      </div>
<div class="card-body" style="background-color: #FFFFE8;">

  <table class="table table-bordered"  width="100%" cellspacing="0" style="color: #785D49;">
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
        <td><?php echo $row['AssignToName'];?>-(<?php echo $row['assignedToEmpId'];?>)</td>
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
    <button type = "button" class = "btn btn-info btn-sm" data-toggle="modal" data-target="#assignto" style="background-color: #f99023; border-color: #de8b36;">Assign To</button>
</div>
<?php else:
    $rstatus = $row['report_status'];
    if($rstatus == 'Assigned' || $rstatus == 'On the way for sample collection' || $rstatus == 'Sample Collected' || $rstatus == 'Sent to Lab'): 
?>
<button type = "button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#takeaction" style="background-color: #f99023; border-color: #de8b36;">Take Action</button>
<?php 
    endif;
    endif;
?>
                        </div>
                    </div>
                </div>
            </div>

<?php } ?>



<!-- test tracking history -->

<?php 
$order_id = intval($_GET['oid']);
$ret = mysqli_query($link , "SELECT * FROM report_tracking rt JOIN admin_details a on a.a_id = rt.remark_by WHERE rt.order_number = '$order_id';");
$num = mysqli_num_rows($ret);
?>
<div class="row">
<div class="col-lg-12">

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#fbf1cf;">
        <h6 class="m-0 font-weight-bold text" align="center" style="color: #b17f4ac9;">Test Tracking History</h6>
    </div>
    <div class="card-body" style="background-color: #FFFFE8;">
<?php if($num>0){
?>
<table class="table table-bordered"  width="100%" cellspacing="0" style="color: #785D49;">
<tr align="center">
<th>Remark</th>
<th>Status</th>
<th>Remark Date</th>
<th>Remark By</th>

<?php 
$cnt = 1;
while($result=mysqli_fetch_array($ret)){?>
</tr>
<tr>
<td align="center"><?php echo $cnt;?></td> 
<td><?php echo $result['status'];?></td>
<td align="center"><?php echo $result['post_time'];?></td>
<td align="center"><?php echo $result['a_name'];?></td>
</tr>

<?php 
$cnt++;
} // End while loop
?>

</table>
<?php
//end if   
} else { ?>    
<h4 align="center" style="color:red"> No Tracking history found </h4>
<?php } ?>           


</div>
</div>

</div>
</div>



</div>


</article>


<!-- take action modal -->
<div id= "takeaction" class= "modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 align="left">Take Action </h4>
        <button type="button" class="close" data-dismiss="modal">&times; </button>
    </div>
    <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      <p>  <select class="form-control" name="status" id="status" required="true">
            <option value="">Select Action</option>
  <?php 
  $query1=mysqli_query($link,"SELECT report_status from ctm.test_record where order_number='$order_id';");
  while($result=mysqli_fetch_array($query1)):
  $reportstatus=$result['report_status'];
  endwhile;
  ?>

            <?php if($reportstatus=='Assigned'):?>
            <option value="On the way for sample collection">On the Way for Collection</option>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='On the way for sample collection'):?>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='Sample Collected'):?>
             <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
             <?php elseif($reportstatus=='Sent to Lab'):?>
             <option value="Delivered">Delivered</option>
         <?php endif;?>

            </select></p>
       <p id='reportfile'> Report <span style="color:red; font-size:12px;">(Doc and PDF formate allowed)</span>    <input type="file" name="report" id="report"></p>
       <p>
<textarea name="remark" class="form-control" required="true" placeholder="Remark (Max 500 Characters)" maxlength="500" rows="5"></textarea>  </p> 
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="takeaction" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
      </form>

    </div>
  </div>
</div>
<!-- end of take action -->

<!-- Assign Modal -->
<div id= "assignto" class= "modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 align="left">Assign To </h4>
        <button type="button" class="close" data-dismiss="modal">&times; </button>
    </div>
    <div class="modal-body">
      <form method="post">
        <p><select class = "form-control" name="assignto" required="true">
          <option value="">Select Phlebotomist</option>
          <?php $sql=mysqli_query($link,"SELECT full_name,emp_id from phlebotomist;");
          while ($result=mysqli_fetch_array($sql)){?>
          
          
          <!-- left from here -->
          <option value="<?php echo $result['full_name']."-".$result['emp_id'];?>"><?php echo $result['full_name'];?>-(<?php echo $result['emp_id'];?>)</option>
        <?php } ?>
        </select></p>
      <p><input type= "submit" class = "btn btn-primary btn-user btn-block" name="submit" id="submit">  </p>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- end of assign modal -->
  








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
