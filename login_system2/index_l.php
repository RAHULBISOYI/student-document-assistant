<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #00C4CC, #6200EA);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .form-container {
            background: rgb(200, 209, 210);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
        
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        
        textarea {
            resize: vertical;
            height: 80px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }
        
        button:hover {
            background: #218838;
        }

        input[type="file"] {
            border: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Resume Form</h2>
        <form action="res1_.php" method="post" enctype="multipart/form-data">
            <label>Profile Picture:</label>
            <input type="file" name="profile_pic" accept="image/*">
            
            <label>Full Name:</label>
            <input type="text" name="name" required>
            
            <label>Job Title:</label>
            <input type="text" name="job_title" required>
            
            <label>Education 1:</label>
            <input type="text" name="edu1" required>
            <label>Year:</label>
            <input type="text" name="year1" required>
            
            <label>Education 2:</label>
            <input type="text" name="edu2">
            <label>Year:</label>
            <input type="text" name="year2">
            
            <label>Work Experience:</label>
            <input type="text" name="work1">
             
            <label>About Me:</label>
            <textarea name="about_me"></textarea>
            
            <label>Year of Work Experience:</label>
            <input type="text" name="work_year1">
            
            <label>Skills (comma separated):</label>
            <input type="text" name="skills">
            
            <label>Certifications (comma separated):</label>
            <input type="text" name="languages">
            
            <label>Address:</label>
            <input type="text" name="address">
            
            <label>Website:</label>
            <input type="text" name="website">
            
            <label>Email:</label>
            <input type="email" name="email">

            <!-- Added GitHub and LinkedIn Fields -->
            <label>GitHub Profile:</label>
            <input type="text" name="github" placeholder="Enter your GitHub URL">

            <label>LinkedIn Profile:</label>
            <input type="text" name="linkedin" placeholder="Enter your LinkedIn URL">

            <!-- Added name="save" to match PHP condition -->
            <button type="submit" name="save">Generate Resume</button>
        </form>
    </div>
</body>
</html>
