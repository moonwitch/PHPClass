<?php
$base = realpath("../../");
$file = isset($_GET["file"]) ? $_GET["file"] : "";

$fullPath = realpath("../../" . $file);

if (strpos($fullPath, $base) !== 0 || !file_exists($fullPath)) {
    http_response_code(404);
    die("File not found.");
}

header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header(
    'Content-Disposition: attachment; filename="' . basename($fullPath) . '"'
);
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: " . filesize($fullPath));
readfile($fullPath);
exit();
?>
