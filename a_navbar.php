
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height:69px ;">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="margin-left:250px;">
    <i class="fa fa-bars"></i>
</button>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

   
<?php 
    $query = mysqli_query($link,"SELECT * FROM test_record WHERE report_status IS null;");
    $count = mysqli_num_rows($query);

?>
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">+<?php echo $count;?></span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header" style="background-color: #F4903A; border-color:#F4903A">
                Alerts Center
            </h6>

            <?php if($count>0){
                while ($row = mysqli_fetch_array($query)){
            ?>
            <a class="dropdown-item d-flex align-items-center" href="test_details.php?tid=<?php echo $row['id'];?>&&oid=<?php echo $row['order_number'];?>">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?php echo $row['registration_date'];?></div>
                    <span class="font-weight-bold">A new test recieved # <?php echo $row['order_number'];?></span>
                </div>
            </a>
            <?php }}else{   ?>
                <p style="color:red">No record found</p>
            <?php } ?>    
            
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>

   
<?php 
//    fetching admin name
    $ad_id = $_SESSION['aid'];
    $sqlq = "SELECT a_name FROM ctm.admin_details WHERE a_id='$ad_id';";
    $q1 = mysqli_query($link,$sqlq);
    while($res = mysqli_fetch_array($q1)){
?>
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-800 large" style=" text-transform: uppercase; margin-right:20px;"><?php echo $res['a_name']; ?></span>
        <?php } ?>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg" width="50px" height="50px">
        </a>
        

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>
</nav>
<!-- End of Topbar -->