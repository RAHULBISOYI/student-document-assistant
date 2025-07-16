<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Assistant</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        /* Full Page Background */
        body {
            background: url('/RAHUL/login_System/pur.jpg') no-repeat center center fixed;
            background-size: cover; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Centered Container with Blur Effect */
        .centered-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80%; /* Increased width */
            height: 500px; /* Increased height */
            border: 4px solid white; /* Border */
            border-radius: 15px;
            backdrop-filter: blur(10px); /* Blur background */
            background: rgba(253, 253, 253, 0.2); /* Light transparent background */
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3);
            overflow: hidden;
        }

        /* Left Side: Image Styling */
        .image-container {
            flex: 1.2; /* Adjusts image size */
            height: 100%;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the area */
            border-radius: 15px 0 0 15px; /* Rounded only on the left side */
        }

        /* Right Side: Buttons and Text */
        .content {
            flex: 1; /* Adjust width */
            padding: 20px;
            text-align: center;
            color: white;
        }

        /* Button container */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Space between buttons */
            align-items: center;
        }

        /* Common Button Styling */
        .btn-custom {
            width: 250px;
            height: 60px;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
        }

        /* Application Builder Dropdown Styling */
        .dropdown .btn-custom {
            background-color:rgb(152, 212, 166); /* Green background */
            color: white;
            border: 2px solid white;
            transition: all 0.3s ease-in-out;
        }

        .dropdown .btn-custom:hover {
            background-color: white;
            color: #28a745;
            border: 2px solid #28a745;
        }

    </style>
</head>
<body>

    <div class="centered-container">
        <!-- Left Side: Image -->
        <div class="image-container">
            <img src="/RAHUL/login_System/st.png" alt="Document Assistant">
        </div>

        <!-- Right Side: Buttons -->
        <div class="content">
            <h2> "Unlock Opportunities: Build a Resume or Write an Application!"</h2>
            <div class="button-group">
            <a href="/RAHUL/login_system2/store.php" class="btn btn-primary btn-custom">📂 My Documents</a>
                <a href="/RAHUL/login_system2/t.php" class="btn btn-primary btn-custom">📝 Resume Builder</a>
                
                <div class="dropdown">
                    <button class="btn btn-success btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    📝  Application Builder
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/RAHUL/trial/leavee.php">Create Leave Application </a></li>
                        <li><a class="dropdown-item" href="/RAHUL/trial/mobile.php">Application For The Retrieval of a Seized Item</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
