<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);
    $sname = $data['sname'];
    $sage = $data['sage'];
    $scity = $data['scity'];

    include("config.php");

    $sql = "INSERT INTO `student`(`sname`, `sage`, `scity`) VALUES ('{$sname}', '{$sage}', '{$scity}')";
    $run = mysqli_query($conn, $sql);
    
    if($run){
        echo json_encode(array("message" => "Data Inserted", "status" => true));
    } else {
        echo json_encode(array("message" => "Data Not Inserted", "status" => false));
    }
?>