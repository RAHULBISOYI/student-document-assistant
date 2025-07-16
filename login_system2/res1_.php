<?php
include("../login_System/partial/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
    $name = $_POST["name"];
    $job_title = $_POST["job_title"];
    $edu1 = $_POST["edu1"];
    $year1 = $_POST["year1"];
    $edu2 = $_POST["edu2"] ?? null;
    $year2 = $_POST["year2"] ?? null;
    $work1 = $_POST["work1"] ?? null;
    $about_me = $_POST["about_me"] ?? null;
    $work_year1 = $_POST["work_year1"] ?? null;
    $skills = $_POST["skills"] ?? null;
    $languages = $_POST["languages"] ?? null;
    $address = $_POST["address"] ?? null;
    $website = $_POST["website"] ?? null;
    $email = $_POST["email"];
    $github = $_POST["github"] ?? null;
    $linkedin = $_POST["linkedin"] ?? null;

    // Profile Picture Upload Handling
    $profile_pic = null;
    if (!empty($_FILES["profile_pic"]["name"])) {
        $target_dir = "uploads/";
        $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
    }

    // ✅ Step 1: Check if email already exists
    $check_stmt = $conn->prepare("SELECT id FROM rasumes WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // ✅ Step 2: Update existing record
        $update_stmt = $conn->prepare("UPDATE rasumes SET profile_pic=?, name=?, job_title=?, edu1=?, year1=?, edu2=?, year2=?, work1=?, about_me=?, work_year1=?, skills=?, languages=?, address=?, website=?, github=?, linkedin=? WHERE email=?");

        $update_stmt->bind_param("sssssssssssssssss", $profile_pic, $name, $job_title, $edu1, $year1, $edu2, $year2, $work1, $about_me, $work_year1, $skills, $languages, $address, $website, $github, $linkedin, $email);

        if ($update_stmt->execute()) {
            echo "<script>alert('Resume Updated Successfully!'); window.location.href='res1.php?id=" . $result->fetch_assoc()['id'] . "';</script>";
        } else {
            echo "<script>alert('Error updating resume: " . $update_stmt->error . "');</script>";
        }

        $update_stmt->close();
    } else {
        // ✅ Step 3: Insert new record if email doesn't exist
        $stmt = $conn->prepare("INSERT INTO rasumes (profile_pic, name, job_title, edu1, year1, edu2, year2, work1, about_me, work_year1, skills, languages, address, website, email, github, linkedin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssssssssssss", $profile_pic, $name, $job_title, $edu1, $year1, $edu2, $year2, $work1, $about_me, $work_year1, $skills, $languages, $address, $website, $email, $github, $linkedin);

        if ($stmt->execute()) {
            echo "<script>alert('Resume Saved Successfully!'); window.location.href='res1.php?id=" . $conn->insert_id . "';</script>";
        } else {
            echo "<script>alert('Error saving resume: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
