<?php
// Load classes
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});

// Start Session
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

// If files folder does not exist, create it
$baseUploadPath = __DIR__ . "/../../";
$uploadImages = $baseUploadPath . "images/";
$uploadFiles = $baseUploadPath . "files/";
$uploadVideos = $baseUploadPath . "videos/";

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

$dirErrors = [];
$dirErrors[] = ensureDirExists($uploadImages);
$dirErrors[] = ensureDirExists($uploadFiles);
$dirErrors[] = ensureDirExists($uploadVideos);

foreach ($dirErrors as $err) {
    if ($err) {
        $_SESSION["cms_feedback"] = $err;
    }
}

// Get contents for images and for files
// exclude ., .. and .DS_Store
$fileDir = scandir($uploadFiles);
$imageDir = scandir($uploadImages);
$videoDir = scandir($uploadVideos);
$files = [];
$images = [];
$videos = [];

foreach ($fileDir as $file) {
    if ($file !== "." && $file !== ".." && $file !== ".DS_Store") {
        $files[] = $file;
    }
}

foreach ($imageDir as $image) {
    if ($image !== "." && $image !== ".." && $image !== ".DS_Store") {
        $images[] = $image;
    }
}

foreach ($videoDir as $video) {
    if ($video !== "." && $video !== ".." && $video !== ".DS_Store") {
        $videos[] = $video;
    }
}

// Count them files :D
$assetCount = count($videos) + count($files) + count($images);
$_SESSION["assetCount"] = $assetCount;

// HTML header
require_once "../inc/header.php";
?>

<main class="container">
    <h3>File Management</h3>
    <div class="d-grid  gap-2 d-md-flex justify-content-md-end">
        <a href="../" class="btn btn-outline-primary" role="button">Back to Admin</a>
    </div>
    <!-- We want tabs for images and files AND videos -->
    <ul class="nav nav-tabs" id="fileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="true">Images</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="files-tab" data-bs-toggle="tab" data-bs-target="#files" type="button" role="tab" aria-controls="files" aria-selected="false">Files</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">Videos</button>
        </li>
    </ul>

    <div class="tab-content p-3 border border-top-0 rounded-bottom shadow-sm bg-white" id="fileTabsContent">
        <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
            <!-- Upload Images Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Upload Images</strong>
                </div>
                <div class="card-body">
                    <form class="row g-3 align-items-center" action="upload_files.php" method="post" enctype="multipart/form-data">
                        <div class="col-auto">
                            <label class="form-label mb-0" for="imageFile">Select images (Max 4MB each):</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control" type="file" id="imageFile" name="files[]" multiple>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="compress" id="compressImages" checked>
                                <label class="form-check-label" for="compressImages">Auto-Compress</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Upload Images</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Images Manager -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Image Manager</strong>
                </div>
                <table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;' id='imagesTable'>
                    <thead>
                        <tr>
                            <th style="width: 50px"></th>
                            <th>Filename</th>
                            <th>Last Modified</th>
                            <th>Size</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($images as $image) {
                            $path = "../../images/$image";
                            $size = round(filesize($path) / 1024, 1) . " KB";
                            $modified = date("Y-m-d H:i", filemtime($path));
                            $filename = htmlspecialchars($image);
                            $encoded = urlencode($image);
                            $preview = "<img src='$path' alt='$filename' style='max-height: 50px;'>";
                            echo "
                            <tr>
                                <td>
                                    <a href='download.php?file=images/$encoded' title='Download'><i class='fa fa-download'></i></a>
                                    <a href='delete.php?file=images/$encoded' title='Delete' onclick=\"return confirm('Verwijder afbeelding $filename?');\"><i class='fa fa-trash'></i></a>
                                </td>
                                <td>$filename</td>
                                <td>$modified</td>
                                <td>$size</td>
                                <td>$preview</td>
                            </tr>
                            ";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
            <!-- Upload Files Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Upload Files</strong>
                </div>
                <div class="card-body">
                    <form class="row g-3 align-items-center" action="upload_files.php" method="post" enctype="multipart/form-data">
                        <div class="col-auto">
                            <label class="form-label mb-0" for="fileInput">Select files (Max 4MB each):</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control" type="file" id="fileInput" name="files[]" multiple>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Upload Files</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Files Manager -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>File Manager</strong>
                </div>
                <table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;' id='filesTable'>
                    <thead>
                        <tr>
                            <th style="width: 50px"></th>
                            <th>Filename</th>
                            <th>Last Modified</th>
                            <th>Size</th>
                            <th>Open</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($files as $file) {
                            $path = $uploadFiles . $file;
                            $size = round(filesize($path) / 1024, 1) . " KB";
                            $modified = date("Y-m-d H:i", filemtime($path));
                            $filename = htmlspecialchars($file);
                            $encoded = urlencode($file);
                            echo "
                        <tr>
                            <td>
                                <a href='download.php?file=files/$encoded' title='Download'><i class='fa fa-download'></i></a>
                                <a href='delete.php?file=files/$encoded' title='Delete' onclick=\"return confirm('Verwijder bestand $filename?');\"><i class='fa fa-trash'></i></a>
                            </td>
                            <td>$filename</td>
                            <td>$modified</td>
                            <td>$size</td>
                            <td><a href='$path' target='_blank' class='btn btn-sm btn-outline-primary'>Open</a></td>
                        </tr>
                        ";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
            <!-- Upload Videos Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Upload Videos</strong>
                </div>
                <div class="card-body">
                    <form class="row g-3 align-items-center" action="upload_files.php" method="post" enctype="multipart/form-data">
                        <div class="col-auto">
                            <label class="form-label mb-0" for="fileInput">Select videos (Max 4MB each):</label>
                        </div>
                        <div class="col-auto">
                            <input class="form-control" type="file" id="fileInput" name="files[]" multiple>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Upload Videos</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Videos Manager -->
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Video Manager</strong>
                </div>
                <table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;' id='videosTable'>
                    <thead>
                        <tr>
                            <th style="width: 50px"></th>
                            <th>Filename</th>
                            <th>Last Modified</th>
                            <th>Size</th>
                            <th>Open</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($videos as $video) {
                            $path = $uploadVideos . $video;
                            $size = round(filesize($path) / 1024, 1) . " KB";
                            $modified = date("Y-m-d H:i", filemtime($path));
                            $filename = htmlspecialchars($video);
                            $encoded = urlencode($video);

                            echo "<tr>
                            <td>
                                <a href='download.php?file=videos$encoded' title='Download'><i class='fa fa-download'></i></a>
                                <a href='delete.php?file=videos/$encoded' title='Delete' onclick=\"return confirm('Verwijder bestand $filename?');\"><i class='fa fa-trash'></i></a>
                            </td>
                            <td>$filename</td>
                            <td>$modified</td>
                            <td>$size</td>
                            <td><a href='$path' target='_blank' class='btn btn-sm btn-outline-primary'>Open</a></td>
                        </tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once "../inc/footer.php"; ?>

    <!-- Config of Datatables -->
    <script type="text/javascript">
        $(function() {
            if ($(".dataTable").length > 0) {
                $(".dataTable").DataTable({
                    "pageLength": 25,
                    "responsive": true,
                    "paging": true,
                    layout: {
                        topStart: 'pageLength',
                        topEnd: 'search',
                        bottomStart: 'info',
                        bottomEnd: 'paging',
                    }
                });
            }
        });
    </script>