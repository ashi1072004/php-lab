<?php
$conn = mysqli_connect("localhost", "root", "", "test2");
// echo var_dump($conn);
if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}
