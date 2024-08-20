<?php

header("Content-Type: application/json; charset=UTF-8");

include_once 'dbinc.php';

$database = getConnection();


function debugOutput($message) {
    error_log($message); 
    echo $message; 
}

// Retrieve records GET METHOD
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        $query = "SELECT * FROM users_ids WHERE Email = :email";
        $stmt = $database->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if ($num > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            http_response_code(200);
            debugOutput(json_encode($data));
        } else {
            http_response_code(404);
            debugOutput(json_encode(array("message" => "No records found.")));
        }
    } else {
        http_response_code(400);
        debugOutput(json_encode(array("message" => "Email parameter missing.")));
    }
    die;
}

// Update records PUT METHOD
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['old_email']) && isset($data['First_Name']) && isset($data['Last_Name']) && isset($data['Email']) && isset($data['Skills']) && isset($data['Education']) && isset($data['Graduation_Date']) && isset($data['Experience']) && isset($data['Address'])) {
        $old_email = $data['old_email'];
        $firstname = $data['First_Name'];
        $lastname = $data['Last_Name'];
        $email = $data['Email'];
        $skills = json_encode($data['Skills']);
        $education = $data['Education'];
        $graduationDate = $data['Graduation_Date'];
        $experience = $data['Experience'];
        $address = $data['Address'];

        $query = "UPDATE users_ids SET First_Name = :firstname, Last_Name = :lastname, Email = :email, Skills = :skills, Education = :education, Graduation_Date = :graduationDate, Experience = :experience, Address = :address WHERE Email = :old_email";

        $stmt = $database->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':education', $education);
        $stmt->bindParam(':graduationDate', $graduationDate);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':old_email', $old_email);

        if ($stmt->execute()) {
            http_response_code(200);
            debugOutput(json_encode(array("message" => "Record updated successfully.")));
        } else {
            http_response_code(500);
            debugOutput(json_encode(array("message" => "Failed to update record.")));
        }
    } else {
        http_response_code(400);
        debugOutput(json_encode(array("message" => "Incomplete data.")));
    }
    die;
}

// Delete records DELETE METHOD 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['email'])) {
        $email = $data['email'];

        $query = "DELETE FROM users_ids WHERE Email = :email";
        $stmt = $database->prepare($query);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            http_response_code(200);
            debugOutput(json_encode(array("message" => "Record deleted successfully.")));
        } else {
            http_response_code(500);
            debugOutput(json_encode(array("message" => "Failed to delete record.")));
        }
    } else {
        http_response_code(400);
        debugOutput(json_encode(array("message" => "Email parameter missing.")));
    }
    die;
}

// Create records
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        isset($data['First_Name']) && !empty($data['First_Name']) &&
        isset($data['Last_Name']) && !empty($data['Last_Name']) &&
        isset($data['Email']) && !empty($data['Email']) &&
        isset($data['Skills']) && !empty($data['Skills']) &&
        isset($data['Password']) && !empty($data['Password']) &&
        isset($data['Education']) && !empty($data['Education']) &&
        isset($data['Graduation_Date']) && !empty($data['Graduation_Date']) &&
        isset($data['Experience']) && !empty($data['Experience']) &&
        isset($data['Address']) && !empty($data['Address'])
    ) {
        $firstname = $data['First_Name'];
        $lastname = $data['Last_Name'];
        $email = $data['Email'];
        $skills = json_encode($data['Skills']);
        $password = $data['Password'];
        $education = $data['Education'];
        $graduationDate = $data['Graduation_Date'];
        $experience = $data['Experience'];
        $address = $data['Address'];

        // Check if email already exists
        $checkQuery = "SELECT COUNT(*) FROM users_ids WHERE Email = :email";
        $checkStmt = $database->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        $emailExists = $checkStmt->fetchColumn();

        if ($emailExists) {
            http_response_code(409); // Conflict
            echo json_encode(array("message" => "Email already exists."));
            die;
        }

        $query = "INSERT INTO users_ids (First_Name, Last_Name, Email, Skills, Password, Education, Graduation_Date, Experience, Address) VALUES (:firstname, :lastname, :email, :skills, :password, :education, :graduationDate, :experience, :address)";

        $stmt = $database->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':education', $education);
        $stmt->bindParam(':graduationDate', $graduationDate);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':address', $address);

        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode(array("message" => "Record created successfully."));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Failed to create record."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Incomplete data."));
    }
    die;
}
?>