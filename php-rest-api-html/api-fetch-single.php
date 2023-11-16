<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $data = json_decode(file_get_contents("php://input"), true);
    $sid = $data['sid'];

    include("config.php");

    $sql = "SELECT * FROM `student` WHERE `sid` = '{$sid}'";
    $run = mysqli_query($conn, $sql);
    if (!$run) {
        die("SQL query failed");
    }
    
    if(mysqli_num_rows($run) > 0){
        $fetch = mysqli_fetch_all($run, MYSQLI_ASSOC);
        echo json_encode($fetch);
    } else {
        echo json_encode(array("message" => "No record found", "status" => false));
    }
?>