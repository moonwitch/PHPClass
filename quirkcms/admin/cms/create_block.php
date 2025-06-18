<?php

// Autoload classes
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

// general feedback method :D
if (isset($_SESSION["cms_feedback"])) {
    echo '<div class="alert alert-success">' .
        htmlspecialchars($_SESSION["cms_feedback"]) .
        "</div>";
    unset($_SESSION["cms_feedback"]);
}

// fill basic form
$pages = scandir("../cms/data/");
foreach ($pages as $key => $page) {
    // Check if the folder is a directory and not "." or ".."
    if (!is_dir("../cms/data/$page") || $page == "." || $page == "..") {
        unset($pages[$key]);
        continue;
    }
}
// Check if the form is submitted
if (
    isset($_POST["createNewBlock"]) &&
    !empty($_POST["blockName"]) &&
    !empty($_POST["page"])
) {
    // Create the block file with touch
    $blockName = preg_replace("/[^a-zA-Z0-9_]/", "", $_POST["blockName"]); // Sanitize block name
    $path =
        "../cms/data/" .
        urldecode($_POST["page"]) .
        "/" .
        urldecode($_POST["blockName"]) .
        ".php";

    // Check if the file already exists
    if (file_exists($path)) {
        $_SESSION["cms_feedback"] = "Block '$blockName' already exists.";
    } else {
        // Create the file
        if (touch($path)) {
            $_SESSION[
                "cms_feedback"
            ] = "Block '$blockName' created successfully!";
            header("Location: ./");
            exit();
        } else {
            $_SESSION["cms_feedback"] = "Failed to create block '$blockName'.";
        }
    }
}

// HTML header
require_once "../inc/header.php";
?>

<main class="container py-4">
    <div class="row g-4">
        <h3>Content Management System</h3>
        <div class="d-grid gap-2 py-4 d-md-flex justify-content-md-end">
            <a href="../" class="btn btn-secondary" role="button">Back to Admin</a>
        </div>
        <h2>Create New Block</h2>
        <form method="post">
            <div class="form-group">
                <label for="page">Select Page:</label>
                <select name="page" class="form-control" id="page">
                    <option value="">Select a page</option>
                    <?php foreach ($pages as $page): ?>
                        <option value="<?php echo htmlspecialchars($page); ?>">
                            <?php echo htmlspecialchars($page); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for="blockName">Block Name:</label>
                <input type="text" class="form-control" id="blockName" name="blockName" required>
            </div>
            <button type="submit" name="createNewBlock" class="btn btn-primary">Create Block</button>
            <a href="../" class="btn btn-secondary" role=button">Cancel</a>
        </form>

    </div>
</main>

<?php // HTML footer

require_once "../inc/footer.php";
?>
