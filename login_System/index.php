<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {  background: linear-gradient(135deg, #00C4CC, #6200EA); }
        .container { max-width: 600px; margin: 20px auto; background: rgb(200, 209, 210); padding: 20px; border-radius: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Resume Builder</h2>
    
    <!-- Updated form with enctype for file uploads -->
    <form method="POST" action="resume_.php" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>

        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>

        <label>Phone:</label>
        <input type="text" name="phone" class="form-control" required>

        <label>Profile Picture:</label>
        <input type="file" name="profile_pic" class="form-control" accept="image/*" required>

        <label>LinkedIn Url:  like ,alex-johnson-832b062b9</label>
        <input type="text" name="linkedin" class="form-control">

        <label>GitHub:</label>
        <input type="text" name="github" class="form-control">

        <label>Summary:</label>
        <textarea name="summary" class="form-control" required></textarea>

        <label>Skills:</label>
        <textarea name="skills" class="form-control" required></textarea>

        <label>Experience:</label>
        <textarea name="experience" class="form-control" required></textarea>

        <label>Education:</label>
        <textarea name="education" class="form-control" required></textarea>

        <label>Projects:</label>
        <textarea name="projects" class="form-control"></textarea>

        <label>Certifications:</label>
        <textarea name="certifications" class="form-control"></textarea>

        <button type="submit" class="btn btn-primary mt-3 w-100">Generate Resume</button>
    </form>
</div>

</body>
</html>
