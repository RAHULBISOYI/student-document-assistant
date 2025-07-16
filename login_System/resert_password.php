<?php
include 'partial/db_connect.php';
$showMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["u_name"];
    $new_password = $_POST["new_pass"];

    // Check if the user exists
    $sql = "SELECT * FROM user WHERE u_name='$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        // Update the password
        $update_sql = "UPDATE user SET c_pass='$new_password' WHERE u_name='$username'";
        if (mysqli_query($conn, $update_sql)) {
            $showMsg = "Password updated successfully! <a href='login.php'>Login Now</a>";
        } else {
            $showMsg = "Error updating password. Try again!";
        }
    } else {
        $showMsg = "Username not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Reset Your Password</h2>
    <?php if ($showMsg) { echo "<div class='alert alert-info'>$showMsg</div>"; } ?>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="u_name" class="form-label">Username</label>
            <input type="text" class="form-control" name="u_name" required>
        </div>
        <div class="mb-3">
            <label for="new_pass" class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_pass" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
</body>
</html>
