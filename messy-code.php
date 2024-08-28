<?php

function manageUser($u, $op, $conn)
{
    if ($op == 'add') {
        $sql = "INSERT INTO users (name, email, role) VALUES ('" . $u['name'] . "', '" . $u['email'] . "', '" . $u['role'] . "')";
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User added";
        }
    } elseif ($op == 'delete') {
        $sql = "DELETE FROM users WHERE id=" . $u['id'];
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User deleted";
        }
    } elseif ($op == 'update') {
        $sql = "UPDATE users SET name='" . $u['name'] . "', email='" . $u['email'] . "', role='" . $u['role'] . "' WHERE id=" . $u['id'];
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User updated";
        }
    } elseif ($op == 'list') {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . " - Role: " . $row["role"] . "<br>";
            }
        } else {
            echo "No users found";
        }
    } else {
        echo "Invalid operation";
    }
}

// Example usage
$conn = new mysqli("localhost", "username", "password", "database");

$user = array(
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'role' => 'admin'
);

manageUser($user, 'add', $conn);