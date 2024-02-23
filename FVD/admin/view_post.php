<?php
include("connection.php");
if(!isset($_SESSION['customer_login']))
{
header("Location: index.php");
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

<?php

if (isset($_GET['view_post']))
{  
      $p_id = $_GET['view_post'];
      global $con;

      $get_products = "select * from posts where post_id = '$p_id' ";
      $run_products = mysqli_query($con,$get_products);
      while ($row_products = mysqli_fetch_array($run_products))
      {
      $post_id = $row_products['post_id'];
      $post_title = $row_products['post_title'];
      $post_category = $row_products['post_category'];
      $date = $row_products['date'];
      $post_image = $row_products['post_image'];
      $post_description = $row_products['post_description'];
      $author = $row_products['author'];
?>

<div class="container mt-5">
  <div class="row">
      <div class="col-sm-12 ">
          <h2><?php echo $post_title; ?></h2>
          <p><?php echo $date; ?></p>
          <?php echo "<img src='images/$post_image' class='mt-3 mb-3 img-fluid' width='100%'>";  ?>
          <h6>By <?php echo $author; ?> </h6>
          <p><?php echo $post_description;  }}?></p>


</div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
