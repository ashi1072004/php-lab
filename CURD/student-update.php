<?php
    include('./connection.php');

    $sid = $_GET['sid'];
    $std = "SELECT * FROM `std` WHERE `sid` = '$sid' ";
    $updtrun = mysqli_query($conn, $std);
    $fetch = mysqli_fetch_assoc($updtrun);
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
  <main>
    <div class="container-fluid banner-image">
        <div class="row overlay justify-content-center m-0">
            <div class="col-md-4 col-lg-4 col-sm-6 my-3">
                <form id="form" class="p-5">
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
                        <input type="hidden" class="inp" name="sid" value="<?php echo $fetch['sid']?>">
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
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      $("#form").on("submit", function (event) {
        event.preventDefault();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });
        // form validation
        let formData = new FormData(form);
        $.ajax({
          type: "POST",
          url: "./ajax/single-update.php",
          data: formData,
          contentType: false,
          processData: false,
          success: function (res) {
            // alert(res);
            if (res == 1) {
              $("#form").trigger("reset");
              Toast.fire({
                icon: 'success',
                title: 'Data has been updated with new student pic!'
              })
              setTimeout(() => {
                window.location.href = "./single-insert-view.php";
              }, 4000);
            } else if (res == 2) {
              Toast.fire({
                icon: 'warning',
                title: 'Data is not updated!'
              })
            } else if(res == 3) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'warning',
                title: 'Invalid image!'
              })
            }else{
              Toast.fire({
                icon: 'success',
                title: 'Data has been updated with old student pic!'
              })
              setTimeout(() => {
                window.location.href = "./single-insert-view.php";
              }, 4000);
            }
          }
        });
      });
    });
  </script>
</body>

</html>