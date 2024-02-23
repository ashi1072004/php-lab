<?php
include("connection.php");
// Load links
if (isset($_GET['action']) && $_GET['action'] == 'load') {
    $type = $_GET['type'];
    $output = '';
    $id = 0;
    $get_links = "SELECT * FROM `links` WHERE `ltype`='$type' ";
    $run_links = mysqli_query($con, $get_links);
    while ($row = mysqli_fetch_assoc($run_links)) {
        $output .= '
            <tr>
                <td>' . ++$id . '</td>
                <td>' . $row['link'] . '</td>
                <td>' . $row['ldate'] . '</td>
                <td><button type="button" class="link del border-0" data-id="' . $row['lid'] . '">Delete</button></td>
            </tr>';
    }
    echo $output;
}
