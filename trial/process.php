<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $age = htmlspecialchars($_POST["age"]);
    $bio = htmlspecialchars($_POST["bio"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>

    <!-- Link to External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h2>Submitted Information</h2>

    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>Bio:</strong> <?php echo nl2br($bio); ?></p>

    <a href="trial.php">Go Back</a>

</body>
</html>
