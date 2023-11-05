<?php 
include("../connection.php");

	$s_name = mysqli_real_escape_string($con, $_POST['s-name']);
	$s_f_name = mysqli_real_escape_string($con, $_POST['s-f_name']);
	$s_claas = mysqli_real_escape_string($con, $_POST['s-class']);
	$s_sec = mysqli_real_escape_string($con, $_POST['s-sec']);
	$s_address = mysqli_real_escape_string($con, $_POST['s-address']);
	$s_gmail = mysqli_real_escape_string($con, $_POST['s-gmail']);
	$s_mobile_no = mysqli_real_escape_string($con, $_POST['s-mobile']);
	$s_gender = mysqli_real_escape_string($con, $_POST['s-gender']);
    
	$pic = $_FILES['S-pic']['name'];
	$sp = strtolower(pathinfo($pic, PATHINFO_EXTENSION));
	$ar = array("png", "jpg", "jpeg");
	if (in_array($sp, $ar)) {
		$p = rand(10000, 90000) . "." . $sp;
		$sql = "INSERT INTO `s-no`(`s-name`,`s-f_name`,`s-class`,`s-sec`,`s-address`,`s-gmail`,`s-mobile_no.`,`s-gender`,`S-pic`)
	VALUES('$s_name','$s_f_name','$s_claas','$s_sec','$s_address','$s_gmail','$s_mobile_no','$s_gender','$p')";
		$run = mysqli_query($con, $sql);
		if ($run) {
			move_uploaded_file($_FILES['S-pic']['tmp_name'], "../img/" . $p);

			echo 1;
		} else {
			echo 2;
		}

	} else {
		echo 3;
	}

?>