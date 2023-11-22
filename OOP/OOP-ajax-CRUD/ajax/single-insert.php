<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
// return json_encode($data);

$teachid = $data['teachid'];
$classtime = $data['classtime'];
$srollno = $data['srollno'];
$sname = $data['sname'];
$sfname = $data['sfname'];
$smobile = $data['smobile'];
$scnic = $data['scnic'];
$semail = $data['semail'];

include('../connection.php');
$spic = $_FILES['spic']['name'];
$sdate = date("Y-m-d");
$exe = pathinfo($spic, PATHINFO_EXTENSION);
// echo $exe;
$extn = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
if (in_array($exe, $extn)) {
    $p = rand(10000, 99999) . "." . $exe;
    $sql = "INSERT INTO `std`(`teachid`, `classtime`, `srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`)VALUES('$teachid', '$classtime', '$srollno', '$sname', '$sfname', '$smobile', '$scnic', '$semail', '$p', '$sdate')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        move_uploaded_file($_FILES['spic']['tmp_name'], '../singleimg/' . $p);
        echo json_encode(array("message" => "Data Inserted", "status" => 1));
    } else {
        echo json_encode(array("message" => "Data Not Inserted", "status" => 2));
    }
} else {
    echo json_encode(array("message" => "Invalid Image!", "status" => 3));
}
