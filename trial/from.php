<?php
$name = $email = $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: auto; }
        form, .output { border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { background: blue; color: white; padding: 10px; border: none; cursor: pointer; }
        .output { background: #f9f9f9; margin-top: 20px; }
    </style>
</head>
<body>

<h2>PHP Form</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Message:</label>
    <textarea name="message" required></textarea>
    
    <button type="submit">Submit</button>
</form>

<!--<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
<div class="output">
    <h3>Submitted Data</h3>
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Message:</strong> <?= nl2br($message) ?></p>
</div>-->
<?php endif; ?>

</body>
</html>
