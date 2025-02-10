<?php
session_start();

if (!isset($_SESSION["access"])) {
    header("Location: login.php");
    exit();
} else if ($_SESSION["access"] !== true) {
    header("Location: login.php");
    exit();
}
