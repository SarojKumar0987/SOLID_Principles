<?php
class Database {
    private $host = 'localhost';       
    private $db_name = 'solid_crud'; 
    private $username = 'root';         
    private $password = '';
    private $conn;

    public function getConnection() {
        if ($this->conn === null) {
            try {
                // Create a new PDO connection
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",
                                      $this->username,
                                      $this->password);
                // Set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
                exit();
            }
        }
        return $this->conn;
    }
}
?>
