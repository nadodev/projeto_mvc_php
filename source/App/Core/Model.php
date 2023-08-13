<?php
namespace Source\App\Core;

use PDO;
use RuntimeException;

class Model {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function find($table, $conditions = []) {
        $sql = "SELECT * FROM $table";
        if (!empty($conditions)) {
            $where = implode(' AND ', array_map(function ($field, $value) {
                return "$field = :$field";
            }, array_keys($conditions), $conditions));
            $sql .= " WHERE $where";
        }

        $stmt = $this->db->prepare($sql);

        try {
            $stmt->execute($conditions);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new RuntimeException("Error while fetching data: " . $e->getMessage());
        }
    }

    public function save($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        $stmt = $this->db->prepare($sql);

        try {
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            throw new RuntimeException("Error while saving data: " . $e->getMessage());
        }
    }
    public function verifyEmailById(string $table, string $email) {
        $sql = "SELECT COUNT(*) FROM $table WHERE email = :email";
        
        $stmt = $this->db->prepare($sql);
    
    
        try {
            $stmt->execute(['email' => $email]);
            $count = $stmt->fetchColumn();
            return $count ;
        } catch (\PDOException $e) {
            throw new RuntimeException("Error while verifying email: " . $e->getMessage());
        }
    }

}
