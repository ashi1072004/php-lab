<?php
$conn = mysqli_connect("localhost", "root", "", "video-downloader");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
