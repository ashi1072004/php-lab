<?php
include_once("connection.php");

if(isset($_GET["markascomplete"]))
{
  $orderid = $_GET["markascomplete"];
  $sql = "UPDATE orders SET status = 'Completed' WHERE id = '$orderid' ";
  $query = mysqli_query($con,$sql);
  if($query)
  { 
  $_SESSION['completed'] = 'completed';
  echo "<script>window.open('admin_panel.php?view_orders','_self')</script>";
  }

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log out</title>
</head>

<body>
</body>
</html>
