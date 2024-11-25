<?php
require_once '../config/Database.php';
require_once 'User.php';

class UserRepository {
    private $conn;

    // Constructor to initialize the connection
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection(); // Getting DB connection
    }

    // Method to create a new user
    public function create(User $user) {
        // Get user data
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $gender = $user->getGender();

        // SQL query to insert a new user into the database
        $query = "INSERT INTO users (name, email, phone, gender) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
    
        // Bind the parameters using bindParam
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $gender);
    
        // Execute the query and return true if the query was successful
        return $stmt->execute();
    }

    // Method to read all users from the database
    public function readAll() {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
    }

    // Method to update a user's information
    public function update(User $user) {
        // Get values from the user object
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $gender = $user->getGender();
        $id = $user->getId();

        // SQL query to update user information
        $query = "UPDATE users SET name = ?, email = ?, phone = ?, gender = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the parameters using bindParam
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $gender);
        $stmt->bindParam(5, $id);

        // Execute the query and return true if the query was successful
        return $stmt->execute();
    }

    // Method to delete a user by ID
    public function delete($id) {
        // SQL query to delete a user by ID
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Bind the ID parameter using bindParam
        $stmt->bindParam(1, $id);

        // Execute the query and return true if the query was successful
        return $stmt->execute();
    }
}
?>
