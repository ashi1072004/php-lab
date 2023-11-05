<?php 
include("./connection.php");

$del=$_GET['tid'];

$sql = "SELECT * FROM `tsd` WHERE `tid` = '$del'";
$run = mysqli_query($con,$sql);
$fet = mysqli_fetch_assoc($run);
 
$pic = $fet['tpic'];
 if(!empty($pic)){
    unlink("./img/.$pic");
 }
 $sdel = "DELETE FROM `tsd` WHERE `tid` = $del";
 $srun=mysqli_query($con,$sdel);
 if($srun){
    header("Location:./tview.php");
 }
?>