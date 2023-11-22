<?php
$conn = new mysqli("localhost", "root", "", "test2");
if ($conn) {
    // echo "connected";
} else {
    die("Connection failed: " . $conn->connect_error);
}
