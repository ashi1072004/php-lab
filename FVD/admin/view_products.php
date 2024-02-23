<?php
include("connection.php");
if(!isset($_SESSION['customer_login']))
{
header("Location: index.php");
}
$deleted = "";
$updated = "";

if(isset($_SESSION['deleted']))
{
$deleted = "<div class='success'>Product has been deleted</div>";
unset ($_SESSION['deleted']);
}

if(isset($_SESSION['edited']))
{
$updated = "<div class='success'>Product has been successfully updated</div>";
unset ($_SESSION['edited']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
<title>Log in</title>
<style>

.link 
{
  color:blue;
  font-weight:700;
}
.link:hover 
{
  color:black;
  font-weight:700;
  text-decoration:none;
}
.submit
{
width:50%;
font-size:20px;
font-weight:500;
border:1px solid #000000;
border-radius:6px;
padding:5px;
}
.submit:hover
{
background-color:#FFFFFF;
}
.success 
{
  background-color:green;
  color:black;
  padding:10px;
  border:1px solid black;
  text-align:center;
  font-size:18px;
  font-weight:600;

}
</style>
</head>

<body>
<h2 align="center" style="margin-top:10px;"><b>All Products</b></h2>
<center>
<?php echo $deleted; ?>
<?php echo $updated; ?>
</center>
<table  class="table" width="100%" >
<tr>
<th>Sr</td>
<th>Product title</th>
<th>Image</th>
<th>Price</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php


  
global $con;

$get_products = "select * from products ";
$run_products = mysqli_query($con,$get_products);
$sr=0;
while ($row_products = mysqli_fetch_array($run_products))
{
$product_id = $row_products['product_id'];
$product_title = $row_products['product_title'];
$product_price = $row_products['product_price'];
$product_image = $row_products['product_image'];
$sr++;

?>

<tr>
<td><?php echo $sr; ?></td>
<td><?php echo $product_title; ?></td>
<td><?php echo "<img src='images/$product_image' class='img-fluid' width='100px' height='100px'>";  ?></td>
<td>$<?php echo $product_price; ?></td>
<td><a href="admin_panel.php?edit=<?php echo $product_id ?>" class="link">Edit</a></td>
<td><a href="delete_pro.php?delete=<?php echo $product_id ?>" class="link">Delete</a></td>
</tr>
<?php } ?>
</table>



<script src="js/bootstrap.min.js"></script>

</body>
</html>
