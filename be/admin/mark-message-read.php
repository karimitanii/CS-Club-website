<?php
include "../dbinc.php";
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messageId = intval($_POST['message_id']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("UPDATE contactus SET markasread = 1 WHERE id = :id");
        $stmt->bindParam(':id', $messageId);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?messages=updated#messages");
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?error=db_error#messages");
        exit;
    }
} else {
    header("Location: ../../fe/admin-dashboard.php");
    exit;
}
