<?php

require_once(__DIR__ . '/../classes/Database.php');

class Product extends Database
{
    private $stmt, $sql, $conn, $table;

    public function __construct() 
    {
        $this->conn = parent::conn();
        $this->table = "product";
    }

    public function create(array $data): bool
    {
        return true;
    }

    public function read(): array
    {
        try {
            $this->setSql("SELECT * from {$this->table}");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function update(array $data): bool
    {
        return true;
    }

    public function delete(int $id): bool
    {
        return true;
    }

    public function setSql($sql): void
    {
        $this->sql = $sql;
    }


    public function getSql(): string
    {
        return $this->sql;
    }
}
