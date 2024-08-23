<?php


function ensureLoggedIn() {
    if (!isset($_SESSION['logged-in'])) {
        header('Location: login-page.php'); // Ensure this path is correct
        exit;
    }
}
?>
