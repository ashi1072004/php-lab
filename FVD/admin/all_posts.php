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
$deleted = "<div class='success'>Post has been successfully deleted</div>";
unset ($_SESSION['deleted']);
}

if(isset($_SESSION['commentdeleted']))
{
$deleted = "<div class='success'>Comment has been successfully deleted</div>";
unset ($_SESSION['commentdeleted']);
}

if(isset($_SESSION['edited']))
{
$updated = "<div class='success'>Post has been successfully updated</div>";
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
<h2 align="center" class="pt-1" style="margin-top:10px; margin-bottom:10px;"><b>All Blog Posts</b></h2>
<center>
<?php echo $deleted; ?>
<?php echo $updated; ?>
</center>

<?php


  
global $con;

$get_products = "select * from posts order by post_id desc ";
$run_products = mysqli_query($con,$get_products);

$number = mysqli_num_rows($run_products);
if($number > 0)
{ 


  echo '<table  class="table pt-4" width="100%"  >
  <tr>
  <th>Sr</td>
  <th>Title</th>
  <th>Featured Image</th>
  <th>View Post</th>
  <th>Edit</th>
  <th>Delete</th>
  
  </tr>';


$sr=0;
while ($row_products = mysqli_fetch_array($run_products))
{
$post_id = $row_products['post_id'];
$post_title = $row_products['post_title'];
$post_description = $row_products['post_description'];
$post_image = $row_products['post_image'];
$date = $row_products['date'];
$sr++;

?>

<tr>
<td><?php echo $sr; ?></td>
<td><?php echo $post_title; ?></td>
<td><?php echo "<img src='images/$post_image' class='img-fluid' width='100px' height='100px'>";  ?></td>
<td><a href="admin_panel.php?view_post=<?php echo $post_id ?>" class="link">View</a></td>
<td><a href="admin_panel.php?edit_post=<?php echo $post_id ?>" class="link">Edit</a></td>
<td><a href="delete_post.php?delete_post=<?php echo $post_id ?>" class="link">Delete</a></td>
</tr>
<?php } } 


else 
{
  echo "<h3 align='center'  class='pt-5 pb-5'>No posts found</h3>";
}



?>
</table>



<script src="js/bootstrap.min.js"></script>

</body>
</html>
