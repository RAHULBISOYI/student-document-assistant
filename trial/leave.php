<?php
// Include the database connection file
include("../login_System/partial/db_connect.php");  // Adjust this path to match your actual file

// Check if the `id` parameter is passed in the URL
if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Prepare the SQL query to fetch the leave application details based on the leave_id
    $sql = "SELECT * FROM leeave_applications WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $leave_id);
    
    // Execute the query
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($id, $name, $student_id, $email, $leave_type, $start_date, $end_date, $reason, $stay_location, $submitted_at);

    // Fetch the data
    if ($stmt->fetch()) {
        // Data is fetched successfully, now you can display it on the page
        $leave_details = [
            'name' => $name,
            'student_id' => $student_id,
            'email' => $email,
            'leave_type' => $leave_type,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'reason' => $reason,
            'stay_location' => $stay_location
        ];
    } else {
        // If no data found for the given leave_id
        echo "Leave application not found!";
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    // If no leave_id is passed in the URL
    echo "Invalid request!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application | <?= htmlspecialchars($leave_details['name']) ?></title>
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
    <h2 class="text-center">College Leave Application</h2>
    <hr>

    <div class="mb-3">
        <h3 class="section-title">Applicant Details</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($leave_details['name']) ?></p>
        <p><strong>Student ID:</strong> <?= htmlspecialchars($leave_details['student_id']) ?></p>
        <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($leave_details['email']) ?>"><?= htmlspecialchars($leave_details['email']) ?></a></p>
    </div>

    <div class="mb-3">
        <h3 class="section-title">Leave Details</h3>
        <p><strong>Leave Type:</strong> <?= htmlspecialchars($leave_details['leave_type']) ?></p>
        <p><strong>Start Date:</strong> <?= htmlspecialchars($leave_details['start_date']) ?></p>
        <p><strong>End Date:</strong> <?= htmlspecialchars($leave_details['end_date']) ?></p>
        <p><strong>Reason:</strong> <?= htmlspecialchars($leave_details['reason']) ?></p>
        <p><strong>Stay Location:</strong> <?= htmlspecialchars($leave_details['stay_location']) ?></p>
    </div>

    <div class="mb-3">
        <h3 class="section-title">Leave Request Confirmation</h3>
        <p>
            I hereby request approval for my leave from <strong><?= htmlspecialchars($leave_details['start_date']) ?></strong> to <strong><?= htmlspecialchars($leave_details['end_date']) ?></strong>. 
            If granted, I will stay at <strong><?= htmlspecialchars($leave_details['stay_location']) ?></strong> during this period. I assure that I will complete all my pending work 
            and assignments after returning.
        </p>
    </div>

    <?php if (!empty($uploaded_file)) : ?>
    <div class="mb-3">
        <h3 class="section-title">Uploaded Document</h3>
        <p><a href="<?= htmlspecialchars($uploaded_file) ?>" target="_blank">View Attached File</a></p>
    </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.print()">Download PDF</button>
    </div>
</div>

</body>
</html>
