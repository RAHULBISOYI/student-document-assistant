<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Fill in Your Details</h2>
    <form action="save_resume.php" method="post">
        <input type="text" id="name" name="name" placeholder="Full Name" oninput="updatePreview()" required><br>
        <input type="email" id="email" name="email" placeholder="Email" oninput="updatePreview()" required><br>
        <input type="text" id="phone" name="phone" placeholder="Phone" oninput="updatePreview()" required><br>
        <textarea id="education" name="education" placeholder="Education" oninput="updatePreview()"></textarea><br>
        <textarea id="experience" name="experience" placeholder="Work Experience" oninput="updatePreview()"></textarea><br>
        <textarea id="skills" name="skills" placeholder="Skills" oninput="updatePreview()"></textarea><br>
        <button type="submit">Save Resume</button>
    </form>

    <h2>Live Resume Preview</h2>
    <div id="resume-preview">
        <h3 id="preview-name">Your Name</h3>
        <p><strong>Email:</strong> <span id="preview-email">your@email.com</span></p>
        <p><strong>Phone:</strong> <span id="preview-phone">123456789</span></p>
        <p><strong>Education:</strong> <span id="preview-education">Your education details</span></p>
        <p><strong>Experience:</strong> <span id="preview-experience">Your work experience</span></p>
        <p><strong>Skills:</strong> <span id="preview-skills">Your skills</span></p>
    </div>

    <script>
        function updatePreview() {
            document.getElementById('preview-name').textContent = document.getElementById('name').value;
            document.getElementById('preview-email').textContent = document.getElementById('email').value;
            document.getElementById('preview-phone').textContent = document.getElementById('phone').value;
            document.getElementById('preview-education').textContent = document.getElementById('education').value;
            document.getElementById('preview-experience').textContent = document.getElementById('experience').value;
            document.getElementById('preview-skills').textContent = document.getElementById('skills').value;
        }
    </script>
</body>
</html>
