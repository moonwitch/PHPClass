<?php
    class account{
    // properties
    public $id;
    public $created;
    public $updated;
    public $firstname;
    public $name;
    public $email;
    public $password;
    public $role;
    public $status;

    // methods
    public function __construct(){
        // log messages
        // send welcome mail
        // ...
    }
    public function __destruct(){
        // log message
        // session close
        // ...
    }
    }
?>