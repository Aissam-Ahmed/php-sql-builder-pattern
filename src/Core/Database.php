<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        $host     = $_ENV['DB_HOST'];
        $dbname   = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // die("Database Connected \n");
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query(string $sql): array
    {
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
