<?php
// $con=new mysqli("localhost","root","","pos_shop");

// if (!$con) {
//     die(mysqli_error($con));
// }
class Database{
    private $con;
    public function __construct($hostname, $username, $password, $database)
    {
        $this->con = new mysqli($hostname, $username, $password, $database);

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }

    public function query($sql)
    {
        return $this->con->query($sql);
    }

    public function escapeString($str)
    {
        return $this->con->real_escape_string($str);
    }

    public function close()
    {
        $this->con->close();
    }
}

$hostname = "localhost";
$username = "root";
$password = "";
$database = "pos_shop";

$db = new Database($hostname, $username, $password, $database);
?>