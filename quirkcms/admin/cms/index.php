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

$pageDirs = scandir("../cms/data/");
$pages = [];

foreach ($pageDirs as $dir) {
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

require_once "../inc/header.php";
?>


<div class='row'>
    <div class="col-md-12" style='margin-top: 25px;'>
        <h3>Content Management System</h3>
        <a href='./create_page.php' class='btn btn-primary'>Add new page </a>
        <a href='./create_block.php' class='btn btn-primary'>Add new block </a>

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
                <?php foreach ($pages as $page => $blocks) {
                    foreach ($blocks as $block) {
                        $urlSafePage = urlencode($page); // page
                        $urlSafeBlock = urlencode($block); // blok
                        echo "
                    <tr>
                        <td style='width: 50px;'>
                            <a href='./edit.php?page=$urlSafePage&block=$urlSafeBlock'><i class='fa fa-pencil'></i></a>
                            &nbsp;&nbsp;
                            <a onclick='if(confirm(\"Ben je zeker dat dit echt wil verwijderen?\")){return true;}else{return false;}' href='./delete.php?page=$page&block=$block'><i class='fa fa-trash-o'></i></a>
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
                } ?>
            </tbody>
        </table>

    </div>
</div>

<?php require_once "../inc/footer.php"; ?>
