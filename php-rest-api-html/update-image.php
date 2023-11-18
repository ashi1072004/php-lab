<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];

include("config.php");

if (empty($fileName)) {
    $errorMSG = json_encode(array("message" => "please select image", "status" => false));
    echo $errorMSG;
} else {
    $upload_path = 'upload/';

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    if (in_array($fileExt, $valid_extensions)) {
        // check file size '5MB'
        if ($fileSize < 5000000) {
            move_uploaded_file($tempPath, $upload_path . $fileName);
        } else {
            $errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
            echo $errorMSG;
        }
    } else {
        $errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
        echo $errorMSG;
    }
}

// if no error caused, continue ....
if (!isset($errorMSG)) {
    $query = mysqli_query($conn, "UPDATE `tbl_image` SET `name`='{$name}' WHERE `id`='{$id}'");
    echo json_encode(array("message" => "Image Updated Successfully", "status" => true));
} else {
    echo json_encode(array("message" => "Image Updated Successfully", "status" => true));
}
