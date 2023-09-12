<?php
    include('./connection.php');

    $sid = $_GET['sid'];
    $std = "SELECT * FROM `std` WHERE `sid` = '$sid' ";
    $updtrun = mysqli_query($conn, $std);
    $fetch = mysqli_fetch_assoc($updtrun);
    
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
      if(!empty($spic)){
        // if new pic inserted
        $exe = pathinfo($spic, PATHINFO_EXTENSION);
        // echo $exe;
        $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
        if(in_array($exe, $extn)){
            // Delete old pic
            unlink("./singleimg/".$fetch['spic']);
            $p = rand(10000,99999).".".$exe;
            // Update record
            $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `spic`='$p', `sdate`='$sdate' WHERE `sid`='$sid' ";
            $run = mysqli_query($conn,$sql);
            if($run){
                // Upload new pic
                move_uploaded_file($_FILES['spic']['tmp_name'], './singleimg/'.$p);
                $show = 'DATA HAS BEEN UPDATED WITH NEW STUDENT PIC';
                // Move back to std table view
                header("Refresh:2, url=./student-view.php");
            }
            else{
                $show = 'DATA HAS NOT BEEN UPDATED';
            }
        }
        else{
            $show = 'INVALID IMAGE';
        }
      }
      else{
          // if new pic not inserted
          // $p = $fetch['spic'];
          $sql = "UPDATE `std` SET `classtime`='$classtime', `teachid`='$teachid', `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `sdate`='$sdate' WHERE `sid`='$sid' ";
          $run = mysqli_query($conn,$sql);
          if($run){
              $show = 'DATA HAS BEEN UPDATED WITH OLD STUDENT PIC';
              // Move back to std table view
              header("Refresh:3, url=./student-view.php");
          }
          else{
              $show = 'DATA HAS NOT BEEN UPDATED';
          }
      }
    }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Student Update</title>
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
                      <select class="form-select" name="teachid" id="i1">
                        <?php
                          $tsql = "SELECT * FROM `teacher`";
                          $trun = mysqli_query($conn,$tsql);
                        ?>
                        <option>Select Teacher</option>
                        <option value="<?php echo $fetch['teachid']?>" selected>Previous</option>
                        <?php
                          while($tfet = mysqli_fetch_assoc($trun)){
                            ?>
                            <option value="<?php echo $tfet['tid'];?>"><?php echo $tfet['tname'];?></option>
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
                        <option>Select Class Time</option>
                        <option value="<?php echo $fetch['classtime']?>" selected>Previous</option>
                        <?php
                          while($cfet = mysqli_fetch_assoc($crun)){
                            ?>
                            <option value="<?php echo $cfet['ctid'];?>"><?php echo $cfet['cttime'];?> [<?php echo $cfet['cname'];?>]</option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="inp" name="srollno" value="<?php echo $fetch['srollno']?>" placeholder="Enter Your Roll No" required>
                    </div>
                    <div class="mt-5 mb-3">
                        <input type="text" class="inp" name="sname" value="<?php echo $fetch['sname']?>" placeholder="Enter Your Name" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="text" class="inp" name="sfname" value="<?php echo $fetch['sfname']?>" placeholder="Enter Your Father Name" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="tel" class="inp" name="smobile" value="<?php echo $fetch['smobile']?>" placeholder="Enter Your Mobile #" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="number" class="inp" name="scnic" value="<?php echo $fetch['scnic']?>" placeholder="Enter Your CNIC" required>
                    </div>
                    <div class="mt-5 mb-3">
                      <input type="email" class="inp" name="semail" value="<?php echo $fetch['semail']?>" placeholder="Your Email" required>
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