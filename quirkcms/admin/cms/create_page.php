<?php
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

if ($_SESSION["user"]->role == "admin") {
    $is_admin = true;
} else {
    $is_admin = false;
}

if (isset($_SESSION["cms_feedback"])) {
    echo '<div class="alert alert-success">' .
        htmlspecialchars($_SESSION["cms_feedback"]) .
        "</div>";
    unset($_SESSION["cms_feedback"]);
}

// Check if the form is submitted
if (isset($_POST["createNewPage"]) && !empty($_POST["page"])) {
    $path = "../cms/data/" . urldecode($_POST["page"]);

    // Check if the page already exists
    if (is_dir($path)) {
        $_SESSION["cms_feedback"] = "Page '$page' already exists.";
    } else {
        // Create the page
        if (mkdir($path, 0777, true)) {
            $_SESSION[
                "cms_feedback"
            ] = "Page '$page' created successfully!";
            header("Location: ./");
            exit();
        } else {
            $_SESSION["cms_feedback"] = "Failed to create page '$page'.";
        }
    }
}

require_once "../inc/header.php";
?>

<div class="container mt-5">
    <h2>Create New Page</h2>
    <form method="post">
        <div class="form-group">
            <label for="page">Page Name:</label>
            <input type="text" class="form-control" id="page" name="page" required>
        </div>
        <button type="submit" name="createNewPage" class="btn btn-primary">Create Page</button>
        <a href="./" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php require_once "../inc/footer.php"; ?>
