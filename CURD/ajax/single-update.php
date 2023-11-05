<?php
    include('../connection.php');

    $sid = mysqli_real_escape_string($conn, $_POST['sid']);
    $std = "SELECT * FROM `std` WHERE `sid` = '$sid' ";
    $updtrun = mysqli_query($conn, $std);
    $fetch = mysqli_fetch_assoc($updtrun);

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
    if(!empty($spic)){
        // if new pic inserted
        $exe = pathinfo($spic, PATHINFO_EXTENSION);
        // echo $exe;
        $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
        if(in_array($exe, $extn)){
            // Delete old pic
            unlink("../singleimg/".$fetch['spic']);
            $p = rand(10000,99999).".".$exe;
            // Update record
            $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `spic`='$p', `sdate`='$sdate' WHERE `sid`='$sid' ";
            $run = mysqli_query($conn,$sql);
            if($run){
                // Upload new pic
                move_uploaded_file($_FILES['spic']['tmp_name'], '../singleimg/'.$p);
                echo 1;
            }
            else{
                echo 2;
            }
        }
        else{
            echo 3;
        }
    }
    else{
        // if new pic not inserted
        // $p = $fetch['spic'];
        $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `sdate`='$sdate' WHERE `sid`='$sid' ";
        $run = mysqli_query($conn,$sql);
        if($run){
            echo 4;
        }
        else{
            echo 2;
        }
    }
?>