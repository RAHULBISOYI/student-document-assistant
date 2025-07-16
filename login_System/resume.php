<?php
session_start();
include("../login_System/partial/db_connect.php");

// Initialize variables
$name = $email = $phone = $linkedin = $github = $summary = "";
$skills = $experience = $education = $projects = $certifications = "";
$profile_pic = "https://via.placeholder.com/120"; // Default profile picture

// 📌 Handle Form Submission (POST Request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $linkedin = htmlspecialchars($_POST["linkedin"]);
    $github = htmlspecialchars($_POST["github"]);
    $summary = htmlspecialchars($_POST["summary"]);
    $skills = htmlspecialchars($_POST["skills"]);
    $experience = htmlspecialchars($_POST["experience"]);
    $education = htmlspecialchars($_POST["education"]);
    $projects = htmlspecialchars($_POST["projects"]);
    $certifications = htmlspecialchars($_POST["certifications"]);

    // Handle Profile Picture Upload
    $target_dir = "uploads/";  
    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

    if (!empty($_FILES["profile_pic"]["name"])) { 
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
        $profile_pic = $target_file;
    }

    // ✅ Redirect to GET request with email
    header("Location: resume.php?email=" . urlencode($email));
    exit();
}

// 📌 Fetch Resume from Database (GET Request)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_GET['email'];

    try {
        $stmt = $conn->prepare("SELECT name, phone, profile_pic, linkedin, github, summary, skills, experience, education, projects, certifications FROM reesumes WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) die("Resume not found.");
        $row = $result->fetch_assoc();

        // Assign fetched data
        $name = htmlspecialchars($row["name"]);
        $phone = htmlspecialchars($row["phone"]);
        $profile_pic = htmlspecialchars($row["profile_pic"]) ?: 'default_avatar.jpg';
        $linkedin = htmlspecialchars($row["linkedin"]);
        $github = htmlspecialchars($row["github"]);
        $summary = nl2br(htmlspecialchars($row["summary"]));
        $skills = htmlspecialchars($row["skills"]);
        $experience = nl2br(htmlspecialchars($row["experience"]));
        $education = nl2br(htmlspecialchars($row["education"]));
        $projects = htmlspecialchars($row["projects"]);
        $certifications = htmlspecialchars($row["certifications"]);

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        die("Error loading resume: " . $e->getMessage());
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    die("Invalid email address.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume | <?= $name ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f4f4; }
        .resume-container { max-width: 800px; background: white; padding: 20px; margin: 30px auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px; }
        .profile-pic { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #007bff; }
        h2, h3 { color: #007bff; }
        .section-title { border-bottom: 2px solid #007bff; padding-bottom: 5px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="resume-container">
    <div class="text-center">
        <img src="<?= $profile_pic ?>" alt="Profile Picture" class="profile-pic">
        <h2><?= $name ?></h2>
        <p><strong>Student | Aspiring Developer</strong></p>
    </div>

    <hr>

    <div class="mb-4">
        <h3 class="section-title">Contact Information</h3>
        <p><strong>Email:</strong> <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
        <p><strong>Phone:</strong> <?= $phone ?></p>
        <p><strong>LinkedIn:</strong> <a href="<?= $linkedin ?>" target="_blank"><?= $linkedin ?></a></p>
        <p><strong>GitHub:</strong> <a href="<?= $github ?>" target="_blank"><?= $github ?></a></p>
    </div>

    <div class="mb-4">
        <h3 class="section-title">Summary</h3>
        <p><?= $summary ?></p>
    </div>

    <div class="mb-4">
        <h3 class="section-title">Skills</h3>
        <ul>
            <?php foreach (explode("\n", $skills) as $skill) { echo "<li>$skill</li>"; } ?>
        </ul>
    </div>

    <div class="mb-4">
        <h3 class="section-title">Experience</h3>
        <p><?= $experience ?></p>
    </div>

    <div class="mb-4">
        <h3 class="section-title">Education</h3>
        <p><?= $education ?></p>
    </div>

    <?php if (!empty($projects)) : ?>
    <div class="mb-4">
        <h3 class="section-title">Projects</h3>
        <ul>
            <?php foreach (explode("\n", $projects) as $project) { echo "<li>$project</li>"; } ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if (!empty($certifications)) : ?>
    <div class="mb-4">
        <h3 class="section-title">Certifications</h3>
        <ul>
            <?php foreach (explode("\n", $certifications) as $cert) { echo "<li>$cert</li>"; } ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.print()">Download PDF</button>
    </div>
</div>

</body>
</html>
