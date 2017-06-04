<?php
// Create connection
$conn = new mysqli("sql8.freemysqlhosting.net", "sql8128538", "823TWl4xY9",3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>