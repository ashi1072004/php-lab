<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$sid = $data['sid'];

include('../connection.php');
// echo $sid;
$std = "SELECT * FROM `std` where `sid` = '$sid' ";
$run = mysqli_query($conn, $std);
$fetch = mysqli_fetch_assoc($run);
// echo "<pre>";
// print_r($fetch);
// echo "</pre>";
$pic = $fetch['spic'];
if (!empty($pic)) {
    unlink('../singleimg/' . $pic);
}
$del = "DELETE FROM `std` WHERE `sid` = '$sid' ";
$drun = mysqli_query($conn, $del);
if ($drun) {
    echo json_encode(array("message" => "Data deleted", "status" => true));
} else {
    echo json_encode(array("message" => "Data not deleted", "status" => false));
}
