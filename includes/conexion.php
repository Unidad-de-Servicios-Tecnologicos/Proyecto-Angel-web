<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_encuestas";

// Creamos la conexión
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con, "utf8");

// Verificamos la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    // echo "Conexión exitosa";
}

class Connection
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "sistema_encuestas";
    private $conn;

    public function getConn()
    {
        if (!$this->conn) {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            if (!$this->conn) {
                die("Error en la base de datos");
            }
        }


        return $this->conn;
    }

    public function closeConn()
    {
        $this->getConn()->close();
    }
}
