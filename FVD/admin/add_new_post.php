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
$product_category=$_POST["product_category"];
$image_name=$_FILES['product_image']['name'];
$image_tmp_name=$_FILES['product_image']['tmp_name'];
// $folder= "images/$image_name";
$product_description=addslashes($_POST["product_description"]);
$author=$_POST["author"];

// Create a DateTime object for the current date
$currentDate = new DateTime();

// Format the current date as "Month day, year"
$date = $currentDate->format('F d, Y');


	if($product_description == "")
	{
		$fields = "<div class='error'>Please make sure the description for the post is added</div>";
	}
	else 
	{

	move_uploaded_file($image_tmp_name,"images/$image_name");
	$sql = " INSERT INTO posts  VALUES (NULL,'$product_category' ,'$product_title','$image_name','$product_description', '$date', '$author')";
	$insert = mysqli_query($con,$sql);					

			if($insert)
			{
			$smsg = "<div class='success'>Post has been successfully added</div>";
			}
			else 
			{
			$emsg = "<div class='error'>There was an error adding the post.<br>Please try again./div>";	
			}

	}
 }
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src=//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js></script>
    <script src=//cloud.tinymce.com/stable/tinymce.min.js></script>

    <title></title>

    <style>
    .hidden {
        display: none;
    }

    .btn {
        background-color: #D2D2D2;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        font-size: 23px;
        font-weight: 600;
    }

    .btn:hover {
        background-color: grey;
        color: white;
    }

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

    #mceu_47 {
        display: none;
    }
    </style>


</head>

<body>
    <div class="container-fluid pt-2 pb-5">
        <center>
            <h2><b>Add Blog Post</b></h2>
            <center>
                <?php echo $smsg; ?>
                <?php echo $emsg; ?>
                <?php echo $fields; ?>
            </center>
            <div class="row p-0 pb-5">
                <div class="col-sm-12 mr-auto ml-auto p-0">
                    <div class="insert_form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table width="100% pb-5">
                                <tr>
                                    <td>Post Title</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="product_title" required class="table"
                                            style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>Post Category</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="product_category" required class="table"
                                            style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>Post Featured Image</td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="product_image" required class="table" /></td>
                                </tr>


                                <tr>
                                    <td>Post Description</td>
                                </tr>
                                <tr>
                                    <td><textarea rows="20" class="table" name="product_description"
                                            style="font-size:24px; font-weight:500;"></textarea></td>
                                    <input name="image" type="file" class="hidden" id="upload" onchange="">
                                </tr>



                                <tr>
                                    <td>Author Name</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="author" required class="table"
                                            style="border:2px solid black; height:40px; font-size:24px; font-weight:500;" />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5"><input type="submit" class="btn" name="submit" value="Add Post">
                                    </td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>