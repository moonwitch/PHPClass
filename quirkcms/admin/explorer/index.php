<?php

// Autoload classes
require_once "../classes/class.account.php";
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

// Check if user has admin role
if ($_SESSION["user"]->role !== "admin") {
    die("Access Denied. This page is for admins only.");
}

// root path for the file explorer
$root_path = realpath('../../');

// files and nav logic
$fileContent = null;
$editingFile = null;

// Reset path if requested from dashboard
if (isset($_GET['reset'])) {
    unset($_SESSION['path']);
    header('Location: ./');
    exit();
}

// Save file
if (isset($_POST['saveFile'])) {
    if (isset($_POST['fileToSave']) && !empty($_POST['fileToSave']) && isset($_POST['fileContent'])) {
        $fileToSave = urldecode($_POST['fileToSave']);
        $filePath = realpath($_SESSION['path'] . $fileToSave);

        if ($filePath && strpos($filePath, $root_path) === 0 && is_file($filePath)) {
            file_put_contents($filePath, $_POST['fileContent']);
            $_SESSION["cms_feedback"] = "Bestand '" . htmlspecialchars($fileToSave) . "' succesvol bewaard!";
            header("Location: ?action=edit&file=" . urlencode($fileToSave));
            die();
        }
    }
}

// Edit file
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['file'])) {
    $editingFile = urldecode($_GET['file']);
    $filePath = realpath($_SESSION['path'] . $editingFile);

    if ($filePath && strpos($filePath, $root_path) === 0 && is_file($filePath)) {
        $fileContent = file_get_contents($filePath);
    } else {
        $editingFile = null;
    }
}

// Navigation logic
if (isset($_GET['action']) && $_GET['action'] == "nav") {
    if (isset($_GET['folder']) && !empty($_GET['folder'])) {
        $folder = urldecode($_GET['folder']);
        if ($folder == "..") {
            $_SESSION['path'] = dirname($_SESSION['path']) . '/';
        } else {
            $_SESSION['path'] .= $folder . '/';
        }
    }
    header("Location: ./");
    die();
}

// Define the root path
if (!isset($_SESSION['path'])) {
    $_SESSION['path'] = '../../';
}
$current_path = realpath($_SESSION['path']);
if (!$current_path || strpos($current_path, $root_path) !== 0) {
    $_SESSION['path'] = '../../';
    $current_path = $root_path;
}

// Get contents of the path 
$filesAndFolders = @scandir($current_path);

$display_path = $_SESSION['path'];
if ($editingFile) {
    $display_path .= $editingFile;
}

// HTML header
require_once "../inc/header.php";
?>
<main class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>File Explorer</h3>
        <a href="../" class="btn btn-secondary mt-3" role="button">Back to Admin</a>
    </div>

    <?php
    if (isset($_SESSION["cms_feedback"])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . htmlspecialchars($_SESSION["cms_feedback"]) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        unset($_SESSION["cms_feedback"]);
    }
    ?>
    <p class="text-muted">Huidig pad: <strong><?= htmlspecialchars($display_path) ?></strong></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="upload.php" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
                <label for="fileToUpload" class="form-label mb-0 me-2">Upload new file:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" style="flex-grow: 1;" required>
                <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <table class="table table-bordered table-striped table-hover" style="font-size: small;">
                <thead>
                    <tr>
                        <th style="width: 20px;"></th>
                        <th>Name</th>
                        <th style="width: 50px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($filesAndFolders) {
                        // Toon de ".." (omhoog) link
                        if ($current_path != $root_path) {
                            echo '<tr>
                    <td><i class="fa fa-arrow-up"></i></td>
                    <td colspan="2"><a href="?action=nav&folder=..">..</a></td>
                  </tr>';
                        }

                        foreach ($filesAndFolders as $item) {
                            if (in_array($item, ['.', '..', '.DS_Store'])) continue;

                            $itemPath = $current_path . DIRECTORY_SEPARATOR . $item;
                            $activeClass = ($editingFile == $item) ? 'table-primary' : '';

                            echo '<tr class="' . $activeClass . '">';

                            // --- Logica voor Mappen (blijft hetzelfde) ---
                            if (is_dir($itemPath)) {
                                $link = "?action=nav&folder=" . urlencode($item);
                                echo '<td><i class="fa-solid fa-folder"></i></td>'; // Gebruik Font Awesome 6 class
                                echo '<td><a href="' . $link . '">' . htmlspecialchars($item) . '</a></td>';
                                echo '<td></td>';
                            } else {
                                // --- AANGEPASTE LOGICA VOOR BESTANDEN ---
                                $fileExtension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                                $isImage = @getimagesize($itemPath);
                                $isVideo = in_array($fileExtension, ['mp4', 'webm', 'mov']);

                                // Bepaal of het een lightbox-bestand is
                                $isLightboxFile = ($isImage || $isVideo);

                                $webPathSegment = str_replace($root_path, '', $itemPath);
                                $fileUrl = str_replace(DIRECTORY_SEPARATOR, '/', $webPathSegment);

                                // Kies het icoon op basis van het type
                                if ($isLightboxFile) {
                                    // Gebruik een 'afbeelding' icoon voor alle media
                                    echo '<td><i class="fa-solid fa-image"></i></td>';
                                    echo '<td><a href="' . $fileUrl . '" data-toggle="lightbox">' . htmlspecialchars($item) . '</a></td>';
                                    echo '<td class="text-center">
                            <a href="' . $fileUrl . '" data-toggle="lightbox" title="View"><i class="fa-solid fa-eye"></i></a>&nbsp;
                            <a href="delete.php?file=' . urlencode($item) . '" onclick="return confirm(\'Are you sure?\');" title="Delete"><i class="fa-solid fa-trash"></i></a>
                          </td>';
                                } else {
                                    // Gebruik een 'tekstbestand' icoon voor al het andere
                                    $editLink = "?action=edit&file=" . urlencode($item);
                                    echo '<td><i class="fa-solid fa-file-alt"></i></td>';
                                    echo '<td><a href="' . $editLink . '">' . htmlspecialchars($item) . '</a></td>';
                                    echo '<td class="text-center">
                            <a href="' . $editLink . '" title="Edit"><i class="fa-solid fa-pencil"></i></a>&nbsp;
                            <a href="delete.php?file=' . urlencode($item) . '" onclick="return confirm(\'Are you sure?\');" title="Delete"><i class="fa-solid fa-trash"></i></a>
                          </td>';
                                }
                            }
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-8">
            <?php if ($editingFile): ?>
                <form method="post" action="?action=edit&file=<?= urlencode($editingFile) ?>">
                    <input type="hidden" name="fileToSave" value="<?= urlencode($editingFile) ?>">
                    <textarea name="fileContent" class="form-control" style="height: 60vh; font-family: monospace; background-color: #f1f1f1; color: #333;"><?= htmlspecialchars($fileContent) ?></textarea>
                    <button type="submit" name="saveFile" class="btn btn-primary mt-3 float-end">Save File</button>
                </form>
            <?php else: ?>
                <div class="d-flex align-items-center justify-content-center text-muted" style="height: 60vh; border: 2px dashed #ccc; border-radius: 5px;">
                    <p>Select file to view or edit.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php

require_once "../inc/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.5/dist/index.bundle.min.js"></script>
