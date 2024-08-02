<?php
// Establish database connection (similar to your existing PHP script)
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_benefits";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Generate HTML for displaying user details in a table
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead><tr><th>Email</th><th>Name</th><th>Role</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . (isset($row['role']) ? $row['role'] : 'Role not specified') . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No users found</p>';
}

// Close database connection
$conn->close();
?>
