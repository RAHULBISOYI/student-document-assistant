<?php
include("../login_System/partial/db_connect.php");

if (!isset($_GET['id'])) {
    die("Invalid request.");
}

$request_id = intval($_GET['id']);

$sql = "SELECT * FROM seized_item_requests WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $request_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Request not found.");
}

$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seized Item Request | <?= htmlspecialchars($row['name']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f4f4; }
        .container { max-width: 700px; background: white; padding: 20px; margin: 30px auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px; }
        h2, h3 { color: #007bff; }
        .section-title { border-bottom: 2px solid #007bff; padding-bottom: 5px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Seized Item Return Request</h2>
    <hr>

    <div class="mb-3">
        <h3 class="section-title">Student Details</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
        <p><strong>Student ID:</strong> <?= htmlspecialchars($row['student_id']) ?></p>
        <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></p>
    </div>

    <div class="mb-3">
        <h3 class="section-title">Seizure Details</h3>
        <p><strong>Seized Item:</strong> <?= htmlspecialchars($row['seized_item']) ?></p>
        <p><strong>Reason for Seizure:</strong> <?= nl2br(htmlspecialchars($row['seizure_reason'])) ?></p>
    </div>

    <div class="mb-3">
        <h3 class="section-title">Return Request</h3>
        <p><strong>Reason for Requesting Return:</strong> <?= nl2br(htmlspecialchars($row['return_reason'])) ?></p>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.print()">Download PDF</button>
    </div>
</div>

</body>
</html>
