<?php
include "../dbinc.php";
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merchId = intval($_POST['merch_id']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM merch WHERE id = :id");
        $stmt->bindParam(':id', $merchId);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?deletion=success#merch");
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?deletion=error#merch");
    }
} else {
    header("Location: ../../fe/admin-dashboard.php?deletion=invalid_request#merch");
}
