<?php
session_start();
include("connection.php");
  

$emsg = '';
$username = '';
$password= '';
  
if(isset($_POST['login']))
{
$username=$_POST["u"];
$password=$_POST["p"];

					$sql="SELECT * FROM admins WHERE username= '$username' AND password='$password' ";
					
					$query = mysqli_query($con, $sql);
		
		            $num_rows = mysqli_num_rows($query); 
		   			if($num_rows == 0)
								{
								$emsg = "<div class='error'>Username or password is incorrect</div>";
								}
					else
					{
									$_SESSION['customer_login'] = $username;
									
									header("Location: admin_panel.php");
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
        <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="../assets/favicon.png" />
    <title>Admin | Travensure</title>
    <style>
    h1 {
        font-size: 30px;
        font-weight: 700;
    }

    input {
        outline: none;
        width: 100%;
        margin-top: 20px;
        border: 1px solid grey;
        padding: 10px;
        border-radius: 7px;
        font-size: 16px;
    }

    .btn {
        background-color: #d9d9d9;
        font-size: 20px;
        font-weight: 600;
        outline: none !important;
        border: none !important;
    }

    .btn:hover {
        background-color: #bfbfbf;
    }

    .btn:active {
        background-color: #a6a6a6;
    }

    body {
        margin: 0px;
        padding: 0px;
        background-color: #f2f2f2;
    }

    .error {
        background-color: #ffe9e5;
        color: red;
        padding: 10px;
        margin-top: 20px;
        font-size: 15px;
        text-align: left;
        font-weight: 600;
        width: 100%;
        border-radius: 8px;
    }

    .login-section {
        background-color: white;
        padding: 50px 50px;
        border-radius: 30px;
        margin: 50px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-5 login-section  mx-auto border shadow ">
                <h1 align="center">Admin Login</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" name="u" value="<?php echo $username; ?>" required
                                placeholder="Username" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="password" name="p" required placeholder="Password"
                                value="<?php echo $password; ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <input type="submit" class="btn" name="login" value="Let me in" />

                        </div>
                    </div>


                    <?php echo $emsg; ?>
                </form>
            </div>

        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>