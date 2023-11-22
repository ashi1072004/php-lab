<?php
include('./config.php');
$obj = new Query();

// Insert data
if (isset($_POST['sub'])) {
    // print_r($_POST);
    $sname = $obj->get_safe_str($_POST['sname']);
    $sage = $obj->get_safe_str($_POST['sage']);
    $scity = $obj->get_safe_str($_POST['scity']);
    if ($sname == '' || $sage == '' || $scity == '') {
        echo '<script>alert("Please Fill All Inputs!")</script>';
    } else {
        $condition = array('sname' => $sname, 'sage' => $sage, 'scity' => $scity);
        $obj->insertData('student', $condition);
        echo '<script>alert("Data Inserted!")</script>';
    }
}
// Delete data
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $obj->get_safe_str($_GET['sid']);
    $condition = array('sid' => $id);
    $obj->deleteData('student', $condition);
}

$result = $obj->getData('student', '*', '', 'sid', 'desc');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJAX CRUD with Modal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <header class="bg-light py-3">
        <h1 class="text-dark text-center">Student Record</h1>
    </header>
    <div class="container mt-5">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="form" method="POST">
                            <div class="mb-3">
                                <label for="sname" class="form-label">Name</label>
                                <input type="text" name="sname" id="sname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="sage" class="form-label">Age</label>
                                <input type="number" name="sage" id="sage" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="scity" class="form-label">City</label>
                                <input type="text" name="scity" id="scity" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-success addItem" name="sub" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Student</button>
                <table class="table mt-3 text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        if (isset($result['0'])) {
                            $id = 1;
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $row['sname'] ?></td>
                                    <td><?php echo $row['sage'] ?></td>
                                    <td><?php echo $row['scity'] ?></td>
                                    <td><a href="./update.php?sid=<?php echo $row['sid'] ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="?type=delete&sid=<?php echo $row['sid'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                                $id++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan='6'>
                                    <h4 class="text-center">No Record Found</h4>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            // $(document).on('click', '.addItem', function() {
            //     $('#myModal').modal('show');
            //     $('#form').trigger('reset');
            // });
            // $(document).on('click', '.editItem', function() {
            //     $('#myModal').modal('show');
            // });
            // $('#form').on('submit', function() {
            //     $('#myModal').modal('hide');
            // });
        });
    </script>
</body>

</html>