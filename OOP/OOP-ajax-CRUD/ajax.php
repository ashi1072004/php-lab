<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "test2");
if ($conn) {
    // echo "connected";
} else {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD operations
if (isset($_GET['action']) && $_GET['action'] == 'load') {
    // Load data
    $output = '';
    $result = $conn->query('SELECT * FROM `student`');
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <tr>
                <td class="align-middle"><img src="./img/' . $row['spic'] . '" width="70" height="70" alt="Not Found"></td>
                <td>' . $row['sname'] . '</td>
                <td>' . $row['smobile'] . '</td>
                <td>' . $row['scnic'] . '</td>
                <td>' . $row['semail'] . '</td>
                <td>' . $row['scity'] . '</td>
                <td>' . $row['sdate'] . '</td>
                <td>
                    <button class="btn btn-warning btn-sm editItem" data-id="' . $row['sid'] . '">Edit</button>
                    <button class="btn btn-danger btn-sm deleteItem" data-id="' . $row['sid'] . '">Delete</button>
                </td>
            </tr>
        ';
    }
    echo $output;
}

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    // Delete item
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
    $scnic = mysqli_real_escape_string($conn, $_POST['scnic']);
    $semail = mysqli_real_escape_string($conn, $_POST['semail']);
    $scity = mysqli_real_escape_string($conn, $_POST['scity']);
    $spic = $_FILES['spic']['name'];
    $sdate = date("Y/m/d");

    if ($sname == "" || $semail == "" || $smobile == "" || $scnic == "" || $scity == "") {
        echo json_encode(['message' => 'Please Fill All Inputs!', 'status' => 1]);
    } else {
        $exe = strtolower(pathinfo($spic, PATHINFO_EXTENSION));
        $extn = array('jpg', 'png', 'jpeg');
        if (in_array($exe, $extn)) {
            $p = rand(10000, 99999) . "." . $exe;
            $insert = "INSERT INTO `student`(`sname`, `smobile`, `scnic`, `semail`, `scity`, `spic`, `sdate`)VALUES('$sname', '$smobile', '$scnic', '$semail', '$scity', '$p', '$sdate')";
            $run = $conn->query($insert);
            if ($run) {
                move_uploaded_file($_FILES['spic']['tmp_name'], './img/' . $p);
                echo json_encode(['message' => 'Data Inserted', 'status' => 2]);
            } else {
                echo json_encode(['message' => 'Data Not Inserted: ' . $conn->error, 'status' => 3]);
            }
        } else {
            echo json_encode(['message' => 'Invalid Image!', 'status' => 4]);
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])) {
    // Update item
    $sid = $_GET['id'];
    $prun = $conn->query("SELECT * FROM `student` WHERE `sid` = $sid");
    $fetch = $prun->fetch_assoc();

    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
    $scnic = mysqli_real_escape_string($conn, $_POST['scnic']);
    $semail = mysqli_real_escape_string($conn, $_POST['semail']);
    $scity = mysqli_real_escape_string($conn, $_POST['scity']);
    $spic = $_FILES['spic']['name'];

    if ($sname == "" || $semail == "" || $smobile == "" || $scnic == "" || $scity == "") {
        echo json_encode(['message' => 'Please Fill All Inputs!', 'status' => 1]);
    } else {
        if (!empty($spic)) {
            $exe = strtolower(pathinfo($spic, PATHINFO_EXTENSION));
            $extn = array('jpg', 'png', 'jpeg');
            if (in_array($exe, $extn)) {
                if (!empty($fetch['spic'])) {
                    unlink('./img/' . $fetch['spic']);
                }
                $p = rand(10000, 99999) . "." . $exe;
                $update = "UPDATE `student` SET `sname`='$sname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `scity`='$scity', `spic`='$p' WHERE `sid`='$sid'";
                $run = $conn->query($update);
                if ($run) {
                    move_uploaded_file($_FILES['spic']['tmp_name'], './img/' . $p);
                    echo json_encode(['message' => 'Data Updated with new pic', 'status' => 2]);
                } else {
                    echo json_encode(['message' => 'Data Not Updated: ' . $conn->error, 'status' => 3]);
                }
            } else {
                echo json_encode(['message' => 'Invalid Image!', 'status' => 4]);
            }
        } else {
            $update = "UPDATE `student` SET `sname`='$sname', `smobile`='$smobile', `scnic`='$scnic', `semail`='$semail', `scity`='$scity' WHERE `sid`='$sid'";
            $run = $conn->query($update);
            if ($run) {
                echo json_encode(['message' => 'Data Updated with old pic', 'status' => 2]);
            } else {
                echo json_encode(['message' => 'Data Not Updated: ' . $conn->error, 'status' => 3]);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'get' && isset($_POST['id'])) {
    // Delete item
    $sid = $_POST['id'];
    $run = $conn->query("SELECT * FROM `student` WHERE `sid` = $sid");
    $fetch = $run->fetch_assoc();
    echo json_encode(['sname' => $fetch['sname'], 'smobile' => $fetch['smobile'], 'scnic' => $fetch['scnic'], 'semail' => $fetch['semail'], 'scity' => $fetch['scity'], 'status' => true]);
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    // Delete item
    $sid = $_GET['id'];
    $run = $conn->query("SELECT * FROM `student` WHERE `sid` = $sid");
    $fetch = $run->fetch_assoc();
    $pic = $fetch['spic'];
    if (!empty($pic)) {
        unlink('./img/' . $pic);
    }
    $conn->query("DELETE FROM `student` WHERE `sid` = $sid");
    echo json_encode(['message' => 'Data deleted successfully!', 'status' => true]);
}
