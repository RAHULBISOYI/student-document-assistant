<?php
if (isset($_GET['image_path'])) {
    $imagePath = htmlspecialchars($_GET['image_path']);
} else {
    die("Image not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Image</title>
</head>
<body>
    <h2>Full Image</h2>
    <a href="view_images.php">⬅ Back to Gallery</a>
    <br><br>
    <img src="<?php echo $imagePath; ?>" style="max-width: 100%; height: auto;" alt="Uploaded Image">
</body>
</html>
