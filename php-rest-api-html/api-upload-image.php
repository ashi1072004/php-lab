<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include('./config.php');

$data = json_decode(file_get_contents("php://input"), true);
// echo $data;

$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];

if (empty($fileName)) {
    echo json_encode(array("message" => "please select image", "status" => false));
} else {
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    if (in_array($fileExt, $valid_extensions)) {
        if (!file_exists('upload/' . $fileName)) {
            // check file size '5MB'
            if ($fileSize < 5000000) {
                $query = mysqli_query($conn, "INSERT into `tbl_image` (`name`) VALUES('$fileName')");
                echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));
                move_uploaded_file($tempPath, 'upload/' . $fileName);
            } else {
                echo json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
            }
        } else {
            echo json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));
        }
    } else {
        echo json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
    }
}
