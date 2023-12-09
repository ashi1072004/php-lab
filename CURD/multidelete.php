<?php
    include('./connection.php');
    $sid = $_GET['sid'];
    $multi = "SELECT `spic` FROM `multistd` WHERE `sid` = '$sid' ";
    $run = mysqli_query($conn, $multi);
    $fetch = mysqli_fetch_assoc($run);
    // echo "<pre>";
    // print_r($fetch);
    // echo "</pre>";
    $pics = unserialize($fetch['spic']);
    // echo "<pre>";
    // print_r($pics);
    // echo "</pre>";
    if(!empty($pics)){
        foreach($pics as $p){
            unlink('./multiimg/'.$p);
        }
    }
    // Delete record
    $del = "DELETE FROM `multistd` WHERE `sid` = '$sid' ";
    $drun = mysqli_query($conn, $del);
    // Move back to std table view
    if($drun){
        header('Location: ./multiview.php');
    }
?>