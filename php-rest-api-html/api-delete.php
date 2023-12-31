<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);
    $sid = $data['sid'];

    include("config.php");

    $sql = "DELETE FROM `student` WHERE `sid` = '{$sid}'";
    
    if(mysqli_query($conn, $sql)){
        echo json_encode(array("message" => "Data deleted", "status" => true));
    } else {
        echo json_encode(array("message" => "Data not deleted", "status" => false));
    }
?>