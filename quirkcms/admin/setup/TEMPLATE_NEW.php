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

// HTML header
require_once "../inc/header.php";
?>

<main class="container py-4">
    <div class="row g-4">

        <!-- Insert page -->

    </div>
</main>

<?php
// HTML footer
require_once "../inc/footer.php";
?>