<?php
include "./database.php";
$obj = new Database();

// $params = ['sname' => 'Noor Fatima', 'smobile' => '+1 (379) 875-9843', 'scnic' => '13798759843', 'semail' => 'example@mailinator.com', 'scity' => 'FSD', 'sdate' => date("Y/m/d")];
$params = ['scity' => 'FSD'];
// $obj->insert('student', $params);
// $obj->update('student', $params, "`sid`='21'");
// $obj->delete('student', "`sid`='21'");
// $obj->sql("SELECT * FROM `student`");
$obj->select('student', '*');
echo "Result: ";
print_r($obj->getRes());
