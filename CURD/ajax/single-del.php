<?php
    include('../connection.php');
    $sid = $_GET['sid'];
    // echo $sid;
    $std = "SELECT * FROM `std` where `sid` = '$sid' ";
    $run = mysqli_query($conn, $std);
    $fetch = mysqli_fetch_assoc($run);
    // echo "<pre>";
    // print_r($fetch);
    // echo "</pre>";
    $pic = $fetch['spic'];
    if(!empty($pic)){
        unlink('../singleimg/'.$pic);
    }
    $del = "DELETE FROM `std` WHERE `sid` = '$sid' ";
    $drun = mysqli_query($conn, $del);
    if($drun){
        echo 1;
    }else{
        echo 2;
    }
?>