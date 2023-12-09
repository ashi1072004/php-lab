<?php
include('../database.php');
$obj = new Database();
// Update Class
if (isset($_POST['ctsub'])) {
    $ctid = $_POST['ctid'];
    $cttime = $obj->escapeString($_POST['cttime']);
    $cname = $obj->escapeString($_POST['cname']);

    $params = ['cttime' => $cttime, 'cname' => $cname, 'cdate' => date("Y/m/d")];
    $obj->update('classtime', $params, "`ctid`='$ctid'");
    $res = $obj->getRes();

    if (isset($res[0])) {
        echo json_encode(array("message" => "Data updated", "status" => 1));
    } else {
        echo json_encode(array("message" => "Data not updated", "status" => 2));
    }
}
// Update Teacher
if (isset($_POST['tsub'])) {
    $tid = $_POST['tid'];
    $tname = $obj->escapeString($_POST['tname']);
    $tfname = $obj->escapeString($_POST['tfname']);
    $tmobile = $obj->escapeString($_POST['tmobile']);
    $tcnic = $obj->escapeString($_POST['tcnic']);
    $temail = $obj->escapeString($_POST['temail']);
    $tpic = $_FILES['tpic']['name'];

    $obj->select('teacher', '`tpic`', null, "`tid`='$tid'", null, null);
    $res = $obj->getRes();
    $pic = $res[0][0]['tpic'];

    if (!empty($tpic)) {
        // if new pic inserted
        $exe = strtolower(pathinfo($tpic, PATHINFO_EXTENSION));
        $extn = array('jpg', 'png', 'jpeg');
        if (in_array($exe, $extn)) {
            // Delete old pic
            unlink('../img/' . $pic);
            $p = rand(10000, 99999) . "." . $exe;
            // Update record
            $params = ['tname' => $tname, 'tfname' => $tfname, 'tmobile' => $tmobile, 'tcnic' => $tcnic, 'temail' => $temail, 'tpic' => $p];
            $obj->update('teacher', $params, "`tid`='$tid'");
            $res = $obj->getRes();

            if (isset($res[0])) {
                // Upload new pic
                move_uploaded_file($_FILES['tpic']['tmp_name'], '../img/' . $p);
                echo json_encode(array("message" => "Data updated with new teacher pic", "status" => 1));
            } else {
                echo json_encode(array("message" => "Data not updated", "status" => 2));
            }
        } else {
            echo json_encode(array("message" => "Invalid image!", "status" => 3));
        }
    } else {
        // if new pic not inserted
        $params = ['tname' => $tname, 'tfname' => $tfname, 'tmobile' => $tmobile, 'tcnic' => $tcnic, 'temail' => $temail];
        $obj->update('teacher', $params, "`tid`='$tid'");
        $res = $obj->getRes();

        if (isset($res[0])) {
            echo json_encode(array("message" => "Data updated with old teacher pic", "status" => 4));
        } else {
            echo json_encode(array("message" => "Data not updated", "status" => 2));
        }
    }
}
// Update Student
if (isset($_POST['ssub'])) {
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
}
