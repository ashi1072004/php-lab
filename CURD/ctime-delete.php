<?php
    include('./connection.php');
    if(isset($_GET['ctid'])){
        $ctid = $_GET['ctid'];
        // $sql = "SELECT * FROM `classtime` where `ctid` = '$ctid' ";
        // $run = mysqli_query($conn, $sql);
        // $fetch = mysqli_fetch_assoc($run);
        // echo "<pre>";
        // print_r($fetch);
        // echo "</pre>";
        
        // Delete record
        $del = "DELETE FROM `classtime` WHERE `ctid` = '$ctid' ";
        $drun = mysqli_query($conn, $del);
        // Move back to classtime table view
        if($drun){
            header('Location: ./ctime-view.php');
        }
    }

?>