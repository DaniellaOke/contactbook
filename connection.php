<?php
    $hostname = "localhost";
    $dbUser = "root";
    $dbpass = "";
    $dbName = "contactbook";

    $conn = mysqli_connect(
        $hostname,
        $dbUser, 
        $dbpass,
        $dbName
        
    );

    if($conn){
        echo "yes";
    }else{
        echo "no";
    }

?>
