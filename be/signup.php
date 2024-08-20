<?php
include "../be/dbinc.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collecting data
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['date_of_birth'];
    $nationality = trim($_POST['nationality']);
    $mobile_number = trim($_POST['mobile_number']);
    $profession = trim($_POST['profession']);

    // Validation
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password) || empty($dob) || empty($nationality) || empty($mobile_number) || empty($profession)) {
        $errors[] = "Please fill out all fields.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "<a href='../fe/registration.php'>Go back</a>";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store data into the database
    $pdo = getConnection();
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, dob, nationality, mobile_number, profession) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$full_name, $email, $hashed_password, $dob, $nationality, $mobile_number, $profession]);

    // Redirect after successful registration
    header("Location: ../fe/login-page.php");
    exit;
}
?>
