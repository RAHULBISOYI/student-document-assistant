<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $job_title = htmlspecialchars(trim($_POST['job_title']));
    $education = nl2br(htmlspecialchars(trim($_POST['education'])));
    $skills = array_map('trim', explode(',', $_POST['skills']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $introduction = nl2br(htmlspecialchars(trim($_POST['introduction'])));
    $career_progression = explode("\n", trim($_POST['career_progression']));
    $certifications = array_map('trim', explode(',', $_POST['certifications']));
    $website = htmlspecialchars(trim($_POST['website'] ?? ''));
    $github = htmlspecialchars(trim($_POST["github"] ?? ''));
$linkedin = htmlspecialchars(trim($_POST["linkedin"] ?? ''));

    // Handle image upload
    $profile_pic = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $file_name = uniqid() . '_' . basename($_FILES['profile_pic']['name']);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $max_size = 2 * 1024 * 1024;

        if (in_array($imageFileType, $allowed_types)) {
            if ($_FILES['profile_pic']['size'] <= $max_size) {
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                    $profile_pic = $target_file;
                }
            }
        }
    }
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
                    <h1><?= $name ?></h1>
                    <p><?= $job_title ?></p>
                </div>
                <?php if ($profile_pic): ?>
                <div class="profile-pic">
                    <img src="<?= $profile_pic ?>" alt="Profile Picture">
                </div>
                <?php endif; ?>
            </div>
            <div class="content">
                <div class="left-section">
                    <div class="section skills">
                        <div class="section-title">Skills</div>
                        <ul>
                            <?php foreach ($skills as $skill): ?>
                            <li>*<?= $skill ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="section education">
                        <div class="section-title">Education</div>
                       <p> 🎓 <?= $education ?></p>
                    </div>
                    <div class="section contact">
    <div class="section-title">Contact</div>
    <?php if (!empty($phone)) : ?><p>📞 <?= $phone ?></p><?php endif; ?>
    <?php if (!empty($address)) : ?><p>📍 <?= $address ?></p><?php endif; ?>
    <?php if (!empty($website)) : ?><p>🌐 <a href="<?= $website ?>" target="_blank"><?= $website ?></a></p><?php endif; ?>
    <?php if (!empty($email)) : ?><p>✉️ <a href="mailto:<?= $email ?>"><?= $email ?></a></p><?php endif; ?>
    <?php if (!empty($github)) : ?><p>🐙 GitHub: <a href="<?= $github ?>" target="_blank"><?= $github ?></a></p><?php endif; ?>
    <?php if (!empty($linkedin)) : ?><p>🔗 LinkedIn: <a href="<?= $linkedin ?>" target="_blank"><?= $linkedin ?></a></p><?php endif; ?>
</div>

                </div>
                <div class="right-section">
                    <div class="section">
                        <div class="section-title">Introduction</div>
                        <p><?= $introduction ?></p>
                    </div>
                    <div class="section career">
                        <div class="section-title">Career Progression</div>
                        <?php foreach ($career_progression as $career_item): if (trim($career_item)): ?>
                        <div class="career-item">
                            <h3>🔹<?= trim($career_item) ?></h3>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                    <div class="section certifications">
                        <div class="section-title">Certifications</div>
                        <ul>
                            <?php foreach ($certifications as $certification): ?>
                            <li>🔹<?= $certification ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Download PDF Button at the Bottom -->
            <div class="download-container">
                <button class="download-btn" onclick="window.print()">📄 Download as PDF</button>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: index_l2.html");
    exit();
}
?>
