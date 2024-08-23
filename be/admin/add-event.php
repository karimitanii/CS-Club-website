<?php
include "../dbinc.php"; // Adjusted path to dbinc.php
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = trim($_POST['image']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Validate inputs
    if (empty($image) || empty($title) || empty($description)) {
        header("Location: ../fe/admin-dashboard.php?error=missing_fields"); // Adjusted path to admin-dashboard.php
        exit;
    }

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO events (image, title, description, users_registered) VALUES (:image, :title, :description, 0)");
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?event=added"); // Adjusted path to admin-dashboard.php
        exit;
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?error=db_error"); // Adjusted path to admin-dashboard.php
        exit;
    }
} else {
    header("Location: ../fe/admin-dashboard.php"); // Adjusted path to admin-dashboard.php
    exit;
}
?>
