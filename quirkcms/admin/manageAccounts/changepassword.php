<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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