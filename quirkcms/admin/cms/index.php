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

// general feedback method :D
if (isset($_SESSION["cms_feedback"])) {
    echo '<div class="alert alert-success">' .
        htmlspecialchars($_SESSION["cms_feedback"]) .
        "</div>";
    unset($_SESSION["cms_feedback"]);
}

// Folder logic => one directory is one page; one file within is a block.
$pagesDir = scandir("../cms/data/");
$pages = [];

foreach ($pagesDir as $dir) {
    if ($dir == "." || $dir == "..") {
        continue;
    }
    if (!is_dir("../cms/data/" . $dir)) {
        continue;
    }

    $pages[$dir] = [];
    $blocks = scandir("../cms/data/" . $dir);
    foreach ($blocks as $block) {
        if (in_array($block, [".", "..", ".DS_Store"])) {
            continue;
        }
        if (is_file("../cms/data/$dir/$block")) {
            $pages[$dir][] = $block;
        }
    }
}

//html header
require_once "../inc/header.php";
?>

<main class="container py-4">
    <h3>Content Management System</h3>
    <div class="d-grid gap-2 py-4 d-md-flex justify-content-md-end">
        <a href='./create_page.php' class='btn btn-primary' role="button">Add new page </a>
        <a href='./create_block.php' class='btn btn-primary' role="button">Add new block </a>
        <a href="../" class="btn btn-outline-primary" role="button">Back to Admin</a>
    </div>

    <div class="row g-4">
        <table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;'>
            <thead>
                <tr>
                    <th style="width: 50px"></th>
                    <th>Page</th>
                    <th>Block</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($pages) <= 0) {
                    echo "<tr><td colspan='4'>No pages or blocks found. Please create a new page or block.</td></tr>";
                    return;
                } else {
                    foreach ($pages as $page => $blocks) {
                        foreach ($blocks as $block) {
                            $urlSafePage = urlencode($page); // page
                            $urlSafeBlock = urlencode($block); // blok
                            echo "
                        <tr>
                            <td style='width: 50px;'>
                                <a href='./edit.php?page=$urlSafePage&block=$urlSafeBlock'><i class='fa fa-pencil'></i></a>
                                &nbsp;&nbsp;
                                <a onclick='if(confirm(\"Ben je zeker dat dit echt wil verwijderen?\")){return true;}else{return false;}' href='./delete.php?page=$page&block=$block'><i class='fa fa-trash'></i></a>
                                &nbsp;&nbsp;
                            </td>
                            <td>$page</td>
                            <td><a href='./edit.php?page=$urlSafePage&block=$urlSafeBlock'>$block</a></td>
                            <td>" .
                                date(
                                    "d-m-Y H:i:s",
                                    filemtime("./data/$page/$block")
                                ) .
                                "</td>
                        </tr>
                        ";
                        }
                    }
                } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once "../inc/footer.php"; ?>

<!-- Config of Datatables -->
<script type="text/javascript">
    $(function() {
        if ($(".dataTable").length > 0) {
            $(".dataTable").DataTable({
                pageLength: 25,
                responsive: true,
                });
        }
    });
</script>