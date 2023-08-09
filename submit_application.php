<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobTitle = $_POST["job_title"];
    $uploadDir = "uploads/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $resumeName = $_FILES["resume"]["name"];
    $resumePath = $uploadDir . $resumeName;

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath)) {
        // Resume successfully uploaded
        echo "Application submitted successfully for job: " . $jobTitle;
    } else {
        // Error handling
        echo "Error uploading resume.";
    }
}
?>
