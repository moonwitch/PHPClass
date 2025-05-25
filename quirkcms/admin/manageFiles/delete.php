<?php
session_start();
$file = isset($_GET["file"]) ? $_GET["file"] : "";

$fullPath = realpath("../../" . $file);

if (file_exists($fullPath)) {
    unlink($fullPath);
    $_SESSION["cms_feedback"] =
        "File deleted: " . htmlspecialchars(basename($file));
} else {
    $_SESSION["cms_feedback"] = "File not found.";
}
header("Location: index.php");
exit();
