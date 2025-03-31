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
        (isset($_POST['firstname']) && !empty($_POST['firstname'])) &&
        (isset($_POST['name']) && !empty($_POST['name'])) &&
        (isset($_POST['email']) && !empty($_POST['email'])) &&
        (isset($_POST['role']) && !empty($_POST['role']))
    ) {
        $account = new account();
        $account->firstname = $_POST['firstname'];
        $account->name = $_POST['name'];
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
                <div class="col-sm-12">
                    <label>Firstname</label>
                    <div class="input-group">
                        <input type="text" name="firstname" value="" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>Name</label>
                    <div class="input-group">
                        <input type="text" id="Name" name="name" value="" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>E-mail</label>

                    <div class="input-group">
                        <input type="text" name="email" value="" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>Role</label>
         
                    <div class="input-group">
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label>Status</label>

                    <div class="input-group">
                        <select name="status" class="form-control" required>
                            <option value="">Select status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" value="Add userdata" name="adduserdata" class="btn btn-lg btn-primary">

        </form>
    </div>
</div>


<?php require_once("../inc/footer.php"); ?>