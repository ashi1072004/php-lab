<?php
    include('./connection.php');

    if(isset($_POST['sub'])){
      $tname = mysqli_real_escape_string($conn, $_POST['tname']);
      $tfname = mysqli_real_escape_string($conn, $_POST['tfname']);
      $tmobile = mysqli_real_escape_string($conn, $_POST['tmobile']);
      $tcnic = mysqli_real_escape_string($conn, $_POST['tcnic']);
      $temail = mysqli_real_escape_string($conn, $_POST['temail']);
      $tpic = $_FILES['tpic']['name'];
      $tdate = date("Y-m-d");
      // echo '<pre>';
      // print_r($spic);
      // echo '</pre>';
      $exe = pathinfo($tpic, PATHINFO_EXTENSION);
      // echo $exe;
      $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
      if(in_array($exe, $extn)){
          $p = rand(10000,99999).".".$exe;
          $sql = "INSERT INTO `teacher`(`tname`, `tfname`, `tmobile`, `tcnic`, `temail`, `tpic`, `tdate`)VALUES('$tname', '$tfname', '$tmobile', '$tcnic', '$temail', '$p', '$tdate')";
          $run = mysqli_query($conn,$sql);
          if($run){
              move_uploaded_file($_FILES['tpic']['tmp_name'], './singleimg/'.$p);
              $show = 'DATA HAS BEEN INSERTED';
          }
          else{
              $show = 'DATA HAS NOT BEEN INSERTED';
          }
      }
      // elseif(!isset($spic)){
      //   $show = 'Please Choose your Pic';
      // }
      else{
          $show = 'INVALID IMAGE';
      }        
    }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Teacher Insert</title>
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
    <div class="container-fluid banner-image">
        <div class="row overlay justify-content-center m-0">
            <div class="col-md-4 col-lg-4 col-sm-6 my-3">
                <form class="p-5" autocomplete="on" method="POST" enctype="multipart/form-data">
                    <p class="text-center text-white"><?php echo @$show; ?></p>
                    <h1 class="text-center text-white">Enter Data</h1>
                    <div class="mt-5 mb-3">
                        <input type="text" class="inp" name="tname" placeholder="Enter Your Name" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="text" class="inp" name="tfname" placeholder="Enter Your Father Name" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="tel" class="inp" name="tmobile" placeholder="Enter Your Mobile #" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="number" class="inp" name="tcnic" placeholder="Enter Your CNIC" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="email" class="inp" name="temail" placeholder="Your Email" required>
                    </div>
                    <div class="mt-5 mb-3 text-white">
                      <input type="file" class="inp1" name="tpic">
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