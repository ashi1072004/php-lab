<?php
include("connection.php");
if(!isset($_SESSION['customer_login']))
{
header("Location: index.php");
}
$deleted = "";
$updated = "";
$commentid = "";

if(isset($_GET['delete_comment']))
{
  $commentid = $_GET['delete_comment'];
  $deletecomment = "delete from comments where id = '$commentid' ";
  $run_products = mysqli_query($con,$deletecomment);
  $_SESSION['commentdeleted'] = 'commentdeleted';
  echo "<script>window.open('admin_panel.php?all_posts','_self')</script>";
}

if(isset($_GET['view_comments']))
{
$postid = $_GET["view_comments"];
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
<h2 align="center" class="pt-1" style="margin-top:10px; margin-bottom:10px;"><b>All Comments</b></h2>

<center>
<?php echo $deleted; ?>
<?php echo $updated; ?>
</center>

<?php


  
global $con;

$get_products = "SELECT * FROM comments WHERE post_id = '$postid' ";
$run_products = mysqli_query($con,$get_products);

$number = mysqli_num_rows($run_products);
if($number > 0)
{ 


  echo '<table  class="table pt-4" width="100%"  >
  <tr>
  <th>Sr</td>
  <th>Username</td>
  <th>Comment</th>
  <th>Delete</th>
  
  </tr>';


$sr=0;
while ($row_products = mysqli_fetch_array($run_products))
{
$username = $row_products['username'];
$comment_id = $row_products['id'];
$comment = $row_products['comment'];
$sr++;

?>

<tr>
<td><?php echo $sr; ?></td>
<td><?php echo $username; ?></td>
<td><?php echo $comment; ?></td>
<td><a href="admin_panel.php?delete_comment=<?php echo $comment_id ?>">Delete</a></td>
</tr>
<?php } } 


else 
{
  echo "<h3 align='center'  class='pt-5 pb-5'>No Comments found!</h3>";
}



?>
</table>



<script src="js/bootstrap.min.js"></script>

</body>
</html>
