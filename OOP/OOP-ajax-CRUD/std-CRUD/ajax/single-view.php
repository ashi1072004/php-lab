<?php
include('../database.php');
$obj = new Database();
// View Teacher
if (isset($_GET['tload'])) {
    if (isset($_GET['tid'])) {
        $tid = $_GET['tid'];
        $obj->select('teacher', '*', null, "`tid`='$tid'", null, null);
    } else {
        $obj->select('teacher', '*', null, null, null, 5);
    }

    $res = $obj->getRes();
    if (!empty($res[0])) {
        echo json_encode($res[0]);
    } else {
        echo json_encode(array("message" => "No record found", "status" => false));
    }
}
// View Student
if (isset($_GET['sload'])) {
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
        echo json_encode($res[0]);
    } else {
        echo json_encode(array("message" => "No record found", "status" => false));
    }
}
