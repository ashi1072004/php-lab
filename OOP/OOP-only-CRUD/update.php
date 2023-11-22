<?php
include('./config.php');
$obj = new Query();

// Edit Data
if (isset($_GET['sid'])) {
    $id = $obj->get_safe_str($_GET['sid']);
    $condition = array('sid' => $id);
    $fetch = $obj->getData('student', '*', $condition);
    $name = $fetch['0']['sname'];
    $age = $fetch['0']['sage'];
    $city = $fetch['0']['scity'];
    // print_r($fetch);
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
            $obj->updateData('student', $condition, 'sid', $id);
            echo '<script>alert("Data Updated!")</script>';
            header('Location: ./index.php');
        }
    }
}
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
        <div class="row">
            <div class="col-md-9 bg-light mx-auto">
                <form id="form" method="POST">
                    <div class="mb-3">
                        <label for="sname" class="form-label">Name</label>
                        <input type="text" name="sname" id="sname" class="form-control" value="<?php echo $name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sage" class="form-label">Age</label>
                        <input type="number" name="sage" id="sage" class="form-control" value="<?php echo $age ?>">
                    </div>
                    <div class="mb-3">
                        <label for="scity" class="form-label">City</label>
                        <input type="text" name="scity" id="scity" class="form-control" value="<?php echo $city ?>">
                    </div>
                    <input type="submit" class="btn btn-success addItem" name="sub" value="Save">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>