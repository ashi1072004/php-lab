<?php

include('../database.php');
$obj = new Database();
// Delete Teacher
if (isset($_GET['tsub'])) {
    $tid = $_GET['tid'];

    $join = '`teacher` ON std.teachid = teacher.tid  INNER JOIN `classtime` ON std.classtime=classtime.ctid';
    $obj->select('std', '*', $join, "`tid`='$tid'", null, null);
    $res = $obj->getRes();
    if (isset($res[0][0])) {
        echo json_encode(array("message" => "Teacher is assigned to students!", "status" => false));
    } else {
        $obj->select('teacher', '`tpic`', null, "`tid`='$tid'", null, null);
        $res = $obj->getRes();
        $pic = $res[0][0]['tpic'];
        if (!empty($pic)) {
            unlink('../img/' . $pic);
        }

        $obj->delete('teacher', "`tid`='$tid'");
        $res = $obj->getRes();
        if (isset($res[0])) {
            echo json_encode(array("message" => "Data deleted", "status" => true));
        } else {
            echo json_encode(array("message" => "Data not deleted", "status" => false));
        }
    }
}
// Delete Student
if (isset($_GET['ssub'])) {
    $sid = $_GET['sid'];
    // echo $sid;
    $obj->select('std', '`spic`', null, "`sid`='$sid'", null, null);
    $res = $obj->getRes();
    $pic = $res[0][0]['spic'];
    if (!empty($pic)) {
        unlink('../img/' . $pic);
    }

    $obj->delete('std', "`sid`='$sid'");
    $res = $obj->getRes();
    if (isset($res[0])) {
        echo json_encode(array("message" => "Data deleted", "status" => true));
    } else {
        echo json_encode(array("message" => "Data not deleted", "status" => false));
    }
}
