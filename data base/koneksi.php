<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_latihan_pbo_trpl1b_irma_siti_wahyuni";

    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}

?>