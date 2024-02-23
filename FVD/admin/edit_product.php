<?php
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

  
  <script src=//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js></script>
  <script src=//cloud.tinymce.com/stable/tinymce.min.js></script>

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
    </style>
  
<title>Edit Product</title>
</head>

<body style="overflow-x: hidden !important;">
<h2 align="center" style="margin-top:10px;" ><b>Edit Product</b></h2>
<?php

include("connection.php");

if (isset($_GET['edit']))
{  
$p_id = $_GET['edit'];
global $con;

$get_products = "select * from products where product_id = '$p_id' ";
$run_products = mysqli_query($con,$get_products);
while ($row_products = mysqli_fetch_array($run_products))
{
$product_id = $row_products['product_id'];
$product_title = $row_products['product_title'];
$product_price = $row_products['product_price'];
$product_image = $row_products['product_image'];
$product_desc = $row_products['product_description'];
$product_keywords = $row_products['product_keywords'];
$product_cat = $row_products['product_category'];


										
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
<td>Product Title</td>
</tr>
<tr>
<td><input type="text" name="product_title"  value="<?php echo $product_title; ?>" class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
</tr>

<tr>
<td>Product Price</td>
</tr>
<tr>
<td><input type="text" name="product_price" required   value="<?php echo $product_price;?>"    class="table" style="border:2px solid black;  height:40px; font-size:24px; font-weight:500;" /></td>
</tr>
<tr>
<td>Product Description</td>
</tr>
<tr>
<td><textarea rows="12" class="table" name="product_description"   style="font-size:24px; font-weight:500;" ><?php echo $product_desc; }} ?></textarea></td>
</tr>
<tr>
<td colspan="5"><input type="submit"  name="update_product" value="Update Product" ></td>
</tr>
</table>
</form>
<br />

<form action="" method="post" enctype="multipart/form-data">
<h3 align="center">Change the Product Image</h3>
<table class="table">
<tr>
<td>Current Product Image</td>
</tr>
<tr>
<td><img src="images/<?php echo $product_image; ?>"  width="150px" /></td>
</tr>
<tr>
<td>Select a new Product Image</td>
</tr>
<tr>
<td><input type="file"  required name="product_image" class="table"  /></td>
</tr>
<tr>
<td colspan="5"><input type="submit"  class="submit"  name="update_img" value="Change Image" ></td>
</tr>
</table>
</form>

<script>
    $(document).ready(function() {
        tinymce.init({
          selector: "textarea",
          theme: "modern",
          paste_data_images: true,
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          image_class_list: [
           {title: 'Responsive', value: 'img-fluid'}
            ],
          toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          toolbar2: "print preview media | forecolor backcolor emoticons",
          image_advtab: true,
          file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
              $('#upload').trigger('click');
              $('#upload').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                  callback(e.target.result, {
                    alt: ''
                  });
                };
                reader.readAsDataURL(file);
              });
            }
          },
          templates: [{
            title: 'Test template 1',
            content: 'Test 1'
          }, {
            title: 'Test template 2',
            content: 'Test 2'
          }]
        });
      });


</script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php
if (isset($_GET['edit']))
{  
$p_id = $_GET['edit'];
}

if(isset($_POST['update_product']))
{

global $con;
$product_title=$_POST["product_title"];
$product_category="abc";
$product_description=$_POST["product_description"];
$product_price=$_POST["product_price"];
$product_keywords="abc";
  
						 $sql= "UPDATE products SET product_category = '$product_category' ,  product_title = '$product_title' , product_price = '$product_price', product_description = '$product_description', product_keywords = '$product_keywords' WHERE product_id = '$p_id' ";
					     $insert = mysqli_query($con,$sql);	
						 if($insert)
						 { 
							$_SESSION['edited'] = 'edited';
						 echo "<script>window.open('admin_panel.php?view_products','_self')</script>";
						 }
						 else
						 {
							echo "<h1>Failed to update </h1>";
						 }

 }
 
 
 
 if(isset($_POST['update_img']))
{

global $con;
$image_name=$_FILES['product_image']['name'];
$image_tmp_name=$_FILES['product_image']['tmp_name'];
 
 
 	move_uploaded_file($image_tmp_name,"images/$image_name");
	
						$update= "update  products set  product_image = '$image_name' where product_id = '$p_id' ";
					    $insert = mysqli_query($con,$update);	
						 
						 if($insert)
						 {
							$_SESSION['edited'] = 'edited';
						 echo "<script>window.open('admin_panel.php?view_products','_self')</script>";
						 }
}
 ?>
