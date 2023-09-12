<?php
    include('./connection.php');
    $tid = $_GET['tid'];
    $sql = "SELECT * FROM `teacher` where `tid` = '$tid' ";
    $run = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($run);
    // echo "<pre>";
    // print_r($fetch);
    // echo "</pre>";
    $pic = $fetch['tpic'];
    if(!empty($pic)){
        unlink('./singleimg/'.$pic);
    }
    // Delete record
    $del = "DELETE FROM `teacher` WHERE `tid` = '$tid' ";
    $drun = mysqli_query($conn, $del);
    // Move back to teacher table view
    if($drun){
        header('Location: ./teacher-view.php');
    }
?>