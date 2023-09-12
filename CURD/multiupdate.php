<?php
    include('./connection.php');

    $sid = $_GET['sid'];
    $std = "SELECT * FROM `multistd` WHERE `sid` = '$sid' ";
    $updtrun = mysqli_query($conn, $std);
    $fetch = mysqli_fetch_assoc($updtrun);
    
    if(isset($_POST['sub'])){
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
        if(!empty($spic[0])){
            // if new pic inserted
            $p = array();
            $extn = array('jpg','png','jpeg','JPG','PNG','JPEG');
            foreach($spic as $pic){
                $exe = pathinfo($pic, PATHINFO_EXTENSION);
                // echo $exe;
                if(in_array($exe, $extn)){
                    $p[] = rand(10000,99999).".".$exe;
                    $msg = 'right';
                }
                else{
                    $msg = 'not right';
                    break;
                }
            }

            // if($msg == 'right'){
            //   // Delete old pics
            // }
            if($msg == 'right'){    
                // Delete old pics
                $pics =unserialize($fetch['spic']);
                foreach($pics as $i){
                    unlink("./multiimg/".$i);
                }
                // Update record
                $pdata = serialize($p);
                $sql = "UPDATE `multistd` SET `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `spic`='$pdata', `sdate`='$sdate' WHERE `sid`='$sid' ";
                $run = mysqli_query($conn,$sql);
                if($run){
                    // Upload new pics
                    foreach($p as $key=>$j){
                        move_uploaded_file($_FILES['spic']['tmp_name'][$key], './multiimg/'.$j);
                    }
                    $show = 'DATA HAS BEEN UPDATED WITH NEW STUDENT PICS';
                    // Move back to multistd table view
                    header("Refresh:2, url=./multiview.php");
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
            // if new pics not inserted
            // $p = $fetch['spic'];
            $sql = "UPDATE `multistd` SET `srollno`='$srollno', `sname`='$sname', `sfname`='$sfname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `sdate`='$sdate' WHERE `sid`='$sid' ";
            $run = mysqli_query($conn,$sql);
            if($run){
                $show = 'DATA HAS BEEN UPDATED WITH OLD STUDENT PICS';
                // Move back to multistd table view
                header("Refresh:3, url=./multiview.php");
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
  <title>Single Insert</title>
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
                        <input type="number" class="inp" id="i1" name="srollno" value="<?php echo $fetch['srollno']?>" placeholder="Enter Your Roll No" required>
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