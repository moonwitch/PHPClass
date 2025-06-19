<?php
session_start();

// Security: Only allow admins to delete and check for a valid path
if (!isset($_SESSION["user"]->role) || $_SESSION["user"]->role !== "admin" || !isset($_SESSION['path'])) {
    die("Access Denied or session path not set.");
}

// Check if a file is specified
if (isset($_GET['file'])) {
    $file_to_delete = urldecode($_GET['file']);
    $full_path = realpath($_SESSION['path'] . $file_to_delete);

    // Security check: ensure the file is within the project root
    $root_path = realpath('../../');
    if ($full_path && strpos($full_path, $root_path) === 0 && is_file($full_path)) {
        // Delete the file
        if (unlink($full_path)) {
            $_SESSION["cms_feedback"] = "File '" . htmlspecialchars($file_to_delete) . "' has been deleted.";
        } else {
            $_SESSION["cms_feedback"] = "Error: Could not delete the file.";
        }
    } else {
        $_SESSION["cms_feedback"] = "Error: File not found or invalid path.";
    }
}

// Redirect back to the explorer page
header("Location: ./");
exit();
