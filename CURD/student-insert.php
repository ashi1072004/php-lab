<?php
    include('./connection.php');

    if(isset($_POST['sub'])){
      $teachid = mysqli_real_escape_string($conn, $_POST['teachid']);
      $classtime = mysqli_real_escape_string($conn, $_POST['classtime']);
      $srollno = mysqli_real_escape_string($conn, $_POST['srollno']);
      $sname = mysqli_real_escape_string($conn, $_POST['sname']);
      $sfname = mysqli_real_escape_string($conn, $_POST['sfname']);
      $smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
      $scnic = mysqli_real_escape_string($conn, $_POST['scnic']);
      $semail = mysqli_real_escape_string($conn, $_POST['semail']);
      $spic = $_FILES['spic']['name'];
      $sdate = date("Y-m-d");
      // echo '<pre>';
      // print_r($spic);
      // echo '</pre>';
      $exe = pathinfo($spic, PATHINFO_EXTENSION);
      // echo $exe;
      $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
      if(in_array($exe, $extn)){
          $p = rand(10000,99999).".".$exe;
          $sql = "INSERT INTO `std`(`teachid`, `classtime`, `srollno`, `sname`, `sfname`, `smobile`, `scnic`, `semail`, `spic`, `sdate`)VALUES('$teachid', '$classtime', '$srollno', '$sname', '$sfname', '$smobile', '$scnic', '$semail', '$p', '$sdate')";
          $run = mysqli_query($conn,$sql);
          if($run){
              move_uploaded_file($_FILES['spic']['tmp_name'], './singleimg/'.$p);
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
  <title>Student Insert</title>
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
                      <select class="form-select" name="teachid">
                        <?php
                          $tsql = "SELECT * FROM `teacher`";
                          $trun = mysqli_query($conn,$tsql);
                        ?>
                        <option selected>Select Teacher</option>
                        <?php
                          while($fetch = mysqli_fetch_assoc($trun)){
                            ?>
                            <option value="<?php echo $fetch['tid'];?>"><?php echo $fetch['tname'];?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="mt-5 mb-3">
                      <select class="form-select" name="classtime">
                        <?php
                          $csql = "SELECT * FROM `classtime`";
                          $crun = mysqli_query($conn,$csql);
                        ?>
                        <option selected>Select Class Time</option>
                        <?php
                          while($cfetch = mysqli_fetch_assoc($crun)){
                            ?>
                            <option value="<?php echo $cfetch['ctid'];?>"><?php echo $cfetch['cttime'];?> [<?php echo $cfetch['cname'];?>]</option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="inp" name="srollno" placeholder="Enter Your Roll No" required>
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
                      <input type="file" class="inp1" name="spic">
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