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
        body{
            background-color: #FEF0E5;
            
        }
        .bg {
            animation:slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
            bottom:0;
            left:-50%;
            opacity:.5;
            position:fixed;
            right:-50%;
            top:0;
            z-index:-1;
}

            .bg2 {
            animation-direction:alternate-reverse;
            animation-duration:4s;
            }

            .bg3 {
            animation-duration:5s;
            }

            .content {
            border-radius:.25em;
            box-sizing:border-box;
            left:50%;
            padding:10vmin;
            position:fixed;
            text-align:center;
            top:50%;
            transform:translate(-50%, -50%);
            }

            h1 {
            font-family:monospace;
            }

            @keyframes slide {
            0% {
                transform:translateX(-25%);
            }
            100% {
                transform:translateX(25%);
            }
            }
    </style>
    <script>
        <?php include "js/signup.js";?>
   
    </script>




<title>Sign Up</title>
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">

    <div class="container">
        <div class="row" style="width: 100%">
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

                            <form id = "login-form" action="login.php" method="post" role="form" style="display:block;" autocomplete="off" >
                                    <div class="form-group">
                                        <input type="text" name="username" id = "username" tabindex="1" class="form-control" placeholder="Username" value="">
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
                                              
                                </form>





                               

                                
                            
    

                                



                                <form id = "register-form" action="signup_1.php" method="post" role="form" style="display:none;" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" name="a_name" id = "a_name" tabindex="1" class="form-control" placeholder="Full-Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" id = "username" tabindex="2" class="form-control" placeholder="Username" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id = "email" tabindex="3" class="form-control" placeholder="Email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile_no" id = "mobile_no" tabindex="4" class="form-control" placeholder="Mobile no" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id = "password" tabindex="5" class="form-control" placeholder="Password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id = "confirm_password" tabindex="6" class="form-control" placeholder="Confirm password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" form = "register-form" name="register-submit" id = "register-submit" tabindex="7" class="form-control btn btn-register" placeholder="register-submit" value="Register">
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


</div>




</html>