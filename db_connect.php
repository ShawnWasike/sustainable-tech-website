<?php
$host = 'localhost';
$dbname = 'sustainable_tech';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>