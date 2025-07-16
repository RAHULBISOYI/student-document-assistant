<?php
include("../login_System/partial/db_connect.php");

if (!isset($_GET["id"])) {
    die("Error: Resume ID not provided.");
}

$resume_id = $_GET["id"];

// Fetch Resume Data
$stmt = $conn->prepare("SELECT * FROM rasumes WHERE id = ?");
$stmt->bind_param("i", $resume_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Error: Resume not found.");
}

$row = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Assign values from database
$name = $row["name"];
$job_title = $row["job_title"];
$edu1 = $row["edu1"];
$year1 = $row["year1"];
$edu2 = $row["edu2"];
$year2 = $row["year2"];
$work1 = $row["work1"];
$about_me = $row["about_me"];
$work_year1 = $row["work_year1"];
$skills = explode(",", $row["skills"]);
$languages = explode(",", $row["languages"]);
$address = $row["address"];
$website = $row["website"];
$email = $row["email"];
$github = $row["github"];
$linkedin = $row["linkedin"];
$profile_pic = $row["profile_pic"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Resume</title>
    <style>
        /* Same CSS as before */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #f4f4f4; display: flex; justify-content: center; padding: 40px; }
        .resume-container { width: 800px; background-color: white; padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); min-height: 1100px; }
        .header {
            background-color: rgb(191, 209, 198);
            padding: 20px;
            border-bottom: 2px solid rgb(56, 200, 157);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }  
        .header h1 { font-size: 28px; font-weight: bold; color: #333; }
        .header p { font-size: 18px; color: #666; }
        .profile-pic { width: 100px; height: 100px; overflow: hidden; display: flex; align-items: center; justify-content: center; }
        .profile-pic img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; }
        .section { margin-top: 20px; }
        .section-title { font-size: 20px; font-weight: bold; color: #333; margin-bottom: 10px; border-bottom: 2px solid #ccc; padding-bottom: 5px; }
        .contact p { font-size: 14px; color: #555; margin-bottom: 5px; display: flex; align-items: center; gap: 8px; }
        .btn { background-color: #2563eb; color: white; font-size: 16px; font-weight: bold; padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; }
        .btn:hover { background-color: #1a3e72; }
    </style>
</head>
<body>
    <div class="resume-container">
        <div class="header">
            <div>
                <h1><?= htmlspecialchars($name) ?></h1>
                <p><?= htmlspecialchars($job_title) ?></p>
            </div>
            <?php if (!empty($profile_pic)) : ?>
                <div class="profile-pic">
                    <img src="<?= htmlspecialchars($profile_pic) ?>" alt="Profile Picture">
                </div>
            <?php endif; ?>
        </div>

        <div class="section">
            <div class="section-title">Education</div>
            <p>🎓 <?= htmlspecialchars($edu1) ?> (<?= htmlspecialchars($year1) ?>)</p>
            <?php if (!empty($edu2)) : ?>
                <p>🎓 <?= htmlspecialchars($edu2) ?> (<?= htmlspecialchars($year2) ?>)</p>
            <?php endif; ?>
        </div>

        <?php if (!empty($about_me)) : ?>
        <div class="section">
            <div class="section-title">About Me</div>
            <p><?= nl2br(htmlspecialchars($about_me)) ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($work1)) : ?>
        <div class="section">
            <div class="section-title">Work Experience</div>
            <p><?= htmlspecialchars($work1) ?> (<?= htmlspecialchars($work_year1) ?>)</p>
        </div>
        <?php endif; ?>

        <?php if (!empty($skills)) : ?>
        <div class="section">
            <div class="section-title">Skills</div>
            <ul>
                <?php foreach ($skills as $skill) : ?>
                    <li>✔ <?= htmlspecialchars($skill) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($languages)) : ?>
        <div class="section">
            <div class="section-title">Certifications</div>
            <ul>
                <?php foreach ($languages as $language) : ?>
                    <li>✔ <?= htmlspecialchars($language) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="section contact">
            <div class="section-title">Contact</div>
            <?php if (!empty($address)) : ?><p>📍 <?= htmlspecialchars($address) ?></p><?php endif; ?>
            <?php if (!empty($website)) : ?><p>🌐 <a href="<?= htmlspecialchars($website) ?>" target="_blank"><?= htmlspecialchars($website) ?></a></p><?php endif; ?>
            <?php if (!empty($email)) : ?><p>✉ <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a></p><?php endif; ?>
            <?php if (!empty($github)) : ?><p>🐙 GitHub: <a href="<?= htmlspecialchars($github) ?>" target="_blank"><?= htmlspecialchars($github) ?></a></p><?php endif; ?>
            <?php if (!empty($linkedin)) : ?><p>🔗 LinkedIn: <a href="<?= htmlspecialchars($linkedin) ?>" target="_blank"><?= htmlspecialchars($linkedin) ?></a></p><?php endif; ?>
        </div>

        <div class="text-center">
            <button class="btn" onclick="window.print()">Download PDF</button>
        </div>
    </div>
</body>
</html>
