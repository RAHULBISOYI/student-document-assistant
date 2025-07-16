<?php
require_once '../login_System/partial/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $required = ['name', 'email', 'phone', 'summary', 'skills', 'experience', 'education'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            die("Error: Required field '$field' is missing.");
        }
    }

    // Handle file upload
    $profile_pic = 'default_avatar.jpg'; // Default profile picture
    if (!empty($_FILES["profile_pic"]["name"])) {
        $target_dir = "uploads/";
        $max_size = 2 * 1024 * 1024;
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        // Create directory if needed
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Validate file type
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $detected_type = finfo_file($file_info, $_FILES["profile_pic"]["tmp_name"]);
        
        if (!in_array($detected_type, $allowed_types)) {
            die("Error: Only JPG, PNG, and GIF files are allowed.");
        }

        if ($_FILES["profile_pic"]["size"] > $max_size) {
            die("Error: File too large. Maximum size is 2MB.");
        }

        // Generate unique filename
        $extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            $profile_pic = $target_file;
        } else {
            die("Error uploading file.");
        }
    }

    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
    $linkedin = filter_var($_POST['linkedin'] ?? '', FILTER_SANITIZE_URL);
    $github = filter_var($_POST['github'] ?? '', FILTER_SANITIZE_URL);
    $summary = htmlspecialchars($_POST['summary']);
    $skills = htmlspecialchars($_POST['skills']);
    $experience = htmlspecialchars($_POST['experience']);
    $education = htmlspecialchars($_POST['education']);
    $projects = htmlspecialchars($_POST['projects'] ?? '');
    $certifications = htmlspecialchars($_POST['certifications'] ?? '');

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {
        // Check if the email already exists
        $checkSql = "SELECT email FROM reesumes WHERE email = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();
        $exists = $checkStmt->num_rows > 0;
        $checkStmt->close();

        if ($exists) {
            // Update existing record
            $sql = "UPDATE reesumes SET 
                        name = ?, phone = ?, profile_pic = ?, linkedin = ?, github = ?, 
                        summary = ?, skills = ?, experience = ?, education = ?, 
                        projects = ?, certifications = ? 
                    WHERE email = ?";
        } else {
            // Insert new record
            $sql = "INSERT INTO reesumes (
                        name, email, phone, profile_pic, linkedin, github, 
                        summary, skills, experience, education, projects, certifications
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        }

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        if ($exists) {
            $stmt->bind_param("ssssssssssss", 
                $name, $phone, $profile_pic, $linkedin, $github, 
                $summary, $skills, $experience, $education, 
                $projects, $certifications, $email);
        } else {
            $stmt->bind_param("ssssssssssss", 
                $name, $email, $phone, $profile_pic, $linkedin, $github, 
                $summary, $skills, $experience, $education, 
                $projects, $certifications);
        }

        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        echo "Resume saved successfully!";
        header("Location: resume.php?email=" . urlencode($email));
        exit();
        
        
    } catch (Exception $e) {
        die("Error: " . $e->getMessage()); // Show detailed error message
    } finally {
        if (isset($stmt)) $stmt->close();
        $conn->close();
    }
}
?>
