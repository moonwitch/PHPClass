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
if ( !isset($_GET['id']) || empty($_GET['id']) ){
    header("Location: ./");
    die("No user id provided.");
} else {
    $account = $accDB->getOne($_GET['id']);
}

// And update user when form is submitted
if (isset($_POST['updateuserdata'])) {
    $account->firstname = $_POST['firstname'];
    $account->name = $_POST['name'];
    $account->email = $_POST['email'];
    $account->role = $_POST['role'];
    $accDB->update($account);
    header("Location: ./");
}

require_once("../inc/header.php");
?>

<div class="row">
    <div class="col-md-12">

        <h3>Update Account for <?= $account->firstname ?> <?= $account->name ?></h3>

        <form action="" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Firstname</label>
                
                    <div class="input-group">
                        <input type="text" name="firstname" value="<?= $account->firstname ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>Name</label>
                
                    <div class="input-group">
                        <input type="text" name="name" value="<?= $account->name ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>email</label>
               
                    <div class="input-group">
                        <input type="text" name="email" value="<?= $account->email ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>Role</label>
                
                    <div class="input-group">
                        <select name="role">
                            <option value="admin" <?= ($account->role == "admin") ? "selected" : "" ?>>Admin</option>
                            <option value="user" <?= ($account->role == "user") ? "selected" : "" ?>>User</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type='submit' class='btn btn-lg button-primary' name='updateuserdata' value='Update userdata'>

        </form>
        <?php require_once("../inc/footer.php"); ?>