<?php
include "dbinc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location: ../fe/index.php?contact=error#contact");
        exit;
    }

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO contactus (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        header("Location: ../fe/index.php?contact=success#contact");
        exit;
    } catch (PDOException $e) {
        header("Location: ../fe/index.php?contact=db_error#contact");
        exit;
    }
} else {
    header("Location: ../fe/index.php?contact=invalid_request#contact");
    exit;
}
