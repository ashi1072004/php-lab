<?php
    $conn = mysqli_connect("localhost", "root", "", "project2");
    // echo var_dump($conn);
    if($conn){
        // echo "connected";
    }
    else{
        echo "not connected";
    }
?>