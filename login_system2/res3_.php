<?php
include("../login_System/partial/db_connect.php");  // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $required = ['name', 'job_title', 'education', 'work_year1'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            die("Error: Required field '$field' is missing.");
        }
    }

    // Sanitize user input
    $name = htmlspecialchars(trim($_POST["name"]));
    $job_title = htmlspecialchars(trim($_POST["job_title"]));
    $education = htmlspecialchars(trim($_POST["education"]));
    $education_year = htmlspecialchars(trim($_POST["work_year1"]));
    $about_me = nl2br(htmlspecialchars(trim($_POST["about_me"] ?? '')));
    $career_progression = htmlspecialchars(trim($_POST["work1"] ?? ''));
    
    // Convert skills and certifications to JSON format for easy storage
    $skills = json_encode(array_filter(array_map('trim', explode(",", $_POST["skills"] ?? ''))));
    $certifications = json_encode(array_filter(array_map('trim', explode(",", $_POST["languages"] ?? ''))));
    
    $phone = htmlspecialchars(trim($_POST["phone"] ?? ''));
    $address = htmlspecialchars(trim($_POST["address"] ?? ''));
    $website = htmlspecialchars(trim($_POST["website"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $github = htmlspecialchars(trim($_POST["github"] ?? ''));
    $linkedin = htmlspecialchars(trim($_POST["linkedin"] ?? ''));

    // Prepare SQL query
    $sql = "INSERT INTO resumess (name, job_title, education, education_year, about_me, career_progression, skills, certifications, phone, address, website, email, github, linkedin)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $name, $job_title, $education, $education_year, $about_me, $career_progression, $skills, $certifications, $phone, $address, $website, $email, $github, $linkedin);

    // Execute query and handle response
    if ($stmt->execute()) {
        // Get the last inserted resume ID
        $resume_id = $stmt->insert_id;
        
        // Redirect to resume display page with the ID
        header("Location: res3.php?id=" . $resume_id);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
