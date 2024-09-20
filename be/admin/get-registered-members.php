<?php
include "../dbinc.php";
session_start();

if (isset($_GET['event_id'])) {
    $eventId = intval($_GET['event_id']);

    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT users_registered FROM events WHERE id = :id");
        $stmt->bindParam(':id', $eventId);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event) {
            $usersRegistered = json_decode($event['users_registered'], true);
            if (!empty($usersRegistered)) {
                echo '<form id="attendanceForm" action="../be/admin/record-attendance.php" method="POST">';
                echo '<input type="hidden" name="event_id" value="' . $eventId . '">';
                echo '<h4>Members Registered:</h4>';
                echo '<ul class="list-group">';
                foreach ($usersRegistered as $user) {
                    echo '<li class="list-group-item">';
                    echo 'Member ID: ' . htmlspecialchars($user['user_id']) . '<br>';
                    echo 'Name: ' . htmlspecialchars($user['name']) . '<br>';
                    echo 'Email: ' . htmlspecialchars($user['email']) . '<br>';
                    echo 'Mobile: ' . htmlspecialchars($user['mobile']) . '<br>';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" name="attendance[]" value="' . $user['user_id'] . '" id="attendance_' . $user['user_id'] . '">';
                    echo '<label class="form-check-label" for="attendance_' . $user['user_id'] . '">Attended</label>';
                    echo '</div>';
                    echo '</li>';
                }
                echo '</ul>';
                echo '</form>';
            } else {
                echo '<p>No members have registered for this event yet.</p>';
            }
        } else {
            echo '<p>Event not found.</p>';
        }
    } catch (PDOException $e) {
        echo '<p>Error retrieving registered members: ' . $e->getMessage() . '</p>';
    }
}
