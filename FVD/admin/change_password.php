<?php
if(!isset($_SESSION['customer_login']))
{
header("Location: index.php");
}
?>


<?php
include_once("connection.php");

$smsg ="";
$msg1 ="";
$msg2 ="";
$emsg = "";
$cpass="";

$npass="";
$cnpass="";

if(isset($_POST['submit']))
{

                    $cpass=$_POST["cpass"];  		
                    $npass=$_POST["npass"];  		
					$cnpass=$_POST["cnpass"]; 		

						$select_admin_password = "SELECT * FROM admins ";
						$s_pass = mysqli_query($con, $select_admin_password);
						$row = mysqli_fetch_array($s_pass);

						$current_password = $row['password'];
						
						if($cpass != $current_password)
						{
							$msg2 = "<div class='error'> You have put a wrong current passowrd. Please try again ! </div>";
						}

                        else if ($npass != $cnpass)
                        {
                            $msg1 = "<div class='error'>Passwords should be same</div>";
                        }
                        else
                        {
                            $sql = "UPDATE admins SET password = '$npass'  ";
                            $query = mysqli_query($con, $sql);
                            $smsg = "<div class='success'>Your Password has been successfully changed </div>";

							$cpass="";
							$npass="";
							$cnpass="";
                        }

					
}




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  
<title></title>
<style>
.btn 
	{
		background-color: #D2D2D2;
		padding-bottom: 10px;
    padding-left: 30px;
    padding-right: 30px;
    font-size: 23px;
    font-weight: 600;
	}
	.btn:hover 
	{
		background-color: grey;
		color:white;
	}

body
{
margin:0px;
padding:0px;
}

.wrapper
{
margin-top:0px;
margin-bottom:100px;
}

.insert_form
{
padding:10px;
width:100%;

}

.success 
{
	background-color: green;
	font-size:18px;
	color:black;
	padding:10px;
	font-weight:700;
	border:1px solid black;
	margin-top:5px;
	margin-bottom:5px;
}
.error 
{
	background-color: tomato;
	font-size:18px;
	color:black;
	padding:10px;
	font-weight:700;
	border:1px solid black;
	margin-top:5px;
	margin-bottom:5px;
}

</style>


</head>

<body>
<div class="container-fluid mt-2 pt-5">
<center>
<h2><b>Change Admin Password</b></h2>
<center>
<?php echo $smsg; ?>
<?php echo $msg1; ?>
<?php echo $msg2; ?>
</center>
<div class="row p-0">
<div class="col-sm-12 mr-auto ml-auto p-0">
<div class="insert_form">
<form action="" method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
<td>Current Password</td>
</tr>
<tr>
<td><input type="password" name="cpass"  required value="<?php echo $cpass; ?>"  class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
</tr>

<tr>
<td>New Password</td>
</tr>
<tr>
<td><input type="password" name="npass"  value="<?php echo $npass; ?>"  required  class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
</tr>

<tr>
<td>Confirm New Password</td>
</tr>
<tr>
<td><input type="password" name="cnpass" value="<?php echo $cnpass; ?>"   required  class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
</tr>
<tr>
<td colspan="5"><input type="submit" class="btn"  name="submit" value="Change Password " ></td>
</tr>
</table>
</form>
</div>
</div>
</div>
</center>
</div>




<script src="js/bootstrap.min.js"></script>
</body>
</html>
