<?php
    include('./connection.php');

    $dsql = "SELECT * FROM `multistd` ";
    $drun = mysqli_query($conn, $dsql);
    // $fetch = mysqli_fetch_assoc($drun);
    // echo "<pre>";
    // print_r($fetch);
    // echo "</pre>";
    while($fetch = mysqli_fetch_assoc($drun)){
        $pics = unserialize($fetch['spic']);
        foreach($pics as $p){
            unlink('./multiimg/'.$p);
        }
    }
    $del = "TRUNCATE TABLE `multistd` ";
    $delrun = mysqli_query($conn, $del);
    if($delrun){
        header('Location: ./multiview.php');
    }
?>