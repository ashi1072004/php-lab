<?php
session_start();
include("connection.php");

$lid = $_GET['lid'];
$del = "DELETE FROM `links` WHERE `lid` = '$lid' ";
$run = mysqli_query($con, $del);
if ($run) {
    echo 1;
} else {
    echo 2;
}
