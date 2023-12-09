<?php
include('./database.php');
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
          <form id="form" class="p-5">
            <h2 class="text-center text-white">Enter Data</h2>
            <div class="mt-5 mb-3">
              <select class="form-select" name="teachid">
                <?php
                $tsql = "SELECT * FROM `teacher`";
                $trun = mysqli_query($conn, $tsql);
                ?>
                <option selected>Select Teacher</option>
                <?php
                while ($fetch = mysqli_fetch_assoc($trun)) {
                ?>
                  <option value="<?php echo $fetch['tid']; ?>">
                    <?php echo $fetch['tname']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mt-5 mb-3">
              <select class="form-select" name="classtime">
                <?php
                $csql = "SELECT * FROM `classtime`";
                $crun = mysqli_query($conn, $csql);
                ?>
                <option selected>Select Class Time</option>
                <?php
                while ($cfetch = mysqli_fetch_assoc($crun)) {
                ?>
                  <option value="<?php echo $cfetch['ctid']; ?>">
                    <?php echo $cfetch['cttime']; ?> [
                    <?php echo $cfetch['cname']; ?>]
                  </option>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    // "use strict";
    $(document).ready(function() {
      $("#form").on("submit", function(event) {
        event.preventDefault();
        // form validation
        let formData = new FormData(form);
        $.ajax({
          type: "POST",
          url: "./ajax/single-insert.php",
          data: formData,
          contentType: false,
          processData: false,
          success: function(res) {
            // alert(res);
            if (res == 1) {
              $("#form").trigger("reset");
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
                icon: 'success',
                title: 'Data has been inserted!'
              })
              // alert("DATA HAS BEEN INSERTED");
            } else if (res == 2) {
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
                title: 'Data has not been inserted!'
              })
              // alert("DATA HAS NOT BEEN INSERTED");
            } else {
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
              // alert("INVALID IMAGE");
            }
          }
        });
      });
    });
  </script>
</body>

</html>