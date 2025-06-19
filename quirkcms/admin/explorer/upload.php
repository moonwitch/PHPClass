<?php
session_start();

// Security: Only allow admins to upload and check for a valid path
if (!isset($_SESSION["user"]->role) || $_SESSION["user"]->role !== "admin" || !isset($_SESSION['path'])) {
    die("Access Denied or session path not set.");
}

// Check if a file was actually uploaded
if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
    $upload_dir = $_SESSION['path'];
    $file_name = basename($_FILES['fileToUpload']['name']);
    $destination = $upload_dir . $file_name;

    // Security check: ensure the destination is within the project root
    $root_path = realpath('../../');
    if (strpos(realpath($upload_dir), $root_path) !== 0) {
        $_SESSION["cms_feedback"] = "Error: Invalid upload directory.";
        header("Location: ./");
        exit();
    }

    // Prevent overwriting existing files
    if (file_exists($destination)) {
        $_SESSION["cms_feedback"] = "Error: File '" . htmlspecialchars($file_name) . "' already exists.";
    } else {
        // Move the uploaded file to the destination
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $destination)) {
            $_SESSION["cms_feedback"] = "File '" . htmlspecialchars($file_name) . "' uploaded successfully.";
        } else {
            $_SESSION["cms_feedback"] = "Error uploading file. Check folder permissions.";
        }
    }
} else {
    $_SESSION["cms_feedback"] = "No file selected or an error occurred during upload.";
}

// Redirect back to the explorer page
header("Location: ./");
exit();
