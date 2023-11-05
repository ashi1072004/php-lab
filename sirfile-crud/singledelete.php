<?php 
include("./connection.php");

$del=$_GET['sid'];

$sql = "SELECT * FROM `std` WHERE `sid` = '$del'";
$run = mysqli_query($con,$sql);
$fet = mysqli_fetch_assoc($run);
 
$pic = $fet['spic'];
 if(!empty($pic)){
    unlink("./img/.$pic");
 }
 $sdel = "DELETE FROM `std` WHERE `sid` = $del";
 $srun=mysqli_query($con,$sdel);
 if($srun){
    header("Location:./singleview.php");
 }
?>