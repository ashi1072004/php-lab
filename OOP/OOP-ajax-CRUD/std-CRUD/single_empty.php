<?php
include('./database.php');

$dsql = "SELECT * FROM `std` ";
$drun = mysqli_query($conn, $dsql);
// $fetch = mysqli_fetch_assoc($drun);
// echo "<pre>";
// print_r($fetch);
// echo "</pre>";
while ($fetch = mysqli_fetch_assoc($drun)) {
    unlink('./singleimg/' . $fetch['spic']);
}
$del = "TRUNCATE TABLE `std` ";
$delrun = mysqli_query($conn, $del);
if ($delrun) {
    // $msg = "table is empty";
    header('Location: ./student-view.php');
}
// else{
//     $msg = "table is not empty";
// }
