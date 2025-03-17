<?php

require_once("../classes/class.account.php");
require_once("../settings.php");

class accountDB{
    // properties

    // private method for db connection
    private function connect(){
        $conn = new PDO("mysql:host=".SERVER.";charset=utf8;dbname=".DB, USER, PSSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    // methods
    public function makeTable(){
        $conn = $this->connect();

        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `account` (
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `created` datetime default CURRENT_TIMESTAMP NOT NULL,
                `updated` datetime default CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
                `firstname` varchar(255) NULL,
                `name` varchar(255) NULL,
                `email` varchar(255) NULL,
                `password` varchar(255) NULL,
                `role` varchar(255) NULL,
                `status` varchar(255) NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;
            ALTER TABLE `account` ADD UNIQUE `uniqueEmail` (`email`);
        SQL;
                
        try {
            $conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insert($account){
        $conn = $this->connect();

        $account->password = password_hash($account->password, PASSWORD_BCRYPT);
        $account->email = strtolower($account->email);

        $sql = <<<SQL
            INSERT INTO `account` 
            VALUES (null, now(), now(), :firstname, :name, :email, :password, :role, :status);
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":firstname", $account->firstname);
        $stmt->bindParam(":name", $account->name);
        $stmt->bindParam(":email", $account->email);
        $stmt->bindParam(":password", $account->password);
        $stmt->bindParam(":role", $account->role);
        $stmt->bindParam(":status", $account->status);

        $stmt->execute();

        $id = $conn->lastInsertId();

        if ($id) {
            return $id;
        } else {
            return false;
        }
    }

    public function emailExists($email){
        $conn = $this->connect();

        $sql = <<<SQL
            SELECT * FROM `account`
            WHERE `email` = :email;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }
    }

    public function findLogin($email, $password){
        $conn = $this->connect();

        $sql = <<<SQL
            SELECT * FROM `account`
            WHERE `email` = :email;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $record = $stmt->fetchObject("account");

        if ($record && password_verify($password, $record->password)) {
            return true;
        } else {
            return false;
        }

    }

    public function getAll(){
        $conn = $this->connect();

        $sql = <<<SQL
            SELECT * FROM `account`;
        SQL;

        $allAccounts = $conn->query($sql);
        return $allAccounts->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $conn = $this->connect();

        $sql = <<<SQL
            DELETE FROM `account`
            WHERE `id` = :id;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    
    public function getOne($key){
        $conn = $this->connect();

        $sql = <<<SQL
            SELECT * FROM `account`
            WHERE `id` = :key;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":key", $key);
        $stmt->execute();
        return $stmt->fetchObject("account");
    }

    public function update($object){
        $conn = $this->connect();

        $object->email = strtolower($object->email);

        $sql = <<<SQL
            UPDATE `account`
            SET 
                `updated` = now(),
                `firstname` = :firstname,
                `name` = :name,
                `email` = :email,
                `role` = :role,
                `status` = :status
            WHERE `id` = :id;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":firstname", $object->firstname);
        $stmt->bindParam(":name", $object->name);
        $stmt->bindParam(":email", $object->email);
        $stmt->bindParam(":role", $object->role);
        $stmt->bindParam(":status", $object->status);
        $stmt->bindParam(":id", $object->id);

        return $stmt->execute();

    }

    public function updatePassword($id, $password){
        $conn = $this->connect();

        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = <<<SQL
            UPDATE `account`
            SET 
                `updated` = now(),
                `password` = :password
            WHERE `id` = :id;
        SQL;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function countAccounts($type = "%"){
        $conn = $this->connect();
    }

    public function dropTable($tablename)
    {
        $conn = $this->connect();

        $sql = <<<SQL
            DROP TABLE $tablename;
        SQL;

        try {
            $conn->query($sql);
            return "Table dropped";
        } catch (PDOException $e) {
            echo 'Could not drop table: ', $e->getMessage();
        }
    }
}

?>