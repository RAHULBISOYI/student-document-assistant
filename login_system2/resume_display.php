<?php
include("../login_System/partial/db_connect.php");

$sql = "SELECT * FROM resumes ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Process array-based fields
$skills = explode(',', $row["skills"]);
$certifications = explode(',', $row["certifications"]);
$career_progression = explode("\n", $row["career_progression"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Themed Resume</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #f4f4f4; display: flex; justify-content: center; padding: 40px; }
        .resume-container { 
            width: 850px; 
            background-color: rgb(249, 254, 255); 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
            display: flex; 
            flex-direction: column; 
            overflow: hidden; 
            min-height: 1000px; 
            padding-bottom: 30px;
        }
        .header { 
            background: linear-gradient(to right, #1a3e72, #2563eb); 
            color: white; 
            padding: 40px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
        }
        .header h1 { font-size: 32px; font-weight: bold; }
        .header p { font-size: 18px; }
        .profile-pic { width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 4px solid white; }
        .profile-pic img { width: 100%; height: 100%; object-fit: cover; }
        .content { display: flex; flex-wrap: wrap; }
        .left-section { width: 35%; background: #e0e8f9; padding: 30px; }
        .right-section { width: 65%; padding: 30px; }
        .section-title { font-size: 20px; font-weight: bold; color: #1a3e72; margin-bottom: 10px; border-bottom: 3px solid #2563eb; padding-bottom: 5px; }
        .skills ul, .certifications ul { list-style: none; padding-left: 0; }
        .skills ul li, .certifications ul li { font-size: 14px; color: #333; margin-bottom: 5px; }
        .education p, .contact p { font-size: 14px; color: #333; margin-bottom: 5px; }
        .career-item { margin-bottom: 20px; }
        .career-item h3 { font-size: 16px; font-weight: bold; color: #1a3e72; }

        /* Download Button Styles */
        .download-container { 
            display: flex; 
            justify-content: center; 
            margin-top: auto; 
            padding: 20px 0; 
        }
        .download-btn { 
            background-color: #2563eb; 
            color: white; 
            font-size: 16px; 
            font-weight: bold; 
            padding: 12px 24px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            box-shadow: 2px 2px 10px rgba(0,0,0,0.2); 
            transition: 0.3s;
        }
        .download-btn:hover { background-color: #1a3e72; }
    </style>
</head>
<body>
    <div class="resume-container">
        <div class="header">
            <div>
                <h1><?= $row["name"] ?></h1>
                <p><?= $row["job_title"] ?></p>
            </div>
            <?php if (!empty($row["image_path"])): ?>
            <div class="profile-pic">
                <img src="<?= $row['image_path'] ?>" alt="Profile Picture">
            </div>
            <?php endif; ?>
        </div>
        <div class="content">
            <div class="left-section">
                <div class="section skills">
                    <div class="section-title">Skills</div>
                    <ul>
                        <?php foreach ($skills as $skill): ?>
                        <li>* <?= trim($skill) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="section education">
                    <div class="section-title">Education</div>
                    <p>🎓 <?= nl2br($row["education"]) ?></p>
                </div>
                <div class="section contact">
                    <div class="section-title">Contact</div>
                    <?php if (!empty($row["phone"])) : ?><p>📞 <?= $row["phone"] ?></p><?php endif; ?>
                    <?php if (!empty($row["address"])) : ?><p>📍 <?= $row["address"] ?></p><?php endif; ?>
                    <?php if (!empty($row["website"])) : ?><p>🌐 <a href="<?= $row["website"] ?>" target="_blank"><?= $row["website"] ?></a></p><?php endif; ?>
                    <?php if (!empty($row["email"])) : ?><p>✉️ <a href="mailto:<?= $row["email"] ?>"><?= $row["email"] ?></a></p><?php endif; ?>
                </div>
            </div>
            <div class="right-section">
                <div class="section">
                    <div class="section-title">Introduction</div>
                    <p><?= nl2br($row["introduction"]) ?></p>
                </div>
                <div class="section career">
                    <div class="section-title">Career Progression</div>
                    <?php foreach ($career_progression as $career_item): if (trim($career_item)): ?>
                    <div class="career-item">
                        <h3>🔹 <?= trim($career_item) ?></h3>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
                <div class="section certifications">
                    <div class="section-title">Certifications</div>
                    <ul>
                        <?php foreach ($certifications as $certification): ?>
                        <li>🔹 <?= trim($certification) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="download-container">
            <button class="download-btn" onclick="window.print()">📄 Download as PDF</button>
        </div>
    </div>
</body>
</html>
