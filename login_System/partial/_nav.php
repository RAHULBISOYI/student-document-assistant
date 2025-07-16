<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Document Assistant</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Body Styling */
        body {
            position: relative;
            text-align: center;
            margin-top: 50px;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: white;
        }

        /* Blurred Background */
        body {
            position: relative;
            text-align: center;
            margin-top: 50px;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Create a blurred background using ::before */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/RAHUL/login_System/partial/ioxzgzlf.png') no-repeat center center fixed;
            background-size: cover;
            filter: blur(3px);
            z-index: -1;
        }

        /* Navbar Styling */
        .navbar {
            padding: 15px;
            width: 100%;
            position: absolute;
            top: 0;
        }

        .navbar-brand {
            font-size: 1.9rem;
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-nav {
            margin: auto;
            display: flex;
            gap: 40px;
        }

        .nav-link {
            font-size: 1.4rem;
            font-weight: bold;
            color: #ffffff !important;
            transition: color 0.3s ease-in-out;
        }

        /* Green Hover Effect */
        .nav-link:hover {
            color: #28a745 !important;
        }

        /* Login Button */
        .btn-outline-light {
            color: #ffffff;
            border-color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #007bff;
        }

        /* Centered Content with Image on Left */
        .centered-container {
            background: rgba(255, 255, 255, 0.2);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1000px;
            width: 100%;
            gap: 20px;
        }

        /* Image Styling - Positioned to Left */
        .centered-container img {
            width: 100%;
            max-width: 300px;
            border-radius: 12px;
            border: 5px solid white;
        }

        /* Text Content Styling */
        .content {
            color: white;
            text-align: left;
        }

        /* Typing Animation */
        .typing-text {
            font-size: 18px;
            font-weight: normal;
            min-height: 50px; /* Prevents content shifting */
        }

        /* Social Media Icons */
        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            font-size: 40px;
            margin: 15px;
            color: white;
            transition: color 0.3s ease-in-out;
        }

        .social-icons a:hover {
            color: #ffcc00;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Student Document Assistant</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/RAHUL/login_System/partial/_nav.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/RAHUL/login_System/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/RAHUL/login_System/sign.php">SignUp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rahul/login_System/resert_passAuth.php">Change password</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Centered Content -->
<div class="centered-container">
    <img src="/RAHUL/login_System/a.png" alt="Sample Image">
    <div class="content">
        <h2>Welcome to Student Document Assistant</h2>
        <p id="typing-text" class="typing-text"></p>
    </div>
</div>

<!-- Social Media Icons -->
<div class="social-icons">
    <a href="https://instagram.ccom" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="https://github.com" target="_blank"><i class="fab fa-github"></i></a>
    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
</div>

<!-- Typed.js Animation -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
  var typed = new Typed("#typing-text", {
    strings: [
      "Your one-stop solution for managing and generating student documents easily.",
      "Create a Professional Resume in Minutes!",
      "No design skills needed!"
    ],
    typeSpeed: 50,
    backSpeed: 30,
    loop: true
  });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
