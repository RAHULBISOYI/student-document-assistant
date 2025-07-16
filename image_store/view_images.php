<?php
include("../login_System/partial/db_connect.php");

// Fetch images from the database
$sql = "SELECT id, u_name, image_path FROM image_pa ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Uploaded Images</title>
    <style>
        .image-container {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            display: inline-block;
            text-align: center;
        }
        .view-button {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Uploaded Images</h2>
    <a href="image_s.php">⬅ Go Back</a>
    <br><br>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='image-container'>";
            echo "<p><strong>Username:</strong> " . htmlspecialchars($row["u_name"]) . "</p>";
            echo "<img src='" . htmlspecialchars($row["image_path"]) . "' width='200' alt='Uploaded Image'>";
            echo "<br>";
            echo "<form action='view_single_image.php' method='GET' target='_blank'>";
            echo "<input type='hidden' name='image_path' value='" . htmlspecialchars($row["image_path"]) . "'>";
            echo "<button type='submit' class='view-button'>View Full Image</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No images uploaded yet.</p>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
