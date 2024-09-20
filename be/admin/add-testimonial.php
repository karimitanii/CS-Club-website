<?php
include "../dbinc.php"; // Include your database connection file
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $position = trim($_POST['position']);
    $image = trim($_POST['image']);
    $testimonial = trim($_POST['testimonial']);

    // Validate inputs
    if (empty($name) || empty($position) || empty($image) || empty($testimonial)) {
        header("Location: ../../fe/admin-dashboard.php?error=missing_fields#add-testimonial");
        exit;
    }

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO testimonials (name, position, image, test) VALUES (:name, :position, :image, :testimonial)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':testimonial', $testimonial);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?testimonial=added#add-testimonial");
        exit;
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?error=db_error#add-testimonial");
        exit;
    }
} else {
    header("Location: ../../fe/admin-dashboard.php#add-testimonial");
    exit;
}
