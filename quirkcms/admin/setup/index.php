<?php
echo '<h1>Setup of QuirkCMS...</h1>';
// DB connection for setup
require_once("../classes/class.accountDB.php");
$accountDB = new accountDB();

// drop table
echo '<p>Dropping table...</p>';
$accountDB->dropTable("account");

// create table
echo '<p>Creating table...</p>';
$accountDB->makeTable();

// insert 4 random accounts
echo '<p>Inserting 4 random accounts...</p>';
$account = new account();
$account->firstname = "Kelly";
$account->name = "C";
$account->email = "kelly@audhd.cloud";
$account->password = "password";
$account->role = "admin";
$account->status = "active";
$accountDB->insert($account);

$account = new account();
$account->firstname = "John";
$account->name = "Doe";
$account->email = "john@doe.deer";
$account->password = "password";
$account->role = "user";
$account->status = "active";
$accountDB->insert($account);

$account = new account();
$account->firstname = "Jane";
$account->name = "Doe";
$account->email = "jane@doe.deer";
$account->password = "password";
$account->role = "user";
$account->status = "active";
$accountDB->insert($account);

$account = new account();
$account->firstname = "Kikki";
$account->name = "Dee";
$account->email = "kikki@dee.deer";
$account->password = "password";
$account->role = "user";
$account->status = "active";
$accountDB->insert($account);

// get list of all accounts
echo '<p>Getting list of all accounts...<br>';
$accounts = $accountDB->getAll();
foreach ($accounts as $account) {
    echo $account->id . ' ' . $account->firstname . ' ' . $account->name . ' ' . $account->email . ' ' . $account->role . ' ' . $account->status . '<br>';
}
echo '</p>';

// delete account 3
echo '<p>Deleting account 3...</p>';
$accountDB->delete(3);
// get list of all accounts
echo '<p>Getting list of all accounts...<br>';
$accounts = $accountDB->getAll();
foreach ($accounts as $account) {
    echo $account->id . ' ' . $account->firstname . ' ' . $account->name . ' ' . $account->email . ' ' . $account->role . ' ' . $account->status . '<br>';
}
echo '<br>';

// update account
echo '<p>Updating account 2...</p>';
$account = $accountDB->getOne(2);
$account->name = "Doooooe";
$accountDB->update($account);

echo '<br>';
// get latest updated account

echo '<p>Getting latest updated account...<br>';
$account = $accountDB->getOne(2);
echo $account->id . ' ' . $account->firstname . ' ' . $account->name . ' ' . $account->email . ' ' . $account->role . ' ' . $account->status . '<br>';
echo '</p>';
?>