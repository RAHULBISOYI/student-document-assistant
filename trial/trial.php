<?php
// This PHP file displays the form where users enter their information
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>

    <!-- Link to External CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h2>Enter Your Information</h2>
    
    <form action="process.php" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="bio">Short Bio:</label>
        <textarea id="bio" name="bio" rows="4"></textarea>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
