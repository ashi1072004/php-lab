<?php
session_start();
include("connection.php");
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
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="../assets/favicon.png" />
	<title>Admin | Travensure</title>
	<style>
		.btn {
			background-color: #D2D2D2;
			padding-bottom: 10px;
		}

		.btn:hover {
			background-color: grey;
			color: white;
		}

		.abc {
			background-color: #D2D2D2;
			padding-top: 5px;
			text-align: left;
			padding-bottom: 200px;
			height: 100vh;
			padding-top: 50px;
		}

		.abc a {
			display: block;
			color: black;
			font-size: 24px;
			text-align: center;
			font-weight: 500;
			padding: 5px;
			text-align: left;
			padding-left: 10%;

		}

		.abc a:hover {
			font-weight: 900;
			text-decoration: none;
			color: black;
		}

		.header_color {
			background-color: #157DAF;
		}


		@media(max-width:600px) {
			.abc {
				background-color: #D2D2D2;
				text-align: left;
				height: 340px !important;
				padding-top: 10px;
			}

		}
	</style>
</head>

<body class="bg-light">
	<div class="container-fluid" style="background-color:#D2D2D2; padding-top:10px; padding-bottom:10px">
		<h2 align="Center" style="font-weight: 800;">Admin Panel</h2>
	</div>
	<div class="container-fluid">
		<div class="wrapper">
			<div class="row mb-5 ">
				<div class="col-sm-3  p-0 pb-5">
					<div class="abc ">
						<a href="admin_panel.php?fb_links">Facebook Links</a>
						<a href="admin_panel.php?yt_links">YouTube Links</a>
						<a href="admin_panel.php?all_posts">All Blog Posts</a>
						<a href="admin_panel.php?add_new_post">Add Blog Post</a>

						<!-- <a href="admin_panel.php?view_products">All Products</a>
<a href="admin_panel.php?insert_product">Add Product</a> -->
						<a href="admin_panel.php?change_password">Change Password</a>
						<a href="admin_panel.php?admin_logout">Admin Logout</a>
					</div>
				</div>
				<div class="col-sm-9 bg-light" style="overflow: auto;">
					<div class="row p-0">
						<div class="col-sm-12 p-0 bg-light">
							<?php

							if (isset($_GET['change_password'])) {
								include("change_password.php");
							} else if (isset($_GET['insert_product'])) {
								include("insert_products.php");
							} else if (isset($_GET['view_products'])) {
								include("view_products.php");
							} else if (isset($_GET['fb_links'])) {
								include("fb_links.php");
							} else if (isset($_GET['yt_links'])) {
								include("yt_links.php");
							} else if (isset($_GET['all_posts'])) {
								include("all_posts.php");
							} else if (isset($_GET['add_new_post'])) {
								include("add_new_post.php");
							} else if (isset($_GET['view_post'])) {
								include("view_post.php");
							} else if (isset($_GET['edit'])) {
								include("edit_product.php");
							} else if (isset($_GET['edit_post'])) {
								include("edit_post.php");
							} else if (isset($_GET['view_comments'])) {
								include("view_comments.php");
							} else if (isset($_GET['admin_logout'])) {
								include("admin_logout.php");
							} else if (isset($_GET['delete_comment'])) {
								include("view_comments.php");
							} else {
								include("all_posts.php");
							}

							?>
						</div>
					</div>
				</div> <!-- ROW ENDS -->
			</div> <!-- WRAPPER ENDS -->
		</div> <!-- CONTAINER ENDS -->
		<script src="js/bootstrap.min.js"></script>
</body>

</html>