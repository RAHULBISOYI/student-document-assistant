<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Leave Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background: linear-gradient(135deg, #00C4CC, #6200EA); 
        }
        .container {
            max-width: 450px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>College Leave Application</h2>
        <form action="leeave.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="student-id">Student ID:</label>
            <input type="text" id="student-id" name="student_id" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="leave-type">Leave Type:</label>
            <select id="leave-type" name="leave_type">
                <option value="medical">Medical Leave</option>
                <option value="exam">Exam Leave</option>
                <option value="personal">Personal Leave</option>
                <option value="family">Family Emergency</option>
            </select>

            <form action="leave_request.php" method="POST">

            
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>
    



            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <label for="stay-location">Where will you stay during leave?</label>
            <input type="text" id="stay-location" name="stay_location" placeholder="e.g., Home, Hostel, Relative's Place" required>

            <button type="submit" name="save">Save Resume</button>
        </form>
    </div>
</body>
</html>
