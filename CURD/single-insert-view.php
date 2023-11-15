<?php
include('./connection.php');
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
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-fluid p-0">
            <div class="row justify-content-center m-0">
                <div class="col-md-8 col-lg-5 col-sm-11 my-md-3 my-lg-0 bg-light">
                    <form id="form" class="p-5">
                        <p class="msg text-center"></p>
                        <h2 class="text-center">Enter Data</h2>
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
                            <input type="number" class="form-control" name="srollno" placeholder="Enter Your Roll No" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <input type="text" class="form-control" name="sname" placeholder="Enter Your Name" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <input type="text" class="form-control" name="sfname" placeholder="Enter Your Father Name" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <input type="tel" class="form-control" name="smobile" placeholder="Enter Your Mobile #" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <input type="number" class="form-control" name="scnic" placeholder="Enter Your CNIC" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <input type="email" class="form-control" name="semail" placeholder="Your Email" required>
                        </div>
                        <div class="mt-5 mb-3 text-white">
                            <input type="file" class="form-control" name="spic">
                        </div>
                        <div class="my-3 text-center">
                            <input type="submit" id="ssub" class="btn btn-primary px-4 py-2" name="sub" value="Submit">
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="col-md-12 col-lg-7 col-sm-12 my-3 my-lg-0 bg-light">
                    <div class="table-responsive mt-5">
                        <h2 class="py-2 text-center">Student Record</h2>
                        <table class="table table-hover table-borderless align-middle" style="border: 2px solid lightgrey;">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Student Roll no</th>
                                    <!-- <th>Teacher ID</th> -->
                                    <th>Student Pic</th>
                                    <th>Student Name</th>
                                    <th>Student Father Name</th>
                                    <th>Student Mobile #</th>
                                    <th>Student CNIC</th>
                                    <th>Student Email</th>
                                    <th>Student Admission Date</th>
                                    <!-- <th>#</th> -->
                                    <th>Teacher ID</th>
                                    <th>Teacher Pic</th>
                                    <th>Teacher Name</th>
                                    <!-- <th>Class ID</th> -->
                                    <th>Class Time</th>
                                    <th>Class Name</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // "use strict";

        $(document).ready(function() {
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

            function jsonData(form) {
                // let formdata = new FormData(addForm);
                let arr = $(form).serializeArray();
                let obj = {};
                for (let a in arr) {
                    if (arr[a].value == "") {
                        return false;
                    }
                    obj[arr[a].name] = arr[a].value;
                }
                console.log(obj);
                let json_string = JSON.stringify(obj);
                return json_string;
            }
            $("#form").on("submit", function(e) {
                e.preventDefault();
                let jsonObj = jsonData("#form");
                if (!jsonObj) {
                    message("Please! Fill all inputs", false);
                } else {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/php-lab/CURD/ajax/single-insert.php",
                        data: jsonObj,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            alert(res.status);
                            if (res.status == 1) {
                                $("#form").trigger("reset");
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data has been inserted!'
                                });
                                showData();
                            } else if (res.status == 2) {
                                Toast.fire({
                                    icon: 'warning',
                                    title: 'Data has not been inserted!'
                                });
                            } else {
                                Toast.fire({
                                    icon: 'warning',
                                    title: 'Invalid image!'
                                });
                            }
                        }
                    });
                }
            });
            // View Data
            let showData = () => {
                $("#tbody").html("");
                $.ajax({
                    method: "GET",
                    url: "http://localhost/php-lab/CURD/ajax/single-view.php",
                    success: function(res) {
                        if (res.status == false) {
                            $("#tbody").append("<tr><td colspan='15'><h2>" + res.message + "</h2></td></tr>");
                        } else {
                            $.each(res, function(key, value) {
                                $("#tbody").append(`<tr>
                                    <td>${value.srollno}</td>
                                    <td><img src="./singleimg/${value.spic}" alt="No Img Found" width="70" height="70"></td>
                                    <td>${value.sname}</td>
                                    <td>${value.sfname}</td>
                                    <td>${value.smobile}</td>
                                    <td>${value.scnic}</td>
                                    <td>${value.semail}</td>
                                    <td>${value.sdate}</td>
                                    <td>${value.tid}</td>
                                    <td><img src="./singleimg/${value.tpic}" alt="No Img Found" width="70" height="70"></td>
                                    <td>${value.tname}</td>
                                    <td>${value.cttime}</td>
                                    <td>${value.cname}</td>
                                    <td><a href="./student-update.php?sid=${value.sid}" class="btn btn-success">Update</a></td>
                                    <td><button type="button" data-del="${value.sid}" class="btn btn-danger delete">Delete</button></td>
                                </tr>`);
                            });
                        }
                    }
                });
            };
            showData();
            $(document).on("click", ".delete", function() {
                var id = $(this).data("del");
                // alert(id);
                let myJSON = JSON.stringify({
                    sid: id
                });
                var btn = this;
                $.ajax({
                    type: "POST",
                    url: "http://localhost/php-lab/CURD/ajax/single-del.php",
                    data: myJSON,
                    success: function(res) {
                        alert(res);
                        if (res.status) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data deleted!'
                            });
                            $(btn).closest("tr").fadeOut();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Data not deleted!'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>