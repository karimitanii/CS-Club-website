<?php
include "../dbinc.php";
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if (isset($_GET['id'])) {
    $eventId = intval($_GET['id']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = :id");
        $stmt->bindParam(':id', $eventId);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php#events");
        exit;
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php#events?error=db_error");
        exit;
    }
} else {
    header("Location: ../../fe/admin-dashboard.php#events?error=missing_id");
    exit;
}
?>
