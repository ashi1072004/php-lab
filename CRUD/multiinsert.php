<?php
include('./connection.php');

if (isset($_POST['sub'])) {
  $srollno = mysqli_real_escape_string($conn, $_POST['srollno']);
  $sname = mysqli_real_escape_string($conn, $_POST['sname']);
  $sfname = mysqli_real_escape_string($conn, $_POST['sfname']);
  $smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
  $scnic = mysqli_real_escape_string($conn, $_POST['scnic']);
  $semail = mysqli_real_escape_string($conn, $_POST['semail']);
  $spic = $_FILES['spic']['name'];
  // $stemppic = $_FILES['spic']['tmp_name'];
  $sdate = date("Y-m-d");
  // echo '<pre>';
  // print_r($stemppic);
  // echo '</pre>';
  $extn = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
  $p = array();
  // echo var_dump(isset($spic));
  foreach ($spic as $val) {
    $exe = pathinfo($val, PATHINFO_EXTENSION);
    // echo $exe;
    if (in_array($exe, $extn)) {
      $p[] = rand(10000, 99999) . "." . $exe;
      $msg = 'right';
    } else {
      $msg = 'not right';
      break;
    }
  }
  // print_r($p);
  if ($msg == 'right') {
    $mulpic = serialize($p);
    $sql = "INSERT INTO `multistd`(`srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`)VALUES('$srollno', '$sname', '$sfname', '$smobile', '$scnic', '$semail', '$mulpic', '$sdate')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      foreach ($p as $key => $i) {
        move_uploaded_file($_FILES['spic']['tmp_name'][$key], './multiimg/' . $i);
      }
      $show = 'DATA HAS BEEN INSERTED';
    } else {
      $show = 'DATA HAS NOT BEEN INSERTED';
    }
  }
  // elseif(!isset($spic)){
  //     $show = 'Please Choose your Pics';
  // }
  else {
    $show = 'INVALID IMAGE';
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Multi Insert</title>
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
          <form class="p-5" method="POST" enctype="multipart/form-data">
            <p class="text-center text-white"><?php echo @$show; ?></p>
            <h1 class="text-center text-white">Enter Data</h1>
            <div class="mt-5 mb-3">
              <input type="number" class="inp" id="i1" name="srollno" placeholder="Enter Your Roll No" required>
            </div>
            <div class="mt-5 mb-3">
              <input type="text" class="inp" name="sname" placeholder="Enter Your Name" required>
            </div>
            <div class="mt-5 mb-3">
              <input type="text" class="inp" name="sfname" placeholder="Enter Your Father Name" required>
            </div>
            <div class="mt-5 mb-3">
              <input type="tel" class="inp" name="smobile" placeholder="Enter Your Mobile #" required>
            </div>
            <div class="mt-5 mb-3">
              <input type="number" class="inp" name="scnic" placeholder="Enter Your CNIC" required>
            </div>
            <div class="mt-5 mb-3">
              <input type="email" class="inp" name="semail" placeholder="Your Email" required>
            </div>
            <div class="mt-5 mb-3 text-white">
              <input type="file" class="inp1" multiple name="spic[]">
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