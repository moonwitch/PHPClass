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
require_once "../inc/header.php";
?>


<?php require_once "../inc/footer.php"; ?>
