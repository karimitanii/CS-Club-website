<?php
include "../dbinc.php"; // Include your database connection file
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../../fe/login-page.php");
    exit;
}

if (isset($_GET['id'])) {
    $testimonialId = intval($_GET['id']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id = :id");
        $stmt->bindParam(':id', $testimonialId);
        $stmt->execute();

        header("Location: ../../fe/admin-dashboard.php?testimonial=deleted#delete-testimonial");
        exit;
    } catch (PDOException $e) {
        header("Location: ../../fe/admin-dashboard.php?error=db_error#delete-testimonial");
        exit;
    }
} else {
    header("Location: ../../fe/admin-dashboard.php?error=invalid_request#delete-testimonial");
    exit;
}
