<?php
// Load classes
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});

// Start Sessions
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

// Check if the form is submitted
if (isset($_POST["saveNewContent"]) && !empty($_POST["content"])) {
    if (
        empty($_GET["page"]) ||
        empty($_GET["block"]) ||
        !file_exists(
            "./data/" .
                urldecode($_GET["page"]) .
                "/" .
                urldecode($_GET["block"])
        )
    ) {
        $_SESSION["cms_feedback"] = "Helaas pindakaas; an error was found.";
        header("Location: .");
        die();
    } else {
        $page = urldecode($_GET["page"]);
        $block = urldecode($_GET["block"]);
        file_put_contents("./data/" . $page . "/" . $block, $_POST["content"]);
        $_SESSION["cms_feedback"] = "File saved!";
    }
}

// Required params
if (
    empty($_GET["page"]) ||
    empty($_GET["block"]) ||
    !file_exists(
        "./data/" . urldecode($_GET["page"]) . "/" . urldecode($_GET["block"])
    )
) {
    $_SESSION["cms_feedback"] =
        "Error: Something went wrong, someone was blamed.";
    header("Location: .");
    die();
} else {
    $page = urldecode($_GET["page"]);
    $block = urldecode($_GET["block"]);
    $fileContents = file_get_contents("./data/" . $page . "/" . $block);
}

// HTML header
require_once "../inc/header.php";
?>

<main class="container py-4">
    <div class="row g-4">
        <h3>Content Management System</h3>

        <h2>Edit Block</h2>
        <div class="mb-4">
            <p class="mb-1 fw-bold">Include command:</p>
            <code class="d-block p-2 bg-light border rounded">
                &lt;?php include('cms/data/<?= htmlspecialchars($page) ?>/<?= htmlspecialchars($block) ?>'); ?&gt;
            </code>
        </div>

        <form method="post" action="">
            <textarea style="width: 80%; height: 300px" id='summernote' name='content'>
                <?= htmlspecialchars($fileContents) ?>
            </textarea>
            <input type="submit" name="saveNewContent" value="Save" class="btn btn-primary mt-3">
            <a href="./" class="btn btn-primary mt-3" role="button">Back to overview</a>
        </form>
    </div>
</main>


<?php require_once "../inc/footer.php"; ?>

<!-- Config last after loading all libs -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Start typing your content here...',
            tabsize: 2,
            height: 350, // Increased height for better editing

            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }
            },
        });

    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "uploadimage.php",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                //editor.insertImage(welEditable, url);
                $('#summernote').summernote('insertImage', url);
                //console.log(url);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }
});
</script>