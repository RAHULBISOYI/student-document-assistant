<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Form</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #00C4CC, #6200EA);
            padding: 20px;
        }

        /* Form Container */
        .form-container {
            background: rgb(200, 209, 210);
            padding: 25px;
            width: 100%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }

        /* Form Styling */
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            border-color: #6200EA;
            outline: none;
            box-shadow: 0px 0px 5px rgba(98, 0, 234, 0.5);
        }

        textarea {
            resize: vertical;
        }

        /* Submit Button */
        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            background-color: #6200EA;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #4500a5;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Resume Form</h2>
        <form action="res3_.php" method="post">
            <!-- Required Fields -->
             
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" required>

            <label for="education">Education</label>
            <input type="text" id="education" name="education" required>

            <label for="work_year1">Education Year</label>
            <input type="text" id="work_year1" name="work_year1" required>

            <!-- Optional Fields -->
            <label for="about_me">Introduction</label>
            <textarea id="about_me" name="about_me" rows="3"></textarea>

            <label for="work1">Career Progression</label>
            <textarea id="work1" name="work1" rows="3"></textarea>

            <label for="skills">Skills (comma-separated)</label>
            <input type="text" id="skills" name="skills">

            <label for="languages">Certification (comma-separated)</label>
            <input type="text" id="languages" name="languages">

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">

            <label for="address">Address</label>
            <input type="text" id="address" name="address">

            <label for="website">Website</label>
            <input type="text" id="website" name="website">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">


                        <!-- Added GitHub and LinkedIn Fields -->
                        <label>GitHub Profile:</label>
            <input type="text" name="github" placeholder="Enter your GitHub URL">

            <label>LinkedIn Profile:like raul-bisoyi-842y062b9</label>
            <input type="text" name="linkedin" placeholder="Enter your LinkedIn URL">

            <button type="submit">Generate Resume</button>
        </form>
    </div>
</body>
</html>
