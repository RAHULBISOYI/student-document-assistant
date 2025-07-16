<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seized Item Return Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background: linear-gradient(135deg, #00C4CC, #6200EA); 
        }
        .container {
            max-width: 700px;
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
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Seized Item Return Request</h2>
        <form action="mobile2_.php" method="POST" enctype="multipart/form-data">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="seized_item">Seized Item:</label>
         
            <textarea id="seized_item" name="seized_item" rows="3" required></textarea>
            
            <label for="seizure_reason">Reason for Seizure:</label>
            <textarea id="seizure_reason" name="seizure_reason" rows="3" required></textarea>

            <label for="return_reason">Reason for Requesting Return:</label>
            <textarea id="return_reason" name="return_reason" rows="4" required></textarea>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
