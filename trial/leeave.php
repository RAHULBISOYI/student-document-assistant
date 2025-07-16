<?php
// Include database connection file
include("../login_System/partial/db_connect.php");  
// Change this to your actual connection file

// Change this to your actual connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];
    $stay_location = $_POST['stay_location'];

    // Prepare SQL statement
    $sql = "INSERT INTO leeave_applications (name, student_id, email, leave_type, start_date, end_date, reason, stay_location) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $student_id, $email, $leave_type, $start_date, $end_date, $reason, $stay_location);

    // Execute query
    if ($stmt->execute()) {
        // Get the last inserted ID
        $leave_id = $stmt->insert_id;

        // Redirect to the mobile2.php page with the leave_id in the URL
        header("Location: leave.php?id=" . $leave_id);
        exit(); // Ensure the rest of the code does not execute
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
