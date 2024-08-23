<?php
include "dbinc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Get the logged-in user's ID
    $nationality = trim($_POST['nationality']);
    $mobile = trim($_POST['mobile']);
    $profession = trim($_POST['profession']);

    $pdo = getConnection();

    $stmt = $pdo->prepare("UPDATE users SET nationality = :nationality, mobile_number = :mobile, profession = :profession WHERE id = :id");
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':profession', $profession);
    $stmt->bindParam(':id', $userId);

    if ($stmt->execute()) {
        // Update session variables if needed
        $_SESSION['nationality'] = $nationality;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['profession'] = $profession;

        // Redirect back to profile page with success message
        header("Location: ../fe/index.php?update=success");
    } else {
        // Redirect back with an error message
        header("Location: ../fe/index.php?update=error");
    }
}
?>
