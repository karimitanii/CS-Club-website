<?php
include "../be/dbinc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $pdo = getConnection();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];

                $_SESSION['logged-in'] = true;

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
