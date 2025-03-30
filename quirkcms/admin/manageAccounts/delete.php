<?php

require_once("../classes/class.accountDB.php");

session_start();

if (!isset($_SESSION['user'])) {
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