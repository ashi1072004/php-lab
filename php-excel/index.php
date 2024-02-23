<?php
$conn = mysqli_connect("localhost", "root", "", "test");
if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}

require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


if (isset($_POST['sub'])) {
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    // print_r($_FILES['sfile']);

    if (in_array($_FILES['sfile']["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['sfile']['name'];
        move_uploaded_file($_FILES['sfile']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {
            $sname = "";
            if (isset($spreadSheetAry[$i][0])) {
                $sname = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $sage = "";
            if (isset($spreadSheetAry[$i][1])) {
                $sage = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $scity = "";
            if (isset($spreadSheetAry[$i][1])) {
                $scity = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }

            if (!empty($sname) || !empty($sage) || !empty($scity)) {
                $query = "INSERT INTO `student`(`sname`,`sage`,`scity`) values('$sname', '$sage', '$scity')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Student Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-extended.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container-fluid banner-image">
            <div class="row overlay justify-content-center m-0">
                <div class="col-sm-6 my-3">
                    <form class="p-5" method="POST" enctype="multipart/form-data">
                        <h2>Select Excel File</h2>
                        <p class="text-center text-white"><?php echo @$message; ?></p>
                        <div class="mt-5 mb-3">
                            <input type="file" name="sfile" accept=".xls,.xlsx">
                        </div>
                        <div class="my-3 text-center">
                            <input type="submit" class="btn btn-primary px-4 py-2" name="sub" value="Submit">
                        </div>
                    </form>
                </div>
                <div class="col-sm-6 my-3">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $sql = "SELECT * FROM `student`";
                                $run = mysqli_query($conn, $sql);
                                while ($fetch = mysqli_fetch_assoc($run)) {
                                ?>
                                    <tr>
                                        <td><?= $fetch['sname'] ?></td>
                                        <td><?= $fetch['sage'] ?></td>
                                        <td><?= $fetch['scity'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'copy',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fa-regular fa-copy"></i> Copy'
                    },

                    {
                        extend: 'excel',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="far fa-file-excel"></i> Excel'
                    }, {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="far fa-file-pdf"></i> Pdf'
                    }, {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv"></i> CSV'
                    }, {
                        extend: 'print',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-print"></i> Print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>