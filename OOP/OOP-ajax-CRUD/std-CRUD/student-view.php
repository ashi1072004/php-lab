<?php
include('./database.php');
?>
<!doctype html>
<html lang="en">

<head>
  <title>Student View</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main class='container'>
    <div class="row">
      <!-- Search Record -->
      <div class="col-12">
        <div class="table-responsive mt-5">
          <h1 class="py-2 text-center">Student Record</h1>
          <!-- <form>
              <div class="input-group my-3 align-right">
                <input type="search" class="form-control" name="search" placeholder="Search Record" aria-describedby="addon">
                <span class="input-group-text" id="addon"><i class="fa-solid fa-magnifying-glass"></i></span>
              </div>
            </form> -->

          <!-- <button type="button" class="btn btn-primary" onclick="showData()">Show Record</button> -->
          <table class="table table-hover table-borderless align-middle">
            <thead class="table-secondary">
              <tr>
                <!-- <th>#</th> -->
                <th>Teacher ID</th>
                <th>Teacher Pic</th>
                <th>Teacher Name</th>
                <!-- <th>Class ID</th> -->
                <th>Class Time</th>
                <th>Class Name</th>
                <th>Student Roll no</th>
                <!-- <th>Teacher ID</th> -->
                <th>Student Pic</th>
                <th>Student Name</th>
                <th>Student Father Name</th>
                <th>Student Mobile #</th>
                <th>Student CNIC</th>
                <th>Student Email</th>
                <th>Student Admission Date</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
          </table>
        </div>
      </div>
      <div class="col-12 my-3 text-center">
        <a href="./student-insert.php" target="_blank" class="btn btn-success px-4 py-2 mx-2">Insert Data</a>
        <a href="./single_empty.php?del" class="btn btn-danger px-4 py-2">Empty Table</a>
      </div>

    </div>


  </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      showData();

      function showData() {
        $.ajax({
          method: "GET",
          url: "./ajax/single-view.php",
          success: function(res) {
            $("#tbody").html(res);
          }
        });
      }
      $(document).on("click", ".delete", function() {
        var sid = $(this).data("del");
        var btn = this;
        // alert(sid);
        $.ajax({
          type: "GET",
          url: "./ajax/single-del.php",
          data: {
            "sid": sid
          },
          success: function(res) {
            // alert(res);
            if (res == 1) {
              $(btn).closest("tr").fadeOut();
            }
          }
        });
      });
    });
  </script>
</body>

</html>