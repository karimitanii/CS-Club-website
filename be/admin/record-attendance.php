<?php
include "../dbinc.php";
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = intval($_POST['event_id']);
    $attendedMembers = $_POST['attendance'];

    if (!empty($attendedMembers)) {
        try {
            $pdo = getConnection();

            foreach ($attendedMembers as $memberId) {
                // Fetch user by ID
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
                $stmt->bindParam(':id', $memberId);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Increment the attendance count for the user
                    $newAttendanceCount = $user['events_attended'] + 1;

                    // Update the user's attendance
                    $updateStmt = $pdo->prepare("UPDATE users SET events_attended = :new_count WHERE id = :id");
                    $updateStmt->bindParam(':new_count', $newAttendanceCount);
                    $updateStmt->bindParam(':id', $memberId);
                    $updateStmt->execute();
                }
            }

            header("Location: ../../fe/admin-dashboard.php?attendance=success#attendance");
        } catch (PDOException $e) {
            header("Location: ../../fe/admin-dashboard.php?attendance=db_error#attendance");
        }
    } else {
        header("Location: ../../fe/admin-dashboard.php?attendance=no_selection#attendance");
    }
} else {
    header("Location: ../../fe/admin-dashboard.php?attendance=invalid_request#attendance");
}
