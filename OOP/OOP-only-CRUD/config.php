<?php
class Database
{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect()
    {
        $this->host = 'localhost';
        $this->dbusername = 'root';
        $this->dbpassword = '';
        $this->dbname = 'test';
        $conn = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
        return $conn;
    }
}

class Query extends Database
{
    public function getData($table, $field = '*', $condition, $order_by_field = '', $order_by_type = 'asc', $limit = '')
    {
        $sql = "SELECT $field FROM `$table` ";
        if ($condition != '') {
            $sql .= " WHERE ";
            $c = count($condition);
            $x = 1;
            foreach ($condition as $key => $val) {
                if ($x == $c) {
                    $sql .= " `$key` = '$val' ";
                } else {
                    $sql .= " `$key` = '$val' AND ";
                }
                $x++;
            }
        }
        if ($order_by_field != '') {
            $sql .= " ORDER BY `$order_by_field` $order_by_type ";
        }
        if ($limit != '') {
            $sql .= " LIMIT $limit";
        }
        // die($sql);
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }
        return 0;
    }
    public function insertData($table, $condition)
    {
        if ($condition != '') {
            foreach ($condition as $key => $val) {
                $fieldArr[] = $key;
                $valArr[] = $val;
            }
            $field = implode("`,`", $fieldArr);
            $value = implode("','", $valArr);
            $sql = "INSERT INTO `$table`(`$field`) VALUES ('$value') ";
            // die($sql);
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
    public function deleteData($table, $condition)
    {
        if ($condition != '') {
            $sql = "DELETE FROM `$table` WHERE ";
            $c = count($condition);
            $x = 1;
            foreach ($condition as $key => $val) {
                if ($x == $c) {
                    $sql .= " `$key` = '$val' ";
                } else {
                    $sql .= " `$key` = '$val' AND ";
                }
                $x++;
            }
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
    public function updateData($table, $condition, $field, $value)
    {
        if ($condition != '') {
            $sql = "UPDATE `$table` SET ";
            $c = count($condition);
            $x = 1;
            foreach ($condition as $key => $val) {
                if ($x == $c) {
                    $sql .= " `$key` = '$val' ";
                } else {
                    $sql .= " `$key` = '$val', ";
                }
                $x++;
            }
            $sql .= " WHERE `$field` = '$value' ";
            // die($sql);
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
    public function get_safe_str($str)
    {
        if ($str != '') {
            return mysqli_real_escape_string($this->connect(), $str);
        }
    }
}
