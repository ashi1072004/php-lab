<?php
    include('./connection.php');

    if(isset($_POST['sub'])){
      $cttime = mysqli_real_escape_string($conn, $_POST['cttime']);
      $cname = mysqli_real_escape_string($conn, $_POST['cname']);
      $cdate = date("Y-m-d");
      $sql = "INSERT INTO `classtime`(`cttime`, `cname`, `cdate`)VALUES('$cttime', '$cname', '$cdate')";
      $run = mysqli_query($conn,$sql);
      if($run){
        $show = 'DATA HAS BEEN INSERTED';
      }
      else{
          $show = 'DATA HAS NOT BEEN INSERTED';
      }        
    }
?>

<!doctype html>
<html lang="en">

<head>
  <title>ClassTime Insert</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluid banner-image vh-100">
        <div class="row overlay justify-content-center m-0">
            <div class="col-md-4 col-lg-4 col-sm-6 my-5">
                <form class="p-5" autocomplete="on" method="POST">
                    <p class="text-center text-white"><?php echo @$show; ?></p>
                    <h1 class="text-center text-white">Enter Data</h1>
                    <div class="mt-5 mb-3">
                        <input type="text" class="inp" name="cttime" placeholder="Enter Class Time" required>
                    </div>
                    <div class="mt-5 mb-3">
                        <input type="text" class="inp" name="cname" placeholder="Enter Class Name" required>
                    </div>

                    <div class="my-3 text-center">
                        <input type="submit" class="btn px-4 py-2" name="sub" value="Submit">
                    </div>
                </form>    
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
</body>

</html>