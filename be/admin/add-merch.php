<?php
include "../dbinc.php";
session_start();

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
        header("Location: ../../fe/admin-dashboard.php?error=missing_fields#add-merch");
        exit;
    }

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO merch (image, title, description) VALUES (:image, :title, :description)");
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?merch=added#add-merch");
        exit;
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?error=db_error#add-merch");
        exit;
    }
} else {
    header("Location: ../../fe/admin-dashboard.php#add-merch");
    exit;
}
