<?php
$login = false;
$showError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partial/db_connect.php'; // Database connection

    $username = $_POST["u_name"];
    $password = $_POST["c_pass"];
 // Corrected confirm password field

$sql="Select * from user where u_name ='$username' AND  c_pass='$password' ";


    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);//this isused for knowing how many record will be fetch;
        if ($num==1) {
            $login = true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['u_name']=$username;
            header("location:resert_password.php");//basicaly it is used for when we clic that particular button than it go tothe destination which you will be give;
        } else {
            $showError = "Invalid creadentials .If you don't have an account,you can sign up ";
        }
    } 
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
    <style>
.container {
    margin-top: 50px;
}
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
/* Centered H2 Styling */
h2.text-center {
    color:rgb(24, 9, 9); /* White color */
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
    background: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
    backdrop-filter: blur(10px); /* Apply blur effect */
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



<?php
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>You are login .
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

<div class="container">
    <div class="signup-container">
        <h2 class="text-center">User Authentication For Update Password</h2>
        <form action="/rahul/login_System/resert_passAuth.php" method="POST">
      
   <div class="mb-3">
        <label for="u_name" class="form-label">Username</label>
        <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter your username" required>
    </div>

    <div class="mb-3">
        <label for="c_pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Enter your password" required>
    </div>

  


            <button type="submit" class="btn btn-primary w-100">let'update</button>
        </form>

       
    </div>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
