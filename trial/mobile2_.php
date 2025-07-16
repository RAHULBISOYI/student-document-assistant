<?php
include("../login_System/partial/db_connect.php");  // Include your connection file

$name = $_POST['name'];
$student_id = $_POST['student_id'];
$email = $_POST['email'];
$seized_item = $_POST['seized_item'];
$seizure_reason = $_POST['seizure_reason'];
$return_reason = $_POST['return_reason'];

$sql = "INSERT INTO seized_item_requests (name, student_id, email, seized_item, seizure_reason, return_reason) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $student_id, $email, $seized_item, $seizure_reason, $return_reason);

// Execute and check if insertion was successful
if ($stmt->execute()) {
    // Get the last inserted ID
    $resume_id = $stmt->insert_id;
    
    // Redirect to resume display page with the ID
    header("Location: mobile2.php?id=" . $resume_id);
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
