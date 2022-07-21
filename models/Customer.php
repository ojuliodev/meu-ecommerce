<?php

require_once(__DIR__ . '/../classes/Database.php');

class Customer extends Database{
    private $stmt, $sql, $conn, $table;

    public function __construct()
    {
        $this->conn = parent::conn();

        $this->table = 'customer';
    }

    public function create($data)
    {   
        try {
            $this->setSql("INSERT INTO {$this->table} (name, email, password) VALUES ('". $data['name'] . "', '". $data['email'] . "', '". md5($data['password']) . "')");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function read()
    {

    }

    public function login($data)
    {
        try {
            $this->setSql("SELECT * from " . $this->table . " WHERE email = '{$data['email']}' and password = '". md5($data['password']) . "' ");

            $this->stmt = $this->conn->prepare($this->getSql());
    
            $this->stmt->execute();

            if ($this->stmt->columnCount()) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function readById($id)
    {
        try {
            $this->setSql("SELECT * from " . $this->table . " WHERE customer_id = $id ");

            $this->stmt = $this->conn->prepare($this->getSql());
    
            $this->stmt->execute();

            return $this->stmt->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function setSql($sql) {
        $this->sql = $sql;
    }

    public function getSql() {
        return $this->sql;
    }
}