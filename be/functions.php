<?php
include "dbinc.php";
session_start();

// Function to retrieve all user data
function getUserData($userId) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to calculate user rank and the next rank details
function calculateUserRank($eventsAttended) {
    if ($eventsAttended < 5) {
        $currentRank = "Bronze";
        $nextRank = "Silver";
        $eventsToNextRank = 5;
    } elseif ($eventsAttended < 10) {
        $currentRank = "Silver";
        $nextRank = "Gold";
        $eventsToNextRank = 10;
    } elseif ($eventsAttended < 20) {
        $currentRank = "Gold";
        $nextRank = "Platinum";
        $eventsToNextRank = 20;
    } elseif ($eventsAttended < 30) {
        $currentRank = "Gold";
        $nextRank = "Platinum";
        $eventsToNextRank = 30;
    } else {
        $currentRank = "Platinum";
        $nextRank = "Maxed Out"; // No more ranks
        $eventsToNextRank = $eventsAttended; // No more ranks
    }

    return [
        'currentRank' => $currentRank,
        'nextRank' => $nextRank,
        'eventsToNextRank' => $eventsToNextRank
    ];
}

// for leaderboard getting top 10 users 

function getTopUsers($limit = 10) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT name, events_attended FROM users ORDER BY events_attended DESC, id ASC LIMIT :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// Function to calculate the percentage progress to the next rank
function calculateProgressPercentage($eventsAttended, $eventsToNextRank) {
    return ($eventsAttended / $eventsToNextRank) * 100;
}

// Function to calculate age from date of birth
function calculateAge($birthday) {
    $birthDate = new DateTime($birthday);
    $currentDate = new DateTime();
    return $birthDate->diff($currentDate)->y;
}

