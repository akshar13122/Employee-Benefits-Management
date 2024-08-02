<?php
include 'db.php';

$email = $_POST['email'];
$points = (int)$_POST['points'];

$sql = "UPDATE users SET points = points + $points WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
    echo "Points updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
