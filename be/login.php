<?php
include "../be/dbinc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if the login is for admin
    if ($email === 'admin@lau-cs-club' && $password === 'admin') {
        // Set session variables for admin
        $_SESSION['email'] = 'admin@123';
        $_SESSION['user_name'] = 'Admin';
        $_SESSION['logged-in'] = true;
        $_SESSION['is_admin'] = true;

        // Redirect to admin dashboard
        header("Location: ../fe/admin-dashboard.php");
        exit;
    }

    // Regular user login process
    try {
        $pdo = getConnection();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['logged-in'] = true;
                $_SESSION['is_admin'] = false;

                // Redirect to user dashboard
                header("Location: ../fe/index.php");
                exit;
            } else {
                header("Location: ../fe/login-page.php?error=incorrect_password");
                exit;
            }
        } else {
            header("Location: ../fe/login-page.php?error=user_not_found");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: ../fe/login-page.php?error=unknown_error");
        exit;
    }
} else {
    echo "<p>Invalid request method</p>";
}
