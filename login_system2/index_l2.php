<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00C4CC, #6200EA);
            display: flex;
            justify-content: center;
            padding: 40px;
        }
        .form-container {
            width: 500px;
            background: rgb(200, 209, 210);
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1a3e72;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Resume Form</h2>
        <form action="res2_.php" method="post" enctype="multipart/form-data">

        
        <label>Profile Picture:</label>
        <input type="file" name="profile_pic" accept="image/*">

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" required>

            <label for="education">Education</label>
            <input type="text" id="education" name="education" required>

            <label for="skills">Skills (comma-separated)</label>
            <input type="text" id="skills" name="skills" required>

            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" required>

            <label for="introduction">Introduction</label>
            <textarea id="introduction" name="introduction" rows="3" required></textarea>

            <label for="career_progression">Career Progression</label>
            <textarea id="career_progression" name="career_progression" rows="3" required></textarea>

            <label for="certifications">Certifications</label>
            <input type="text" id="certifications" name="certifications" required>

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Address:</label>
            <input type="text" name="address">

            <label>Website:</label>
            <input type="text" name="website">

            <label>Email:</label>
            <input type="email" name="email">

            <label>GitHub Profile:</label>
            <input type="text" name="github" placeholder="Enter your GitHub URL">

            <label>LinkedIn Profile:</label>
            <input type="text" name="linkedin" placeholder="Enter your LinkedIn URL">

            <button type="submit" name="save">Save Resume</button>
        </form>
    </div>
</body>
</html>
