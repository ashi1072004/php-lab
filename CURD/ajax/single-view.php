<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include('../connection.php');

// $sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid";
// $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid";
// $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid";
// $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid UNION SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid ORDER BY `srollno`";
// $sql = "SELECT * FROM `std` s RIGHT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno`";
// $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid LEFT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno` ";

$sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid INNER JOIN `classtime` ct ON s.classtime=ct.ctid";

$run = mysqli_query($conn, $sql);
if (mysqli_num_rows($run) > 0) {
    $fetch = mysqli_fetch_all($run, MYSQLI_ASSOC);
    echo json_encode($fetch);
} else {
    echo json_encode(array("message" => "No record found", "status" => false));
}
