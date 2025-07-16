<?php
include("../login_System/partial/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $table = $_POST['table'];

    // Sanitize inputs
    $id = intval($id);
    $allowedTables = ['rasumes', 'resumes', 'resumess', 'reesumes', 'seized_item_requests','leeave_applications']; // ✅ Added seized_item_requests
    if (!in_array($table, $allowedTables)) {
        echo "Invalid table";
        exit;
    }

    // Delete query
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
