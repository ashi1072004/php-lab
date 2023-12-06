<?php
class Database
{
    private $host = 'localhost';
    private $dbuser = 'root';
    private $dbpassword = '';
    private $dbname = 'test';
    private $conn = false;
    private $res = array();

    public function __construct()
    {
        if (!$this->conn) {
            $this->conn = new mysqli($this->host, $this->dbuser, $this->dbpassword, $this->dbname);
            if ($this->conn->connect_error) {
                array_push($this->res, $this->conn->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    private function tableExists($table)
    {
        $sql = "SHOW TABLES FROM `$this->dbname` LIKE '$table'";
        $run = $this->conn->query($sql);
        if ($run) {
            if ($run->num_rows == 1) {
                return true;
            } else {
                array_push($this->res, $table . " doesn't exist.");
                return false;
            }
        }
    }

    public function getRes()
    {
        $val = $this->res;
        $this->res = array();
        return $val;
    }

    public function insert($table, $params = array())
    {
        if ($this->tableExists($table)) {
            // print_r($params);
            $cols = implode("`, `", array_keys($params));
            $vals = implode("', '", $params);
            $sql = "INSERT INTO `$table`(`$cols`) VALUES('$vals')";
            if ($this->conn->query($sql)) {
                array_push($this->res, $this->conn->insert_id);
            } else {
                array_push($this->res, $this->conn->error);
            }
        }
    }

    public function sql($sql)
    {
        $query = $this->conn->query($sql);
        if ($query) {
            array_push($this->res, $query->fetch_all(MYSQLI_ASSOC));
        } else {
            array_push($this->res, $this->conn->error);
        }
    }

    public function select($table, $field = '*', $join = null, $where = null, $order = null, $limit = null)
    {
        if ($this->tableExists($table)) {
            $sql = "SELECT $field FROM `$table` ";
            if ($join != null) {
                $sql .= " JOIN `$join` ";
            }
            if ($where != null) {
                $sql .= " WHERE $where ";
            }
            if ($order != null) {
                $sql .= " ORDER BY `$order` ";
            }
            if ($limit != null) {
                $sql .= " LIMIT 0, $limit";
            }
            // die($sql);
        }
        $query = $this->conn->query($sql);
        if ($query) {
            array_push($this->res, $query->fetch_all(MYSQLI_ASSOC));
        } else {
            array_push($this->res, $this->conn->error);
        }
    }

    public function delete($table, $where = null)
    {
        if ($this->tableExists($table) && $where != null) {
            $sql = "DELETE FROM `$table` WHERE $where ";
            // die($sql);
            if ($this->conn->query($sql)) {
                array_push($this->res, $this->conn->affected_rows);
            } else {
                array_push($this->res, $this->conn->error);
            }
        }
    }
    public function update($table, $params = array(), $where = null)
    {
        if ($this->tableExists($table)) {
            // print_r($params);
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "`$key` = '$value'";
            }
            $sql = "UPDATE `$table` SET " . implode(", ", $args);
            if ($where != null)
                $sql .= " WHERE $where ";
            // die($sql);
            if ($this->conn->query($sql)) {
                array_push($this->res, $this->conn->affected_rows);
            } else {
                array_push($this->res, $this->conn->error);
            }
            // $sql .= " WHERE `$field` = '$value' ";
        }
    }

    public function __destruct()
    {
        if (!$this->conn) {
            return false;
        } else {
            if ($this->conn->close()) {
                $this->conn = false;
                return true;
            }
        }
    }
}
