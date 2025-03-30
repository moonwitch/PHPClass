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

// Add user when form is submitted
if (isset($_POST['adduserdata'])) {
    if (
        (isset($_POST['Firstname']) && !empty($_POST['Firstname'])) &&
        (isset($_POST['Name']) && !empty($_POST['Name'])) &&
        (isset($_POST['email']) && !empty($_POST['email'])) &&
        (isset($_POST['role']) && !empty($_POST['role']))
    ) {
        $account = new account();
        $account->firstname = $_POST['Firstname'];
        $account->name = $_POST['Name'];
        $account->email = $_POST['email'];
        $account->password = "";
        $account->role = $_POST['role'];
        $account->status = "active";
        $accDB->insert($account);
        header("Location: ./");
    }
}

require_once("../inc/header.php");
?>

<div class="row">
    <div class="col-md-12">

        <h3>New Account</h3>

        <form action='' method='post'>
            <div class="form-group">
                <div class="col-md-2">
                    Firstname
                </div>
                <div class="col-md-10">
                    <div class="input-group">
                        <input type="text" id="Firstname" name="Firstname" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    Name
                </div>
                <div class="col-md-10">
                    <div class="input-group">
                        <input type="text" id="Name" name="Name" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    E-mail
                </div>
                <div class="col-md-10">
                    <div class="input-group">
                        <input type="text" id="email" name="email" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    Role
                </div>
                <div class="col-md-10">
                    <div class="input-group">
                        <select name="role" id="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" value="Add userdata" name="adduserdata" class="btn btn-lg btn-primary">

        </form>
    </div>
</div>


<?php require_once("../inc/footer.php"); ?>