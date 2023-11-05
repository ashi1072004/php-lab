<?php 
include("./connection.php");

$del=$_GET['sid'];

$sql = "SELECT * FROM `std1` WHERE `sid` = '$del'";
$run = mysqli_query($con,$sql);
$fet = mysqli_fetch_assoc($run);
 
$pic =unserialize($fet['spic']);
 if(!empty($pic)){
    foreach($pic as $p){
        unlink("./img/.$p");
    }
 }
 $sdel = "DELETE FROM `std1` WHERE `sid` = $del";
 $srun=mysqli_query($con,$sdel);
 if($srun){
    header("Location:./multiview.php");
 }
?>