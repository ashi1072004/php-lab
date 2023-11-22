<?php
include('./config.php');

$obj = new Query();
// $condition = array('sname' => 'Ammara', 'sage' => 23, 'scity' => 'FSD');
$condition = array('sname' => 'Rabia', 'sage' => 22);
// $result = $obj->getData('student', '*', $condition, 'sid', 'asc', 7);
// $result = $obj->insertData('student', $condition);
// $result = $obj->deleteData('student', $condition);
$result = $obj->updateData('student', $condition, 'sid', 14);
echo "<pre>";
print_r($result);
echo "</pre>";
