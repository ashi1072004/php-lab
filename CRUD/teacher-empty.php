<?php
    include('./connection.php');

    $dsql = "SELECT * FROM `teacher` ";
    $drun = mysqli_query($conn, $dsql);
    // $fetch = mysqli_fetch_assoc($drun);
    // echo "<pre>";
    // print_r($fetch);
    // echo "</pre>";
    while($fetch = mysqli_fetch_assoc($drun)){
    unlink('./singleimg/'.$fetch['tpic']);
    }
    $del = "TRUNCATE TABLE `teacher` ";
    $delrun = mysqli_query($conn, $del);
    if($delrun){
        // $msg = "table is empty";
        header('Location: ./teacher-view.php');
    }
    // else{
    //     $msg = "table is not empty";
    // }
?>