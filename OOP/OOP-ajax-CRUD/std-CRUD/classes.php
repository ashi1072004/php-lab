<?php
include('./database.php');
$obj = new Database();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Teacher</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
</head>

<body>
    <header class="bg-secondary">
        <div class="container py-3">
            <a class="btn btn-sm btn-warning text-white mx-2 fw-bold" href="./student.php">Student CRUD</a>
            <a class="btn btn-sm btn-warning text-white mx-2 fw-bold" href="./teacher.php">Teacher CRUD</a>
            <a class="btn btn-sm btn-warning text-white mx-2 fw-bold" href="./classes.php">Classes CRUD</a>
        </div>
    </header>
    <main>
        <div class="container-fluid p-0">
            <div class="row justify-content-center m-0">
                <div class="col-md-8 col-lg-5 col-sm-11 my-md-3 my-lg-0 bg-light">
                    <form id="form" class="py-3 px-5">
                        <p class="msg text-center"></p>
                        <h2 class="text-center">Enter Classes</h2>
                        <input type="hidden" class="form-control" name="ctid">
                        <div class="mt-5 mb-3">
                            <label class="px-2">Enter Class Time</label>
                            <input type="text" class="form-control" name="cttime" required>
                        </div>
                        <div class="mt-5 mb-3">
                            <label class="px-2">Enter Class Name</label>
                            <input type="text" class="form-control" name="cname" required>
                        </div>
                        <div class="my-3 text-center">
                            <input type="submit" id="tsub" class="btn btn-primary px-4 py-2" name="tsub" value="Submit">
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="col-md-12 col-lg-7 col-sm-12 my-3 my-lg-0 bg-light">
                    <div class="table-responsive mt-3">
                        <h2 class="py-2 text-center">Classes Record</h2>
                        <table class="table table-hover table-borderless align-middle" style="border: 2px solid lightgrey;">
                            <thead class="table-secondary">
                                <tr>
                                    <!-- <th>Class ID</th> -->
                                    <th>Class Time</th>
                                    <th>Class Name</th>
                                    <th>Date Started</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
                    <style>
                        .pagination {
                            display: flex;
                            justify-content: center;
                        }

                        .pagination li {
                            list-style-type: none;
                            padding: 5px 10px;
                            background-color: rgb(12, 94, 255);
                            font-weight: bold;
                            border-radius: 5px;
                            margin: 0 5px;
                        }

                        .pagination li a {
                            color: white;
                            text-decoration: none;
                        }
                    </style>
                    <div id="pages" class="mt-3">
                        <?php
                        echo $obj->pagination('classtime', null, null, 5);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
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

            $("#form").on("submit", function(e) {
                e.preventDefault();
                let formdata = new FormData(form);
                formdata.append("ctsub", true);
                if ($('#form').attr('action') == 'edit') {
                    // Update Data
                    $.ajax({
                        type: "POST",
                        url: "./ajax/single-update.php",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            console.log(res);
                            res = JSON.parse(res);
                            if (res.status == 1) {
                                $("#form").trigger("reset");
                                Toast.fire({
                                    icon: 'success',
                                    title: res.message
                                });
                                showData();
                                $('#form').attr('action', '');
                            } else {
                                Toast.fire({
                                    icon: 'warning',
                                    title: res.message
                                });
                            }
                        }
                    });
                } else {
                    // Insert Data
                    $.ajax({
                        type: "POST",
                        url: "./ajax/single-insert.php",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            res = JSON.parse(res);
                            if (res.status == 1) {
                                $("#form").trigger("reset");
                                Toast.fire({
                                    icon: 'success',
                                    title: res.message
                                });
                                showData();
                            } else {
                                Toast.fire({
                                    icon: 'warning',
                                    title: res.message
                                });
                            }
                        }
                    });
                }
            });
            // View Data
            showData();

            function showData() {
                $("#tbody").html("");
                $.ajax({
                    method: "GET",
                    url: "./ajax/single-view.php",
                    data: {
                        'ctload': true
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.status == false) {
                            $("#tbody").html("<tr><td colspan='15'><h2>" + res.message + "</h2></td></tr>");
                        } else {
                            $.each(res, function(key, value) {
                                $("#tbody").append(`<tr>
                                    <td>${value.cttime}</td>
                                    <td>${value.cname}</td>
                                    <td>${value.cdate}</td>
                                    <td><button type="button" data-edit="${value.ctid}" class="btn btn-success edit">Update</button></td>
                                    <td><button type="button" data-del="${value.ctid}" class="btn btn-danger delete">Delete</button></td>
                                </tr>`);
                            });
                        }
                    }
                });
            }
            // Delete Data
            $(document).on("click", ".delete", function() {
                var id = $(this).data("del");
                // alert(id);
                var btn = this;
                if (confirm("Do you really want to delete this data?")) {
                    $.ajax({
                        type: "GET",
                        url: "./ajax/single-del.php",
                        data: {
                            'ctid': id,
                            'ctsub': true
                        },
                        success: function(res) {
                            res = JSON.parse(res);
                            // console.log(res);
                            if (res.status) {
                                Toast.fire({
                                    icon: 'success',
                                    title: res.message
                                });
                                $(btn).closest("tr").fadeOut();
                                showData();
                            } else {
                                Toast.fire({
                                    icon: 'warning',
                                    title: res.message
                                });
                            }
                        }
                    });
                }
            });
        });
        // Edit Data
        $('body').on('click', '.edit', function() {
            var id = $(this).data('edit');
            $.ajax({
                url: "./ajax/single-view.php",
                type: 'GET',
                data: {
                    'ctid': id,
                    'ctload': true
                },
                success: function(res) {
                    var res = JSON.parse(res);
                    // console.log(res);
                    if (!(res.status == false)) {
                        $('#form').attr('action', 'edit');
                        $.each(res, function(key, value) {
                            $('[name=ctid]').val(value.ctid);
                            $('[name=cttime]').val(value.cttime);
                            $('[name=cname]').val(value.cname);
                            window.scrollTo(0, 0);
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>