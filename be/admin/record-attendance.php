<?php
include "../dbinc.php";
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $memberId = intval($_POST['member_id']);
    $email = trim($_POST['email']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id AND email = :email");
        $stmt->bindParam(':id', $memberId);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $newAttendanceCount = $user['events_attended'] + 1;

            $updateStmt = $pdo->prepare("UPDATE users SET events_attended = :new_count WHERE id = :id");
            $updateStmt->bindParam(':new_count', $newAttendanceCount);
            $updateStmt->bindParam(':id', $memberId);
            $updateStmt->execute();

            header("Location: ../../fe/admin-dashboard.php?attendance=success#attendance");
        } else {
            header("Location: ../../fe/admin-dashboard.php?attendance=error_user_not_found#attendance");
        }
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?attendance=db_error#attendance");
    }
} else {
    header("Location: ../../fe/admin-dashboard.php?attendance=invalid_request#attendance");
}
