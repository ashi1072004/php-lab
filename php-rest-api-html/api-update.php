<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);
    $sid = $data['sid'];
    $sname = $data['sname'];
    $sage = $data['sage'];
    $scity = $data['scity'];

    include("config.php");

    $sql = "UPDATE `student` SET `sname`='{$sname}', `sage`='{$sage}', `scity`='{$scity}' WHERE `sid`='{$sid}'";
    $run = mysqli_query($conn, $sql);
    
    if($run){
        echo json_encode(array("message" => "Data updated", "status" => true));
    } else {
        echo json_encode(array("message" => "Data Not updated", "status" => false));
    }
?>