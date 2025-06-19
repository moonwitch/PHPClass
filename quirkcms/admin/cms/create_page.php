<?php
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

// Check if the form is submitted with both a page name and content
if (
    isset($_POST["createNewPage"]) &&
    !empty($_POST["page"]) &&
    isset($_POST["content"])
) {
    $pageName = trim($_POST["page"]);
    $pageContent = $_POST["content"];
    $path = "../cms/data/" . urldecode($pageName);

    // Check if the page already exists
    if (is_dir($path)) {
        $_SESSION["cms_feedback"] = "Page '$pageName' already exists.";
    } else {
        // Create the page directory first
        if (mkdir($path, 0777, true)) {
            // Now, save the content from Summernote into a file
            if (
                file_put_contents($path . "/block.php", $pageContent) !== false
            ) {
                $_SESSION["cms_feedback"] =
                    "Page '$pageName' created successfully!";
                header("Location: ./");
                exit();
            } else {
                $_SESSION["cms_feedback"] =
                    "Directory created, but failed to save page content.";
            }
        } else {
            $_SESSION["cms_feedback"] = "Failed to create page '$pageName'.";
        }
    }
}

require_once "../inc/header.php";
?>

<main class="container">
    <h3>Content Management System</h3>
    <div class="d-grid gap-2 py-4 d-md-flex justify-content-md-end">
        <a href="./" class="btn btn-secondary mt-3" role="button">Back to Admin</a>
    </div>

    <h2>Create New Page</h2>
    <p>Fill in the form below to create a new page.</p>
    <form method="post">
        <div class="form-group">
            <label for="page">Page Name:</label>
            <input type="text" class="form-control" id="page" name="page" required>
        </div>

        <div class="form-group mt-3">
            <label for="summernote">Page Content:</label>
            <textarea id="summernote" name="content"></textarea>
        </div>
        <button type="submit" name="createNewPage" class="btn btn-primary mt-3">Create Page</button>
        <a href="./" class="btn btn-secondary mt-3" role="button">Back to overview</a>

    </form>
</main> <?php require_once "../inc/footer.php"; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Start typing your content here...',
            tabsize: 2,
            height: 350,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files[0]);
                }
            }
        });
    });

    function sendFile(file) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "uploadimage.php", // Make sure this path is correct
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                $('#summernote').summernote('insertImage', url);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }
</script>