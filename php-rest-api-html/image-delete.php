<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include("config.php");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];


$del = "SELECT * FROM `tbl_image` where `id` = '$id' ";
$run = mysqli_query($conn, $del);
$fetch = mysqli_fetch_assoc($run);
$pic = $fetch['name'];
if (!empty($pic)) {
    unlink('./upload/' . $pic);
}
$sql = "DELETE FROM `tbl_image` WHERE `id` = '{$id}'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Data deleted", "status" => true));
} else {
    echo json_encode(array("message" => "Data not deleted", "status" => false));
}
