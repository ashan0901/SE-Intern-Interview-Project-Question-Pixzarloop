<?php

/*
 * This class manages user-related operations such as adding, deleting, 
 * updating, and listing users. It follows the Single Responsibility Principle
 * by encapsulating all user management functionality.
 */
class UserManager
{
    private $conn;

    //Constructor to initialize the database connection.
    public function __construct($conn)
    {
        //Error Handling 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    //Adds a new user to the database.
    public function addUser($user)
    {
        $sql = "INSERT INTO users (name, email, role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        /*
        Prepared statements ($stmt->bind_param) are used to prevent 
        SQL injection attacks, replacing the vulnerable string 
        concatenation in SQL queries.
         */
        $stmt->bind_param("sss", $user['name'], $user['email'], $user['role']);
        $stmt->execute();

        //Simple Error Handling
        if ($stmt->affected_rows > 0) {
            echo "User added successfully";
        } else {
            echo "Failed to add user";
        }

        $stmt->close();
    }

    /*
     Method Separation
     
     The operations (addUser, deleteUser, updateUser, listUsers) are 
     separated into different methods, making the code more modular and easier to maintain. 
     This change adheres to the Open/Closed Principle (OCP), as the class is open for 
     extension but closed for modification.
     */

    //Deletes a user from the database based on user ID.
    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "User deleted successfully";
        } else {
            echo "Failed to delete user";
        }

        $stmt->close();
    }


    //Updates an existing user's details in the database.
    public function updateUser($user)
    {
        $sql = "UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $user['name'], $user['email'], $user['role'], $user['id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "User updated successfully";
        } else {
            echo "Failed to update user";
        }

        $stmt->close();
    }

    
    //Lists all users in the database.
    public function listUsers()
    {
        $sql = "SELECT id, name, email, role FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . " - Role: " . $row["role"] . "<br>";
            }
        } else {
            echo "No users found";
        }
    }
}

// Example usage

// Establishing the database connection
$conn = new mysqli("localhost", "username", "password", "database");

//Error Handling
try{
    // Creating an instance of UserManager with the database connection
$userManager = new UserManager($conn);

// Sample user data for demonstration
$user = array(
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'role' => 'admin'
);

// Adding the user to the database
$userManager->addUser($user);
}catch (Exception $e) {
    echo "An unexpected error occurred. Please try again later.";
}
