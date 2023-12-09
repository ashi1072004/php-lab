<?php

include('../database.php');
$obj = new Database();

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
