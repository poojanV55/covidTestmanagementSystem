<?php

session_start();


//CHECK IF THE USER IS ALREADY LOGGED IN
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
//     header("location:dashboard.php");
//     exit;
// }

require_once "connect.php";

$username = $password = "";
$username_err = $password_err="";

// if($_SERVER["REQUEST_METHOD"] == "POST"){

    //check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username";
        echo '<script>alert ("Please Enter username"); window.location.href="signup.php"</script>';
    }
    else{
        $username = trim($_POST["username"]);
    }

    //check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password";
        echo '<script>alert ("Please Enter your password"); window.location.href="signup.php"</script>';
    }else{
        $password = trim($_POST["password"]);
    }


    if(empty($username_err) && empty($password_err))
    {
        $sql = "SELECT a.a_id,a.a_username,a.a_password FROM ctm.admin_details a WHERE a.a_username = ?";
        if($stmt = mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password,$hashed_password)){

                            $_SESSION['loggedin'] = true;
                            $_SESSION['aid'] = $id;
                            $_SESSION['username'] = $username;
                            
                            header('location:a_dashboard.php');
                        }else{
                            $login_err = "Invalid Username or password.";
                            echo '<script>window.location.href="signup.php";alert ("Invalid Username or Password"); </script>';


                        }

                    }
                }else{
                    $login_err = "Invalid Username or password";
                    echo '<script>window.location.href="signup.php";alert ("Invalid Username or Password"); </script>';

                }


        }else{
            echo '<script>alert("Something went wrong");</script>';
        }

        mysqli_stmt_close($stmt);
    }


mysqli_close($link);

}

// }





?>