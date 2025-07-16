<?php
include("../login_System/partial/db_connect.php");

// Fetch users from all four tables
$sql_rasumes = "SELECT id, name, email FROM rasumes ORDER BY name ASC"; // 1 No Resume
$sql_resumes = "SELECT id, name FROM resumes ORDER BY name ASC"; // 2 No Resume
$sql_resumess = "SELECT id, name FROM resumess ORDER BY name ASC"; // 3 No Resume
$sql_reesumes = "SELECT id, name, email FROM reesumes ORDER BY name ASC"; // 4 No Resume
$sql_sized="SELECT id, name, email FROM seized_item_requests ORDER BY name ASC"; //sizeditem
$sql_lived="SELECT id, name, email FROM leeave_applications ORDER BY name ASC"; //sizeditem



$result_rasumes = $conn->query($sql_rasumes);
$result_resumes = $conn->query($sql_resumes);
$result_resumess = $conn->query($sql_resumess);
$result_reesumes = $conn->query($sql_reesumes);
$result_sized = $conn->query($sql_sized);
$result_leave = $conn->query($sql_lived);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Resumes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f4f4f4;
            padding: 20px;
        }
        .main-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Allows elements to wrap if space is not enough */
    overflow-x: auto;
    padding: 10px;
}


.container {
    width: 20%; /* Reduced width to make them narrower */
    height: 500px; /* Increased height to make them longer */
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    flex-shrink: 0; /* Prevents containers from shrinking */
    overflow-y: auto; /* Enables vertical scrolling if content exceeds height */
}


        .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        .user-card {
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .btn {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #218838;
        }
        .btn-delete {
            background: #dc3545;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                align-items: center;
            }
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <h2>Select a User</h2>

    <div class="main-container">
        <!-- 1 No Resume -->
        <div class="container">
            <div class="section-title">1 No Resume</div>
            <?php 
            while ($row = $result_rasumes->fetch_assoc()) { ?>
                <div class="user-card" id="user-<?= $row['id'] ?>">
                    <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="buttons">
                        <button class="btn" onclick="viewResume('<?= $row['id'] ?>', 'rasumes', '<?= $row['email'] ?>', 'res1.php')">View Resume</button>
                        <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'rasumes')">Delete</button>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- 2 No Resume -->
        <div class="container">
            <div class="section-title">2 No Resume</div>
            <?php 
            while ($row = $result_resumes->fetch_assoc()) { ?>
                <div class="user-card" id="user-<?= $row['id'] ?>">
                    <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="buttons">
                        <button class="btn" onclick="viewResume('<?= $row['id'] ?>', 'resumes', '', 'resume_display.php')">View Resume</button>
                        <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'resumes')">Delete</button>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- 3 No Resume -->
        <div class="container">
            <div class="section-title">3 No Resume</div>
            <?php 
            while ($row = $result_resumess->fetch_assoc()) { ?>
                <div class="user-card" id="user-<?= $row['id'] ?>">
                    <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="buttons">
                        <button class="btn" onclick="viewResume('<?= $row['id'] ?>', 'resumess', '', 'res3.php')">View Resume</button>
                        <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'resumess')">Delete</button>
                    </div>
                </div>
            <?php } ?>
        </div>
<!-- 4 No Resume -->
<div class="container">
    <div class="section-title">4 No Resume</div>
    <?php 
    while ($row = $result_reesumes->fetch_assoc()) { ?>
        <div class="user-card" id="user-<?= $row['id'] ?>">
            <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
            <div class="buttons">
                <button class="btn" onclick="viewResume('<?= $row['id'] ?>', 'reesumes', '<?= $row['email'] ?>', 'resume.php')">View Resume</button>
                <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'reesumes')">Delete</button>
            </div>
        </div>
    <?php } ?>
</div>

<div class="container">
            <div class="section-title">sized_application</div>
            <?php 
            while ($row = $result_sized ->fetch_assoc()) { ?>
                <div class="user-card" id="user-<?= $row['id'] ?>">
                    <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="buttons">
                        <button class="btn" onclick="viewResume('<?= $row['id'] ?>', ' seized_item_requests', '<?= $row['email'] ?>', '/RAHUL/trial/mobile2.php')">View Resume</button>
                        <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'seized_item_requests')">Delete</button>
                    </div>
                </div>
            <?php } ?>
        </div>





        <div class="container">
            <div class="section-title">leave_application</div>
            <?php 
            while ($row = $result_leave ->fetch_assoc()) { ?>
                <div class="user-card" id="user-<?= $row['id'] ?>">
                    <div class="user-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="buttons">
                        <button class="btn" onclick="viewResume('<?= $row['id'] ?>', 'leeave_applicationss', '<?= $row['email'] ?>', '/RAHUL/trial/leave.php')">View Resume</button>
                        <button class="btn btn-delete" onclick="deleteResume('<?= $row['id'] ?>', 'leeave_applications')">Delete</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    
    
    
    </div>

    <script>
        function viewResume(userId, source, email, page) {
            let url = page + "?id=" + userId + "&source=" + source;
            if (email) {
                url += "&email=" + encodeURIComponent(email);
            }
            window.location.href = url;
        }

        function deleteResume(userId, table) {
            if (confirm("Are you sure you want to delete this resume?")) {
                fetch("delete_resume.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "id=" + userId + "&table=" + table
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        location.reload(); // Auto refresh the page after deletion
                    } else {
                        alert("Error deleting resume: " + data);
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        }
    </script>

</body>
</html>
