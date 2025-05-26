<?php
// Vul hier je databasegegevens in
$host = 'localhost';
$dbname = 'talent_show';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Remove or comment out in production
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution if connection fails
}
?>