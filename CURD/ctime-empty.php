<?php
    include('./connection.php');
    
    $del = "TRUNCATE TABLE `classtime` ";
    $delrun = mysqli_query($conn, $del);
    if($delrun){
        header('Location: ./ctime-view.php');
    }
?>