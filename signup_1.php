<?php 
                                
                                include "connect.php"; // connects the connection page to the db

                                
                                
                                $a_name = $username = $email = $password = $mobile_no = $confirm_password ="";
                                $a_name_err = $username_err = $email_err = $password_err = $mobile_no_err = $confirm_password_err = "";
                                
                                // if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    

                                    //check name
                                    if(empty(trim($_POST["a_name"]))){
                                        $a_name_err = "Please enter the name";
                                    }else{
                                        $a_name = trim($_POST["a_name"]);
                                    }                                    


                                   //check username
                                    if(empty(trim($_POST['username']))){
                                        $username_err = "Please enter the username";
                                    }elseif(!preg_match('/^[a-zA-Z0-9_]+$/',trim($_POST['username']))){
                                        $username_err = "Username can only conntain letters,numbers and underscores.";
                                    }else{
                                        $sql = "SELECT a.a_id from ctm.admin_details a WHERE a.a_username = ?";

                                        if($stmt = mysqli_prepare($link,$sql)){
                                            mysqli_stmt_bind_param($stmt,"s",$param_username);
                                            $param_username = trim($_POST['username']);
                                            if(mysqli_stmt_execute($stmt)){
                                                mysqli_stmt_store_result($stmt);

                                                if(mysqli_stmt_num_rows($stmt) == 1)
                                                {
                                                    $username_err = "This username is already taken.";
                                                }else{
                                                    $username = trim($_POST["username"]);
                                                }

                                            }else{
                                                echo "<script>alert('Something Went wrong,Please try again later.');</script>";
                                            }
                                            mysqli_stmt_close($stmt);
                                        }
                                    }

                                    //check password
                                    if(empty(trim($_POST["password"]))){
                                        $password_err = "Please enter the password";
                                    }elseif(strlen(trim($_POST["password"]))<6){
                                        $password_err = "Password must have atleast 6 characters.";
                                    }else{
                                        $password = trim($_POST["password"]);
                                    }


                                    //validate password
                                    if(empty(trim($_POST["confirm_password"]))){
                                        $confirm_password_err = "Please confirm password.";     
                                    } else{
                                        $confirm_password = trim($_POST["confirm_password"]);
                                        if(empty($password_err) && ($password != $confirm_password)){
                                            $confirm_password_err = "Password did not match.";
                                        }
                                    }

                                    //check email_id
                                    if(empty(trim($_POST["email"]))){
                                        $email_err = "Please enter the email id";
                                    }elseif(!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',trim($_POST['email']))){
                                        $email_err = "Please enter valid email id.";
                                    }
                                    else{
                                        $email = trim($_POST["email"]);
                                    }


                                    //check mobile number
                                    if(empty(trim($_POST["mobile_no"]))){
                                        $mobile_no_err = "Please enter the password";
                                    }elseif(strlen(trim($_POST["mobile_no"]))!=10){
                                        $mobile_no_err = "Please enter the correct mobile number";
                                    }else{
                                        $mobile_no = trim($_POST["mobile_no"]);
                                    }



                                    //Inserting all the values into the table
                                    if(empty($a_name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($mobile_no_err) ){
                                        $sql = "INSERT INTO ctm.admin_details(a_name,a_username,a_email_id,a_mobile_num,a_password) VALUES (?,?,?,?,?); ";
                                        if($stmt = mysqli_prepare($link,$sql)){
                                            mysqli_stmt_bind_param($stmt,"sssss",$param_name,$param_username,$param_email,$param_mobile_num,$param_password);
                                            $param_name = $a_name;
                                            $param_username = $username;
                                            $param_email    = $email;
                                            $param_mobile_num = $mobile_no;
                                            $param_password = password_hash($password,PASSWORD_DEFAULT);
                                        }

                                        //executing the statement
                                        if(mysqli_stmt_execute($stmt))
                                        {
                                            echo"<script>alert('Signed in succesfully');</script>";
                                            header("location:signup.php"); 
                                        }else{
                                            echo '<script>window.location.href="signup.php";alert ("Something went wrong, Please try again..."); </script>';
                                        }

                                        mysqli_stmt_close($stmt);

                                    }

                                // }
                                
                                
                                
                                ?>