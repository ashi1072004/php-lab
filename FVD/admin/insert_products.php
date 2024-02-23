<?php
if(!isset($_SESSION['customer_login']))
{
header("Location: index.php");
}
?>


<?php
include_once("connection.php");

$smsg="";
$emsg="";
$fields= "";
if(isset($_POST['submit']))
{
$product_title=$_POST["product_title"];
$product_category="abc";
$image_name=$_FILES['product_image']['name'];
$image_tmp_name=$_FILES['product_image']['tmp_name'];
// $folder= "images/$image_name";
$product_description=$_POST["product_description"];
$product_price=$_POST["product_price"];
$product_keywords="abc";

	if($product_description == "")
	{
		$fields = "<div class='error'>Please make sure all the fields are filled</div>";
	}
	else 
	{
	move_uploaded_file($image_tmp_name,"images/$image_name");
	$sql = " INSERT INTO products  VALUES   (NULL, '$product_category','NILL','$product_title','$product_price','$product_description','$image_name','$product_keywords','0')";
	$insert = mysqli_query($con,$sql);					

			if($insert)
			{
			$smsg = "<div class='success'>Product has been successfully added</div>";
			}
			else 
			{
			$emsg = "<div class='error'>There was an erro adding the product.<br>Please try again./div>";	
			}

	}
 }
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />


    <script src=//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js></script>
    <script src=//cloud.tinymce.com/stable/tinymce.min.js></script>

    <title>Insert Products</title>
    <style>
    body {
        margin: 0px;
        padding: 0px;
    }

    .wrapper {
        margin-top: 0px;
        margin-bottom: 100px;
    }

    .insert_form {
        padding: 10px;
        width: 100%;

    }

    .success {
        background-color: green;
        font-size: 18px;
        color: black;
        padding: 10px;
        font-weight: 700;
        border: 1px solid black;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .error {
        background-color: tomato;
        font-size: 18px;
        color: black;
        padding: 10px;
        font-weight: 700;
        border: 1px solid black;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    </style>


</head>

<body>
    <div class="container-fluid mt-2">
        <center>
            <h2><b>Add New Product</b></h2>
            <hr class="m-0 p-0">
            <center>
                <?php echo $smsg; ?>
                <?php echo $emsg; ?>
                <?php echo $fields; ?>
            </center>
            <div class="row p-0">
                <div class="col-sm-12 mr-auto ml-auto p-0">
                    <div class="insert_form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table width="100%">
                                <tr>
                                    <td>Product Title</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="product_title" required class="table"
                                            style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Image</td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="product_image" required class="table" /></td>
                                </tr>
                                <tr>
                                    <td>Product Price</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="product_price" required class="table"
                                            style="border:2px solid black;  height:40px; font-size:24px; font-weight:500;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Short Description</td>
                                </tr>
                                <tr>
                                    <td><textarea rows="10" class="table" name="product_description"
                                            style="font-size:24px; font-weight:500;"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="5"><input type="submit" name="submit" value="Insert Product now"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>





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
</body>

</html>