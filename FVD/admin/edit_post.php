<?php
if (!isset($_SESSION['customer_login'])) {
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


	<title>Edit Post</title>

	<style>
		.hidden {
			display: none;
		}

		.btn {
			background-color: #D2D2D2;
			padding-bottom: 10px;
			padding-left: 40px;
			padding-right: 40px;
			font-size: 23px;
			font-weight: 600;
		}

		.btn:hover {
			background-color: grey;
			color: white;
		}
	</style>
</head>

<body>
	<h2 align="center" style="margin-top:10px;" class="pt-5"><b>Edit Post</b></h2>
	<?php

	include("connection.php");

	if (isset($_GET['edit_post'])) {
		$p_id = $_GET['edit_post'];
		global $con;

		$get_products = "select * from posts where post_id = '$p_id' ";
		$run_products = mysqli_query($con, $get_products);
		while ($row_products = mysqli_fetch_array($run_products)) {
			$post_id = $row_products['post_id'];
			$post_category = $row_products['post_category'];
			$post_title = $row_products['post_title'];
			$post_image = $row_products['post_image'];
			$post_description = $row_products['post_description'];
			$date = $row_products['date'];
			$author = $row_products['author'];

	?>

			<form action="" method="post" enctype="multipart/form-data">
				<table width="100%">
					<tr>
						<td>Post Title</td>
					</tr>
					<tr>
						<td><input type="text" name="product_title" value="<?php echo $post_title; ?>" class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
					</tr>

					<tr>
						<td>Post Category</td>
					</tr>
					<tr>
						<td><input type="text" name="product_category" value="<?php echo $post_category; ?>" class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
					</tr>

					<tr>
						<td>Post Description</td>
					</tr>
					<tr>
						<td><textarea rows="20" class="table" name="product_description" style="font-size:24px; font-weight:500;"><?php echo $post_description;  ?></textarea></td>
						<input name="image" type="file" class="hidden" id="upload" onchange="">
					</tr>



					<tr>
						<td>Author</td>
					</tr>
					<tr>
						<td><input type="text" name="author" value="<?php echo $author ?>" class="table" style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" /></td>
					</tr>

					<tr>
						<td><input type="submit" name="update_product" value="Update Post" class="btn"></td>
					</tr>
				</table>
			</form>
			<br />

			<form action="" method="post" enctype="multipart/form-data">
				<h4 class="mt-4">Update Featured Image</h4>
				<table class="table">
					<tr>
						<td>Current Featured Image</td>
					</tr>
					<tr>
						<td><img src="images/<?php echo $post_image;
											}
										} ?>" width="250px" /></td>
					</tr>
					<tr>
						<td>Select a new Product Image</td>
					</tr>
					<tr>
						<td><input type="file" required name="product_image" class="table" /></td>
					</tr>
					<tr>
						<td colspan="5"><input type="submit" class="btn" name="update_img" value="Change Image"></td>
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
						image_class_list: [{
							title: 'Responsive',
							value: 'img-fluid'
						}],
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
			<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>


<?php

if (isset($_POST['update_product'])) {

	global $con;
	$product_title = addslashes($_POST["product_title"]);
	$post_category = addslashes($_POST["product_category"]);
	$product_description = addslashes($_POST["product_description"]);
	$author = addslashes($_POST["author"]);
	

	$sql = "UPDATE posts SET post_title = '$product_title' , post_category = '$post_category' ,  post_description = '$product_description' , author = '$author' WHERE post_id = '$p_id' ";
	$insert = mysqli_query($con, $sql);
	if ($insert) {
		$_SESSION['edited'] = 'edited';
		echo "<script>window.open('admin_panel.php?all_posts','_self')</script>";
	} else {
		echo "<script>alert($product_keywords)</script>";
	}
}



if (isset($_POST['update_img'])) {

	global $con;
	$image_name = $_FILES['product_image']['name'];
	$image_tmp_name = $_FILES['product_image']['tmp_name'];


	move_uploaded_file($image_tmp_name, "images/$image_name");

	$update = "update  posts set  post_image = '$image_name' where post_id = '$p_id' ";
	$insert = mysqli_query($con, $update);

	if ($insert) {
		$_SESSION['edited'] = 'edited';
		echo "<script>window.open('admin_panel.php?all_posts','_self')</script>";
	}
}
?>