<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'BowWow';

// Establish connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

function signupUser($name, $location, $email, $password) {
    global $conn; // Access the global connection variable
    
    $name = $conn->real_escape_string($name);
    $location = $conn->real_escape_string($location);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (Name, location, email, password) VALUES ('$name', '$location', '$email', '$hashedPassword')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

?>
