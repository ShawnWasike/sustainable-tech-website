<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $submission_date = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, message, submission_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $message, $submission_date]);

    header("Location: contact.php?status=success");
    exit();
}
?>