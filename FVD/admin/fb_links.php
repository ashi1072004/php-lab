<?php
include("connection.php");
if (!isset($_SESSION['customer_login'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="../asset/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <title>Log in</title>
    <style>
        .link {
            color: blue;
            font-weight: 700;
            background: none;
        }

        .link:hover {
            color: black;
            font-weight: 700;
            text-decoration: none;
            background: none;
        }

        .submit {
            width: 50%;
            font-size: 20px;
            font-weight: 500;
            border: 1px solid #000000;
            border-radius: 6px;
            padding: 5px;
        }

        .submit:hover {
            background-color: #FFFFFF;
        }

        .success {
            background-color: green;
            color: black;
            padding: 10px;
            border: 1px solid black;
            text-align: center;
            font-size: 18px;
            font-weight: 600;

        }
    </style>
</head>

<body>
    <h2 align="center" class="pt-1" style="margin-top:10px; margin-bottom:10px;"><b>Facebook Links</b></h2>
    <center>
        <div class='success d-none'>Link deleted!</div>
    </center>
    <?php
    global $con;

    $get_links = "SELECT * FROM `links` WHERE `ltype`='fb' ";
    $run_links = mysqli_query($con, $get_links);
    ?>
    <main class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 800px;">Link</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="links-table">
                                    <?php
                                    $id = 0;
                                    $get_links = "SELECT * FROM `links` WHERE `ltype`='fb' ";
                                    $run_links = mysqli_query($con, $get_links);
                                    if (mysqli_num_rows($run_links) > 0) {
                                        while ($row = mysqli_fetch_assoc($run_links)) {
                                    ?>
                                            <tr>
                                                <td><?= ++$id ?></td>
                                                <td><?= $row['link'] ?></td>
                                                <td><?= $row['ldate'] ?></td>
                                                <td><button type="button" class="link del border-0" data-id="<?= $row['lid'] ?>">Delete</button></td>
                                            </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Datatables -->
    <script src="../asset/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../asset/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            var table = $('#example2').DataTable({
                lengthChange: false,
                "dom": 'Bfrtip',
                "buttons": [{
                    extend: 'excel',
                    className: 'btn btn-outline-success',
                    text: 'Excel',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }]
            });

            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

            // Delete a Link
            $('body').on('click', '.del', function() {
                var itemId = $(this).data('id');
                var btn = this;
                $.ajax({
                    url: './delete_link.php',
                    method: 'GET',
                    data: {
                        "lid": itemId
                    },
                    success: function(res) {
                        // alert(res);
                        if (res == 1) {
                            $(".success").removeClass("d-none");
                            $(btn).closest("tr").fadeOut();
                            // loadItems();
                            setTimeout(() => {
                                $(".success").addClass("d-none");
                            }, 1500);
                        } else {
                            console.log("Link couldn't be deleted!");
                        }
                    }
                });
            });

            // View links
            // loadItems();

            // function loadItems() {
            //     $.ajax({
            //         url: './view_links.php',
            //         type: 'GET',
            //         data: {
            //             action: 'load',
            //             "type": "fb"
            //         },
            //         success: function(res) {
            //             $('#links-table').html(res);
            //         }
            //     });
            // }
        });
    </script>
</body>

</html>