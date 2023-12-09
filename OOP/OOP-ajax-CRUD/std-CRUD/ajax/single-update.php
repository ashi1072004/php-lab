<?php
include('../database.php');
$obj = new Database();

$sid = $_POST['sid'];
$teachid = $obj->escapeString($_POST['teachid']);
$classtime = $obj->escapeString($_POST['classtime']);
$srollno = $obj->escapeString($_POST['srollno']);
$sname = $obj->escapeString($_POST['sname']);
$sfname = $obj->escapeString($_POST['sfname']);
$smobile = $obj->escapeString($_POST['smobile']);
$scnic = $obj->escapeString($_POST['scnic']);
$semail = $obj->escapeString($_POST['semail']);
$spic = $_FILES['spic']['name'];

$obj->select('std', '`spic`', null, "`sid`='$sid'", null, null);
$res = $obj->getRes();
$pic = $res[0][0]['spic'];

if (!empty($spic)) {
    // if new pic inserted
    $exe = strtolower(pathinfo($spic, PATHINFO_EXTENSION));
    $extn = array('jpg', 'png', 'jpeg');
    if (in_array($exe, $extn)) {
        // Delete old pic
        unlink('../img/' . $pic);
        $p = rand(10000, 99999) . "." . $exe;
        // Update record
        $params = ['teachid' => $teachid, 'classtime' => $classtime, 'srollno' => $srollno, 'sname' => $sname, 'sfname' => $sfname, 'smobile' => $smobile, 'scnic' => $scnic, 'semail' => $semail, 'spic' => $p];
        $obj->update('std', $params, "`sid`='$sid'");
        $res = $obj->getRes();

        if (isset($res[0])) {
            // Upload new pic
            move_uploaded_file($_FILES['spic']['tmp_name'], '../img/' . $p);
            echo json_encode(array("message" => "Data updated with new student pic", "status" => 1));
        } else {
            echo json_encode(array("message" => "Data not updated", "status" => 2));
        }
    } else {
        echo json_encode(array("message" => "Invalid image!", "status" => 3));
    }
} else {
    // if new pic not inserted
    $params = ['teachid' => $teachid, 'classtime' => $classtime, 'srollno' => $srollno, 'sname' => $sname, 'sfname' => $sfname, 'smobile' => $smobile, 'scnic' => $scnic, 'semail' => $semail];
    $obj->update('std', $params, "`sid`='$sid'");
    $res = $obj->getRes();

    if (isset($res[0])) {
        echo json_encode(array("message" => "Data updated with old student pic", "status" => 4));
    } else {
        echo json_encode(array("message" => "Data not updated", "status" => 2));
    }
}
