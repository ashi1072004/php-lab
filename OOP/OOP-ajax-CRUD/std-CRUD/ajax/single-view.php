<?php
include('../database.php');
$obj = new Database();

$join = '`teacher` ON std.teachid = teacher.tid  INNER JOIN `classtime` ON std.classtime=classtime.ctid';
$obj->select('std', '*', $join, null, null, null);
$res = $obj->getRes();
// echo '<pre>';
// print_r($res);
// echo '</pre>';

if (!empty($res[0])) {
    echo json_encode($res[0]);
} else {
    echo json_encode(array("message" => "No record found", "status" => false));
}
