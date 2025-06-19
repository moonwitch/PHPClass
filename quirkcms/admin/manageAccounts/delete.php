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

// Connect to DB
$accDB = new accountDB();

// Get usere
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ./");
    die("No user id provided.");
} 

$account = $accDB->getOne($_GET['id']);

$accDB->delete($_GET['id']);
header("Location: ./");

?>