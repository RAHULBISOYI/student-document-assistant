<?php
$showalert = false;
$showError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/db_connect.php'; // Database connection

    $username = $_POST["u_name"];
    $password = $_POST["c_pass"];
    $cpassword = $_POST["confirm_password"]; // Corrected confirm password field

    if ($password == $cpassword) {
        $sql = "INSERT INTO `user` (`s_no`, `u_name`, `c_pass`, `dt`) 
                VALUES (NULL, '$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showalert = true;
        } else {
            $showError = "Error while creating account!";
        }
    } else {
        $showError = "Passwords do not match!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>Sign Up</title>

    <!-- Custom CSS -->
    <style>
     body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/RAHUL/login_System/r.jpg') no-repeat center center fixed;
            background-size: cover;
            filter: blur(3px); /* Adjust blur strength */
            z-index: -1; /* Keep it behind other content */
        }

.container {
    margin-top: 50px;
}

/* Centered H2 Styling */
h2.text-center {
    color:rgb(9, 2, 2); /* White color */
    font-weight: bold; /* Make text bold */
    text-transform: uppercase; /* Convert text to uppercase */
    margin-bottom: 20px;
}

/* Style form labels */
.form-label {
    color: black; /* White text for labels */
    font-size: 1rem;
    font-weight: bold;
}

/* Alert Box */
.alert {
    background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent alert */
    border: none;
    color: white; /* White alert text */
    border-radius: 8px;
    padding: 15px;
}

/* Close Button Inside Alert */
.alert button {
    color: white;
    background: none;
    border: none;
    font-size: 1.2rem;
}

/* Primary Button */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    transition: background 0.3s ease-in-out;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Signup Container (Form Background) */
.signup-container {
     padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
}

/* Links */
a {
    color: #ffcc00;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: #ffffff;
    text-decoration: underline;
}

    </style>
</head>
<body>


<!-- Alert Messages -->
<?php
if ($showalert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account has been created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

<!-- Sign-Up Form -->
<div class="container">
    <div class="signup-container">
        <h2 class="text-center">Sign Up</h2>
        <form action="/rahul/login_System/sign.php" method="POST">
      
            <div class="mb-3">
                <label for="u_name" class="form-label">Username</label>
                <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter your username" required>
            </div>

            <div class="mb-3">
                <label for="c_pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Enter your password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>

        <p class="mt-3 text-center">Already have an account? <a href="/RAHUL/login_System/login.php">Login</a></p>
        <p class="mt-3 text-center">Go to Home Page? <a href="/RAHUL/login_System/partial/_nav.php">Home</a></p>
   
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
