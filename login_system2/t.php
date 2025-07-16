<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Navigation</title>
    <style>
        @font-face {
            font-family: 'Goudy Stout';
            src: url('GoudyStout.ttf') format('truetype');
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00C4CC, #6200EA); /* Canva Gradient */
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent navbar */
            overflow: hidden;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        .navbar h1 {
            font-family: 'Goudy Stout', sans-serif;
            color: white;
            font-size: 24px;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 80px; /* Adjusted for fixed navbar */
        }

        .image-box {
    width: 350px; /* Increased width */
    height: 550px; /* Increased height */
    cursor: pointer;
    border: 2px solid #fff;
    border-radius: 10px;
    transition: transform 0.3s ease;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ffffff; /* White background */
}

.image-box img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Ensures the entire image fits within the div without cropping */
    padding: 10px; /* Optional padding to prevent edges from touching the border */
}


        .image-box:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Choose Your Template</h1>
    </div>

    <div class="container">
        <div class="image-box" onclick="location.href='/RAHUL/login_system2/index_l.php'">
            <img src="res1.png" alt="Resume Template 1">
        </div>
        <div class="image-box" onclick="location.href='/RAHUL/login_system2/index_l2.php'">
            <img src="res2.png" alt="Resume Template 2">
        </div>
        <div class="image-box" onclick="location.href='/RAHUL/login_system2/index_l3.php'">
            <img src="res3.png" alt="Resume Template 3">
        </div>
        <div class="image-box" onclick="location.href='/RAHUL/login_system/index.php'">
            <img src="/RAHUL/login_System/a.png" alt="Resume Template 4">
        </div>
    </div>
</body>
</html>
