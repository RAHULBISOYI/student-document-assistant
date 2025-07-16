<?php
include("../login_System/partial/db_connect.php");

if (!isset($_GET['id'])) {
    die("Error: Resume ID not provided.");
}

$resume_id = intval($_GET['id']);

// Fetch resume from database
$sql = "SELECT * FROM resumess WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $resume_id);
$stmt->execute();
$result = $stmt->get_result();
$resume = $result->fetch_assoc();

// Check if resume exists
if (!$resume) {
    die("Error: Resume not found.");
}

// Decode JSON fields (skills, certifications)
$skills = json_decode($resume["skills"], true);
$certifications = json_decode($resume["certifications"], true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - <?= $resume['name'] ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(135deg, #f5f7fa, #c3cfe2); padding: 50px; }
        .resume-container {
            display: flex;
            max-width: 950px;
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            min-height: 1200px;
            border-left: 5px solid rgb(49, 37, 182);
            border-right: 5px solid rgb(49, 37, 182);
        }
        .left-section {
            width: 50%;
            background: rgb(24, 20, 148);
            color: white;
            padding: 35px;
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        .left-section h2 {
            font-size: 40px;
            font-weight: bold;
        }
        .right-section {
            width: 45%;
            padding: 45px;
            display: flex;
            flex-direction: column;
        }
        .section-title { font-size: 28px; font-weight: bold; border-bottom: 3px solid white; padding-bottom: 6px; margin-top: 25px; text-align: left; }
        .blue-line { width: 360px; height: 5px; background-color: rgb(49, 37, 182); margin: 12px 0; }
        .content { font-size: 18px; line-height: 1.8; color: #444; text-align: justify; margin-bottom: 15px; }
        .career-box { margin-top: 25px; }
        .download-container { display: flex; justify-content: center; margin-top: auto; padding: 20px 0; }
        .download-btn { background-color: #2563eb; color: white; font-size: 16px; font-weight: bold; padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); transition: 0.3s; }
        .download-btn:hover { background-color: #1a3e72; }
    </style>
</head>
<body>
    <div class="resume-container">
        <div class="left-section">
            <h2><?= $resume['name'] ?></h2>
            <p><?= $resume['job_title'] ?></p>
            <?php if (!empty($skills)) : ?>
                <div class="section-title">Skills</div>
                <ul>
                    <?php foreach ($skills as $skill) : ?>
                        <li>✔ <?= $skill ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <h3 class="section-title">Education</h3>
            <p>🎓 <?= $resume['education'] ?> (<?= $resume['education_year'] ?>)</p>
        </div>
        <div class="right-section">
            <h1>Introduction</h1>
            <div class="blue-line"></div>
            <p class="content"> <?= $resume['about_me'] ?> </p>
            <h3>Career Progression</h3>
            <div class="blue-line"></div>
            <p><?= $resume['career_progression'] ?></p>
            <h3>Certifications</h3>
            <div class="blue-line"></div>
            <ul>
                <?php if (!empty($certifications)) : ?>
                    <?php foreach ($certifications as $cert) : ?>
                        <li>🌍 <?= $cert ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No certifications listed.</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="download-container">
            <button class="download-btn" onclick="window.print()">📄 Download as PDF</button>
        </div>
    </div>
</body>
</html>
