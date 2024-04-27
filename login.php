<?php
// Database connection details
$servername = "sql6.freesqldatabase.com";
$username = "sql6702372";
$password = "your_database_password"; // You must replace this with your actual database password
$dbname = "sql6702372";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data from form
$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM credentials WHERE username=? AND password=?");
$stmt->bind_param("ss", $user, $pass);

// Execute and check if the user exists
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid username or password!";
}

$stmt->close();
$conn->close();
?>
