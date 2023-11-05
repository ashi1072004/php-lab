<?php
    include('../connection.php');
    
    $teachid = mysqli_real_escape_string($conn, $_POST['teachid']);
    $classtime = mysqli_real_escape_string($conn, $_POST['classtime']);
    $srollno = mysqli_real_escape_string($conn, $_POST['srollno']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $sfname = mysqli_real_escape_string($conn, $_POST['sfname']);
    $smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
    $scnic = mysqli_real_escape_string($conn, $_POST['scnic']);
    $semail = mysqli_real_escape_string($conn, $_POST['semail']);
    $spic = $_FILES['spic']['name'];
    $sdate = date("Y-m-d");
    // echo '<pre>';
    // print_r($spic);
    // echo '</pre>';
    $exe = pathinfo($spic, PATHINFO_EXTENSION);
    // echo $exe;
    $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
    if(in_array($exe, $extn)){
        $p = rand(10000,99999).".".$exe;
        $sql = "INSERT INTO `std`(`teachid`, `classtime`, `srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`)VALUES('$teachid', '$classtime', '$srollno', '$sname', '$sfname', '$smobile', '$scnic', '$semail', '$p', '$sdate')";
        $run = mysqli_query($conn,$sql);
        if($run){
            move_uploaded_file($_FILES['spic']['tmp_name'], '../singleimg/'.$p);
            echo 1;
        }
        else{
            echo 2;
        }
    }
    // elseif(!isset($spic)){
    //   $show = 'Please Choose your Pic';
    // }
    else{
        echo 3;
    }        
?>