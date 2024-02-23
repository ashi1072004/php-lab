<?php
include "./config.php";

$sql = "SELECT * FROM `links` ";
$run = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link href="../asset/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/app.css">
    <title>Admin Dashboard - Video Downloader</title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">Start Bootstrap</a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <a style="user-select: none;" class="navbar-brand" href="./admin.php">Video Downloader</a>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <main class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Link</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            while ($fet = mysqli_fetch_assoc($run)) {

                                            ?>
                                                <tr>
                                                    <td><?= ++$id ?></td>
                                                    <td><?= $fet['fb_link'] ?></td>
                                                    <td><?= $fet['ldate'] ?></td>
                                                    <td>
                                                        <!-- <button class="btn btn-link" type="button">Edit</button> -->
                                                        <button class="btn btn-link" data-id="<?= $fet['lid'] ?>" type="button">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="text-center text-muted bg-light fixed-bottom py-3">
                <div>Copyright © 2023</div>
            </footer>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
                    text: 'Excel'
                }]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>



</html>