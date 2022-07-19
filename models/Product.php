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

    private function createFile($file, $id) {
        $extension = strtolower( substr($file['name'], -4) );

        $newName = $id . $extension;

        $destiny = __DIR__ . '/../assets/images/products/' . $newName;

        if (file_exists($destiny)) unlink($destiny);

        move_uploaded_file($file['tmp_name'], $destiny);

        return "products/$newName";
    }

    public function create($data)
    {
        try {
            $this->setSql("INSERT INTO " .DB_TABLE. " (category_id, name, description, special_price, price, slug) VALUES ('" . $data['category_id'] . "', '" . $data['name'] . "', '" . $data['description'] . "', '" . $data['special_price'] . "', '" . $data['price'] . "', '" . $data['slug'] . "')");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                $id = $this->conn->lastInsertId();

                $destiny = $this->createFile($_FILES['image'], $id);

                $this->updateByField($destiny, 'banner', $id);

                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            return $e->getMessage();
        }
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

    public function readById(int $id): array
    {
        try {
            $this->setSql("SELECT * FROM " .DB_TABLE. " WHERE product_id = {$id}");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetch();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function readBySlug(string $slug): array 
    {
        try {
            $this->setSql("SELECT * FROM " . DB_TABLE . " WHERE slug = '$slug'");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetch();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function update(array $data): bool
    {
        try {
            $this->setSql(
            "UPDATE " . DB_TABLE . "
                SET name = '{$data['name']}', category_id = {$data['category_id']}, description = '{$data['description']}', price = {$data['price']}, special_price = {$data['special_price']}, slug = '{$data['slug']}', status = {$data['status']}
            WHERE
                product_id = {$data['product_id']}
            ");

            $this->stmt = $this->conn->prepare($this->getSql());

            if (isset($_FILES)) {
                $id = $data['product_id'];

                $destiny = $this->createFile($_FILES['image'], $id);

                $this->updateByField($destiny, 'banner', $id);
            }

            if ($this->stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateByField($data, string $field, $productId): bool
    {
        try {
            $this->setSql(
            "UPDATE " . DB_TABLE . "
                SET $field = '$data'
            WHERE
                product_id = $productId
            ");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->setSql("DELETE FROM " . DB_TABLE . " WHERE product_id = $id");

            $this->stmt = $this->conn()->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
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
