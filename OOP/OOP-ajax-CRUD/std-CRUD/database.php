<?php
class Database
{
    private $host = 'localhost';
    private $dbuser = 'root';
    private $dbpassword = '';
    private $dbname = 'project2';
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
                $sql .= " INNER JOIN $join ";
            }
            if ($where != null) {
                $sql .= " WHERE $where ";
            }
            if ($order != null) {
                $sql .= " ORDER BY `$order` ";
            }
            if ($limit != null) {
                $url = $_SERVER['HTTP_REFERER'];
                $url_components = parse_url($url);
                parse_str($url_components['query'], $params);
                if (isset($params['page'])) {
                    $page = $params['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit";
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

    public function pagination($table, $join = null, $where = null, $limit = null)
    {
        if ($this->tableExists($table)) {
            if ($limit != null) {
                $sql = "SELECT COUNT(*) FROM `$table` ";
                if ($join != null) {
                    $sql .= " INNER JOIN $join ";
                }
                if ($where != null) {
                    $sql .= " WHERE $where ";
                }
                // die($sql);
                $query = $this->conn->query($sql);
                $res = $query->fetch_array();
                $res = $res[0];
                $t = ceil($res / $limit);

                $url = basename($_SERVER['PHP_SELF']);
                // $url = basename($_SERVER['HTTP_REFERER']);
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $output = "<ul class='pagination'>";
                if ($page > 1) {
                    $output .= "<li><a href='$url?page=" . ($page - 1) . "'>Previous</a></li>";
                }
                if ($res > $limit) {
                    for ($i = 1; $i <= $t; $i++) {
                        if ($i == $page)
                            $output .= "<li><a  class='active' href='$url?page=$i'>$i</a></li>";
                        else
                            $output .= "<li><a href='$url?page=$i'>$i</a></li>";
                    }
                }
                if ($t > $page) {
                    $output .= "<li><a href='$url?page=" . ($page + 1) . "'>Next</a></li>";
                }
                $output .= "</ul>";
                return $output;
            }
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
        }
    }

    public function escapeString($data)
    {
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $this->conn->real_escape_string($data);
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
