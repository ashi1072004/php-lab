<?php
include('../database.php');
$obj = new Database();

$teachid = $obj->escapeString($_POST['teachid']);
$classtime = $obj->escapeString($_POST['classtime']);
$srollno = $obj->escapeString($_POST['srollno']);
$sname = $obj->escapeString($_POST['sname']);
$sfname = $obj->escapeString($_POST['sfname']);
$smobile = $obj->escapeString($_POST['smobile']);
$scnic = $obj->escapeString($_POST['scnic']);
$semail = $obj->escapeString($_POST['semail']);
$spic = $_FILES['spic']['name'];

$exe = strtolower(pathinfo($spic, PATHINFO_EXTENSION));
// echo $exe;
$extn = array('jpg', 'png', 'jpeg');
if (in_array($exe, $extn)) {
    $p = rand(10000, 99999) . "." . $exe;
    $params = ['teachid' => $teachid, 'classtime' => $classtime, 'srollno' => $srollno, 'sname' => $sname, 'sfname' => $sfname, 'smobile' => $smobile, 'scnic' => $scnic, 'semail' => $semail, 'spic' => $p, 'sdate' => date("Y/m/d")];
    $obj->insert('std', $params);
    $res = $obj->getRes();

    if (isset($res[0])) {
        move_uploaded_file($_FILES['spic']['tmp_name'], '../img/' . $p);
        echo json_encode(array("message" => "Data Inserted", "status" => 1));
    } else {
        echo json_encode(array("message" => "Data Not Inserted", "status" => 2));
    }
} else {
    echo json_encode(array("message" => "Invalid Image!", "status" => 3));
}
