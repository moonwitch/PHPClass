<?php
if (!isset($_SESSION["access"])) {
    header("Location: register.php");
    exit();
} else if ($_SESSION["access"] !== true) {
    header("Location: register.php");
    exit();
}
?>