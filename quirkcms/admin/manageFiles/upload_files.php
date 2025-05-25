<?php
session_start();

// Initialize session feedback string if not already set, or clear it for new feedback
$_SESSION["cms_feedback"] = ""; // Start with empty feedback for this run

// Limitations & Settings
$uploadMaxSize = 4 * 1024 * 1024; // 4MB
$imageExts = ["jpg", "jpeg", "png", "gif", "webp", "svg"];
$imageMimes = [
    "image/jpeg",
    "image/jpg",
    "image/png",
    "image/gif",
    "image/webp",
    "image/svg+xml",
];
$fileExts = ["pdf", "doc", "docx", "xls", "xlsx", "txt", "rtf", "odt", "ods"];
$fileMimes = [
    "application/pdf",
    "application/msword",
    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    "application/vnd.ms-excel",
    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "application/rtf",
    "text/plain",
    "application/vnd.oasis.opendocument.spreadsheet",
    "application/vnd.oasis.opendocument.text",
];
$videoExts = ["avi", "mp4", "mpeg", "webm", "mov", "wmv"];
$videoMimes = [
    "video/x-msvideo",
    "video/mp4",
    "video/mpeg",
    "video/webm",
    "video/quicktime",
    "video/x-ms-wmv",
];
$autoCompress = isset($_POST["compress"]);

// Locations (ensure these directories exist and are writable)
$baseUploadPath = __DIR__ . "/../../";
$uploadImages = $baseUploadPath . "images/";
$uploadFiles = $baseUploadPath . "files/";
$uploadVideos = $baseUploadPath . "videos/";

// Function to create directory if it doesn't exist
function ensureDirExists($dirPath)
{
    if (!is_dir($dirPath)) {
        if (!mkdir($dirPath, 0755, true)) {
            return "Error: Failed to create directory: " .
                htmlspecialchars($dirPath);
        }
    }
    return null;
}

$dirErrorFound = false; // Flag to track if any directory error occurred
$dirCheckMessage = ensureDirExists($uploadImages);
if ($dirCheckMessage) {
    $_SESSION["cms_feedback"] .= $dirCheckMessage . "<br>";
    $dirErrorFound = true;
}
$dirCheckMessage = ensureDirExists($uploadFiles);
if ($dirCheckMessage) {
    $_SESSION["cms_feedback"] .= $dirCheckMessage . "<br>";
    $dirErrorFound = true;
}
$dirCheckMessage = ensureDirExists($uploadVideos);
if ($dirCheckMessage) {
    $_SESSION["cms_feedback"] .= $dirCheckMessage . "<br>";
    $dirErrorFound = true;
}

if ($dirErrorFound) {
    header("Location: index.php");
    exit();
}

// Check if form was submitted and files are present
if (
    isset($_POST["submit"]) &&
    isset($_FILES["files"]["name"]) &&
    is_array($_FILES["files"]["name"])
) {
    $filesToProcess = [];
    $numSubmittedFiles = count($_FILES["files"]["name"]);

    // Consolidate file information and filter out empty uploads
    for ($i = 0; $i < $numSubmittedFiles; $i++) {
        if (
            $_FILES["files"]["error"][$i] !== UPLOAD_ERR_NO_FILE &&
            !empty($_FILES["files"]["name"][$i])
        ) {
            $filesToProcess[] = [
                "name" => $_FILES["files"]["name"][$i],
                "type" => $_FILES["files"]["type"][$i],
                "tmp_name" => $_FILES["files"]["tmp_name"][$i],
                "error" => $_FILES["files"]["error"][$i],
                "size" => $_FILES["files"]["size"][$i],
            ];
        }
    }

    if (empty($filesToProcess)) {
        $_SESSION["cms_feedback"] .=
            "No files were selected for upload or the selected files were empty.<br>";
    } else {
        // Alright, now we party (process each valid file)
        foreach ($filesToProcess as $file) {
            $original_filename = $file["name"];
            $temp_name = $file["tmp_name"];
            $file_size = $file["size"];
            $file_error = $file["error"];
            $file_type = $file["type"];
            $file_ext = strtolower(
                pathinfo($original_filename, PATHINFO_EXTENSION)
            );

            // 1. Check for individual file upload errors
            if ($file_error !== UPLOAD_ERR_OK) {
                $_SESSION["cms_feedback"] .=
                    "Error uploading '" .
                    htmlspecialchars($original_filename) .
                    "': " .
                    getUploadErrorMessage($file_error) .
                    "<br>";
                continue;
            }

            // 2. Check file size
            if ($file_size > $uploadMaxSize) {
                $_SESSION["cms_feedback"] .=
                    "'" .
                    htmlspecialchars($original_filename) .
                    "' (" .
                    round($file_size / 1024) .
                    "KB) exceeds " .
                    $uploadMaxSize / 1024 / 1024 .
                    "MB limit.<br>";
                continue;
            }

            // 3. Determine destination and validate type
            $destination_folder = "";
            $category = "";

            if (
                in_array($file_ext, $imageExts) ||
                in_array($file_type, $imageMimes)
            ) {
                $destination_folder = $uploadImages;
                $category = "image";
            } elseif (
                in_array($file_ext, $fileExts) ||
                in_array($file_type, $fileMimes)
            ) {
                $destination_folder = $uploadFiles;
                $category = "file";
            } elseif (
                in_array($file_ext, $videoExts) ||
                in_array($file_type, $videoMimes)
            ) {
                $destination_folder = $uploadVideos;
                $category = "video";
            } else {
                $_SESSION["cms_feedback"] .=
                    "'" .
                    htmlspecialchars($original_filename) .
                    "' has an unsupported type ('$file_ext', MIME: '$file_type').<br>";
                continue;
            }

            $destination_path =
                $destination_folder . basename($original_filename);

            // 4. Ensure we dont upload the same file twice (check by original name)
            if (file_exists($destination_path)) {
                $_SESSION["cms_feedback"] .=
                    "File '" .
                    htmlspecialchars($original_filename) .
                    "' already exists. Skipped.<br>";
                continue;
            }

            // 5. Move the uploaded file
            if (move_uploaded_file($temp_name, $destination_path)) {
                $folder_display_name = rtrim(
                    str_replace($baseUploadPath, "", $destination_folder),
                    "/"
                );
                $_SESSION["cms_feedback"] .=
                    "'" .
                    htmlspecialchars($original_filename) .
                    "' uploaded to " .
                    $folder_display_name .
                    ".<br>";

                // 6. If Autocompress is checked, compress the image
                if ($category === "image" && $autoCompress) {
                    if (function_exists("compressImageGD")) {
                        $compression_result = compressImageGD(
                            $destination_path,
                            $destination_path,
                            75
                        );
                        if ($compression_result === true) {
                            $_SESSION["cms_feedback"] .=
                                "Image '" .
                                htmlspecialchars($original_filename) .
                                "' compressed.<br>";
                        } else {
                            $_SESSION["cms_feedback"] .=
                                "Could not compress '" .
                                htmlspecialchars($original_filename) .
                                "': " .
                                htmlspecialchars($compression_result) .
                                "<br>";
                        }
                    } else {
                        $_SESSION["cms_feedback"] .=
                            "Compression function unavailable for '" .
                            htmlspecialchars($original_filename) .
                            "'.<br>";
                    }
                }
            } else {
                $_SESSION["cms_feedback"] .=
                    "Failed to move '" .
                    htmlspecialchars($original_filename) .
                    "'. Check permissions.<br>";
            }
        }
    }
} elseif (isset($_POST["submit"])) {
    $_SESSION["cms_feedback"] .=
        "No files were submitted or there was an issue with the upload form data.<br>";
} else {
    // Direct access to the script without POST submission.
    // $_SESSION["cms_feedback"] .= "Please upload files through the form.<br>"; // Optional
}

