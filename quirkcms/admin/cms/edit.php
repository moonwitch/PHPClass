<?php
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

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
        $msg = "Helaas pindakaas; an error was found.";
        header("Location: .");
        die();
    } else {
        $page = urldecode($_GET["page"]);
        $block = urldecode($_GET["block"]);
        file_put_contents("./data/" . $page . "/" . $block, $_POST["content"]);
    }
}

require_once "../inc/header.php";

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
?>

<form method="post" action="">
    <textarea style="width: 80%; height: 300px" id="summernote" name="content">
        <?= $fileContents ?>
    </textarea>
    <input type="submit" name="saveNewContent" value="Save">
</form>

<?php require_once "../inc/footer.php"; ?>

<!-- include summernote css/js -->
<!-- Using bs5 as I am using bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
