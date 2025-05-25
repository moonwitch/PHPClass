<?php
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

// Connect to DB
$accDB = new accountDB();

// Get usere
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ./");
    die("No user id provided.");
} else {
    $account = $accDB->getOne($_GET['id']);
}

// And update password when form is submitted
if (isset($_POST['updatepassword'])) {
    if ($_POST['password'] == $_POST['password2']) {
        $accDB->updatePassword($account->id, $_POST['password']);
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Passwords are not the same!
        </div>
<?php
    }
    header("Location: ./");
}

require_once("../inc/header.php");
?>


<div class="row">
    <div class="col-md-12">

        <h3>Change password for <?= $account->firstname ?> <?= $account->name ?></h3>

        <form action="" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label>New password</label>

                    <div class="input-group">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Repeat password</label>

                    <div class="input-group">
                        <input type="password" name="password2" value="" class="form-control">
                    </div>
                </div>
            </div>

            <input type='submit' class='btn btn-lg button-primary' name='updatepassword' value='Update password'>

        </form>
<?php require_once("../inc/footer.php"); ?>