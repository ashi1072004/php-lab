<?php
include('../database.php');
$obj = new Database();
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    $obj->select('std', '*', null, "`sid`='$sid'", null, null);
} else {
    $join = '`teacher` ON std.teachid = teacher.tid  INNER JOIN `classtime` ON std.classtime=classtime.ctid';
    $obj->select('std', '*', $join, null, null, 5);
}

$res = $obj->getRes();
// echo '<pre>';
// print_r($res);
// echo '</pre>';

if (!empty($res[0])) {
    echo json_encode($res);
} else {
    echo json_encode(array("message" => "No record found", "status" => false));
}
