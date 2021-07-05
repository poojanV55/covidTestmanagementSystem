<?php
    

    // define('DB_SERVER', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'ctm');
 
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect("localhost","root","","ctm");
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }



?>