if (
    isset($_POST["submit"]) &&
    empty(trim(str_replace("<br>", "", $_SESSION["cms_feedback"])))
) {
    // If there was a submission but no specific feedback messages were generated
    // (e.g., no files selected initially, or only empty files submitted that were filtered out before processing loop)
    $_SESSION["cms_feedback"] .=
        "No files were processed. Please select files to upload.<br>";
}

// Remove trailing <br> if it exists
if (substr($_SESSION["cms_feedback"], -4) === "<br>") {
    $_SESSION["cms_feedback"] = substr($_SESSION["cms_feedback"], 0, -4);
}

header("Location: index.php");
exit();

// --- Helper Functions ---
function getUploadErrorMessage($errorCode)
{
    switch ($errorCode) {
        case UPLOAD_ERR_INI_SIZE:
            return "File exceeds server's upload_max_filesize limit.";
        case UPLOAD_ERR_FORM_SIZE:
            return "File exceeds form's MAX_FILE_SIZE limit.";
        case UPLOAD_ERR_PARTIAL:
            return "File was only partially uploaded.";
        case UPLOAD_ERR_NO_TMP_DIR:
            return "Missing temporary folder on server.";
        case UPLOAD_ERR_CANT_WRITE:
            return "Failed to write file to disk on server.";
        case UPLOAD_ERR_EXTENSION:
            return "A PHP extension stopped the file upload.";
        default:
            return "Unknown upload error (Code: $errorCode).";
    }
}

function compressImageGD($source, $output, $quality)
{
    $info = @getimagesize($source);
    if (!$info) {
        return "Invalid image file for compression.";
    }

    $mime = $info["mime"];
    $image = null;

    switch ($mime) {
        case "image/jpeg":
        case "image/jpg":
            $image = @imagecreatefromjpeg($source);
            break;
        case "image/png":
            $image = @imagecreatefrompng($source);
            break;
        case "image/gif":
            $image = @imagecreatefromgif($source);
            break;
        case "image/webp":
            if (function_exists("imagecreatefromwebp")) {
                $image = @imagecreatefromwebp($source);
            } else {
                return "WEBP source support unavailable.";
            }
            break;
        default:
            return "Unsupported image type for compression: " .
                htmlspecialchars($mime);
    }

    if (!$image) {
        return "Failed to create image (Type: " .
            htmlspecialchars($mime) .
            "). Is GD enabled for this type?";
    }

    $result = false;
    switch ($mime) {
        case "image/jpeg":
        case "image/jpg":
            $result = imagejpeg($image, $output, $quality);
            break;
        case "image/png":
            $pngQuality = (int) round(9 - ($quality / 100) * 9);
            imagealphablending($image, false);
            imagesavealpha($image, true);
            $result = imagepng($image, $output, $pngQuality);
            break;
        case "image/gif":
            $result = imagegif($image, $output);
            break;
        case "image/webp":
            if (function_exists("imagewebp")) {
                $result = imagewebp($image, $output, $quality);
            } else {
                imagedestroy($image);
                return "WEBP saving unavailable.";
            }
            break;
    }

    imagedestroy($image);
    return $result ? true : "Failed to save compressed image.";
}
?>