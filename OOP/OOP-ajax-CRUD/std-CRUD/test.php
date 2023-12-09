<?php
include "./database.php";
$obj = new Database();

// $params = ['sname' => 'Noor Fatima', 'smobile' => '+1 (379) 875-9843', 'scnic' => '13798759843', 'semail' => 'example@mailinator.com', 'scity' => 'FSD', 'sdate' => date("Y/m/d")];
$params = ['scity' => 'FSD'];
// $obj->insert('student', $params);
// $obj->update('student', $params, "`sid`='21'");
// $obj->delete('student', "`sid`='21'");
// $obj->sql("SELECT * FROM `student`");
$join = '`teacher` ON std.teachid = teacher.tid  INNER JOIN `classtime` ON std.classtime=classtime.ctid';
$obj->select('std', '*', $join, null, null, 10);
$res = $obj->getRes();
echo "<table border='2' cellpadding='2px' width='500px' style='border-collapse:collapse'>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Pic</th>
            <th>Email</th>
            <th>Mobile #</th>
            <th>CNIC</th>
            <th>Teacher Name</th>
            <th>Class</th>
            <th>Class Time</th>
        </tr>";
foreach ($res as $key1 => $val1) {
    foreach ($val1 as $key2 => $val2) {
        echo "<tr>
                <td>$val2[sid]</td>
                <td>$val2[sname]</td>
                <td><img src='./std CRUD/img/$val2[spic]' width='50px' height='50px' alt='Not found'></td>
                <td>$val2[semail]</td>
                <td>$val2[smobile]</td>
                <td>$val2[scnic]</td>
                <td>$val2[tname]</td>
                <td>$val2[cname]</td>
                <td>$val2[cttime]</td>
            </tr>";
    }
}
echo "</table>";
$obj->pagination('std', $join, null, 10);
// echo "Result: ";
// echo '<pre>';
// print_r($res);
// echo '</pre>';