<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$id = $_PUT['id'];
$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];

include("config.php");

if (empty($fileName)) {
    $errorMSG = json_encode(array("message" => "please select image", "status" => false));
    echo $errorMSG;
} else {
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    if (in_array($fileExt, $valid_extensions)) {
        // check file size '5MB'
        if ($fileSize < 5000000) {
            $del = "SELECT * FROM `tbl_image` where `id` = '$id' ";
            $run = mysqli_query($conn, $del);
            $fetch = mysqli_fetch_assoc($run);
            unlink("./upload/" . $fetch['name']);

            $query = mysqli_query($conn, "UPDATE `tbl_image` SET `name`='{$fileName}' WHERE `id`='{$id}'");
            echo json_encode(array("message" => "Image Updated Successfully", "status" => true));
            move_uploaded_file($tempPath, 'upload/' . $fileName);
        } else {
            echo json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
        }
    } else {
        echo json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
    }
}
