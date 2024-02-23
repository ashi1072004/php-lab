<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  
<title></title>
</head>

<body>
<?php

if (isset($_GET['delete_post']))
{  
$p_id = $_GET['delete_post'];
global $con;

$get_products = "delete from posts where post_id = '$p_id' ";
$run_products = mysqli_query($con,$get_products);


if($run_products)
{
  $_SESSION['deleted'] = 'deleted';
echo "<script>window.open('admin_panel.php?all_posts','_self')</script>";
}
}
?>





<script src="js/bootstrap.min.js"></script>
</body>
</html>
