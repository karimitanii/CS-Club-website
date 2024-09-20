<?php
include "dbinc.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../fe/login-page.php");
    exit;
}

if (isset($_GET['event_id'])) {
    $eventId = intval($_GET['event_id']);
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];
    $userEmail = $_SESSION['email'];
    $userMobile = $_SESSION['mobile_number']; // Ensure this is correctly pulled from session

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT users_registered FROM events WHERE id = :id");
        $stmt->bindParam(':id', $eventId);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event) {
            $usersRegistered = json_decode($event['users_registered'], true);
            if (!$usersRegistered) {
                $usersRegistered = [];
            }

            // Check if the user is already registered
            $isAlreadyRegistered = false;
            foreach ($usersRegistered as $registeredUser) {
                if ($registeredUser['user_id'] == $userId) {
                    $isAlreadyRegistered = true;
                    break;
                }
            }

            if ($isAlreadyRegistered) {
                header("Location: ../fe/index.php?registration=already_registered#events");
                exit;
            }

            // Add user details to the list if not already registered
            $usersRegistered[] = [
                'user_id' => $userId,
                'name' => $userName,
                'email' => $userEmail,
                'mobile' => $userMobile // This should no longer be null
            ];

            // Update the event with the new registered users list
            $stmt = $pdo->prepare("UPDATE events SET users_registered = :users_registered WHERE id = :id");
            $stmt->bindParam(':users_registered', json_encode($usersRegistered));
            $stmt->bindParam(':id', $eventId);
            $stmt->execute();

            header("Location: ../fe/index.php?registration=success#events");
        } else {
            header("Location: ../fe/index.php?error=event_not_found#events");
        }
    } catch (PDOException $e) {
        header("Location: ../fe/index.php?error=db_error#events");
    }
} else {
    header("Location: ../fe/index.php?error=invalid_request#events");
}
