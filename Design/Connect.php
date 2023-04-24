<?php      
    $host = "dextrocity.cmkg3uhu8vwf.us-east-1.rds.amazonaws.com";  
    $user = "admin";  
    $password = "dextrocity1234";  
    $db_name = "dextrocity";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>