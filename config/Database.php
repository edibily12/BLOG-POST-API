<?php

class Database
{
    private string $host = "localhost";
    private string $username = "admin";
    private string $password = "@Mansoln1996";
    private string $database = "blog";
    private mysqli $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }


    public function query($sql): \mysqli_result|bool
    {
        // Perform the query
        return $this->connection->query($sql);
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public function closeConnection(): void
    {
        $this->connection->close();
    }
}
