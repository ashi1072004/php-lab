<?php
$conn = new mysqli("localhost", "root", "", "test2");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `student`";
$run = $conn->query($sql);
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} else {
    echo "No Record Found";
}

$conn->close();
