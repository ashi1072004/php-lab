<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$sid = $data['sid'];
$teachid = $data['teachid'];
$classtime = $data['classtime'];
$srollno = $data['srollno'];
$sname = $data['sname'];
$sfname = $data['sfname'];
$smobile = $data['smobile'];
$scnic = $data['scnic'];
$semail = $data['semail'];

include('../connection.php');

$std = "SELECT * FROM `std` WHERE `sid` = '$sid' ";
$updtrun = mysqli_query($conn, $std);
$fetch = mysqli_fetch_assoc($updtrun);

$spic = $_FILES['spic']['name'];
$sdate = date("Y-m-d");
// echo '<pre>';
// print_r($spic);
// echo '</pre>';
if (!empty($spic)) {
    // if new pic inserted
    $exe = pathinfo($spic, PATHINFO_EXTENSION);
    // echo $exe;
    $extn = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
    if (in_array($exe, $extn)) {
        // Delete old pic
        unlink("../singleimg/" . $fetch['spic']);
        $p = rand(10000, 99999) . "." . $exe;
        // Update record
        $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `spic`='$p', `sdate`='$sdate' WHERE `sid`='$sid' ";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            // Upload new pic
            move_uploaded_file($_FILES['spic']['tmp_name'], '../singleimg/' . $p);
            echo json_encode(array("message" => "Data updated with new student pic", "status" => 1));
        } else {
            echo json_encode(array("message" => "Data not updated", "status" => 2));
        }
    } else {
        echo json_encode(array("message" => "Invalid image!", "status" => 3));
    }
} else {
    // if new pic not inserted
    // $p = $fetch['spic'];
    $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `sdate`='$sdate' WHERE `sid`='$sid' ";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo json_encode(array("message" => "Data updated with old student pic", "status" => 4));
    } else {
        echo json_encode(array("message" => "Data not updated", "status" => 2));
    }
}
