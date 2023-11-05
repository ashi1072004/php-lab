<?php
    include('../connection.php');
    echo $sid = $_GET['sid'];
    // $std = "SELECT * FROM `std` where `sid` = '$sid' ";
    // $run = mysqli_query($conn, $std);
    // $fetch = mysqli_fetch_assoc($run);
    // // echo "<pre>";
    // // print_r($fetch);
    // // echo "</pre>";
    // $pic = $fetch['spic'];
    // if(!empty($pic)){
    //     unlink('../singleimg/'.$pic);
    // }
    // // Delete record
    // $del = "DELETE FROM `std` WHERE `sid` = '$sid' ";
    // $drun = mysqli_query($conn, $del);
    // // Move back to std table view
    // if($drun){
    //     // header('Location: ./single-insert-view.php');
    //     echo 1;
    // }else{
    //     echo 2;
    // }
?>