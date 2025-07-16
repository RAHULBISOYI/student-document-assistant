<?php
include("../login_System/partial/db_connect.php");  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $name = $_POST['name'];
    $job_title = $_POST['job_title'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $contact = $_POST['contact'];
    $introduction = $_POST['introduction'];
    $career_progression = $_POST['career_progression'];
    $certifications = $_POST['certifications'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    
    // Handling image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO resumes (name, job_title, education, skills, contact, introduction, career_progression, certifications, phone, address, website, email, github, linkedin, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $name, $job_title, $education, $skills, $contact, $introduction, $career_progression, $certifications, $phone, $address, $website, $email, $github, $linkedin, $target_file);

    if ($stmt->execute()) {
        echo "<script>alert('Resume saved successfully!'); window.location.href='resume_display.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
