<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/signup.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="./js/signup.js"></script> -->
    <style>
        <?php include "css/signup.css"; ?>
    </style>
    <script>
        <?php include "js/signup.js";?>
    </script>




<title>Sign Up</title>
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#"class="active" id= "login-form-link">Login</a>
                            </div>  

                            <div class="col-xs-6">
                                <a href="#"class="register-form-link" id= "register-form-link">Register</a>
                            </div>  
                            
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                

                                
                            <!--login module-->
                                <?php
                                    require("connect.php");
                                    session_start();

                                    if(isset($POST['username']))
                                    {
                                       $username = stripslashes($_REQUEST['username']);
                                       $username = mysqli_real_escape_string($con,$username);
                                       $password = stripslashes($_REQUEST['password']);
                                       $password = mysqli_real_escape_string($conn,$password); 

                                       // Check if user exists or not
                                       $query = "SELECT * FROM 'ctm.admin_details' where a_username='$username' AND a_password = '".md5($password)."'";
                                       $result = mysqli_query($conn,$query);
                                       $rows = mysqli_num_rows($result);
                                       if($rows == 1){
                                           $_SESSION['username'] = $username;
                                           header("Location: dashboard.php");
                                       } else{
                                           echo "<div class='form'>
                                            <h3>Incorrect Username/password.</h3>
                                            <p class = 'link'> Click here to <a href='login.php'>Login</a> again.</p>'
                                           </div>";
                                       }


                                    }else{
                                        ?>
                                    
                                    <form id = "login-form" action="" method="post" role="form" style="display:block;" autocomplete="off" >
                                    <div class="form-group">
                                        <input type="text" name="Username" id = "username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id = "password" tabindex="2" class="form-control" placeholder="Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id = "login-submit" tabindex="3" class="form-control btn btn-login" placeholder="form-control btn btn-login" value="Log In">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="4" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>            
                                </form>
                                
                                <?php } ?>



                                 <?php
                                    if(isset($_REQUEST['username'])){
                                        $username=stripslashes($_REQUEST['username']);
                                        $username = mysqli_real_escape_string($conn,$username);
                                        $email = stripslashes($_REQUEST['email']);
                                        $email = mysqli_real_escape_string($conn,$email);
                                        


                                    }
                                 
                                 
                                 
                                 
                                 
                                 ?>       




                                <form id = "register-form" action="" method="post" role="form" style="display:none;" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" name="username" id = "username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id = "email" tabindex="2" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile_no" id = "mobile_no" tabindex="3" class="form-control" placeholder="Mobile no" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id = "password" tabindex="4" class="form-control" placeholder="Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id = "confirm_password" tabindex="5" class="form-control" placeholder="Confirm password" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id = "register-submit" tabindex="6" class="form-control btn btn-register" placeholder="register-submit" value="Register">
                                            </div>  
                                        </div>
                                    </div>
                                         
                                </form>
                            
                            </div>                        
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
</body>







</html>