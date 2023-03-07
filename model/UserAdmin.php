<?php

/**
 * Description of UserAdmin
 *
 * @author samiwog
 */
class UserAdmin extends Connection {

    private $id;
    private $username;
    private $password;
    private $role;
    private $table_name = "user_admin";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setRole($role): void {
        $this->role = $role;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new UserAdmin();
            } catch (Exception $ex) {
                return $error . ": " . $ex->getMessage();
            }
            return self::$instance;
        }
    }

    public static function sanitize_input($data) {
        $data = stripslashes($data); //Returns a string with backslashes stripped off
        $data = strip_tags($data); //Strip HTML and PHP tags from a string
        $data = htmlspecialchars($data); //turn html tags to text
        $data = trim($data); //Strip whitespace (or other characters) from the beginning and end of a string
        return $data;
    }

    public function add($username, $password, $role) {
        $sql = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES(:username, :password, :role)";
        $statement = $this->getConnection()->prepare($sql);

        $this->username = self::sanitize_input($username);
        $temp_pswd = self::sanitize_input($password);
        $this->password = password_hash($temp_pswd, PASSWORD_DEFAULT);
        $this->role = self::sanitize_input($role);

        $statement->bindParam(":username", $this->username);
        $statement->bindParam(":password", $this->password);
        $statement->bindParam(":role", $this->role);
        return $statement->execute();
    }

    public function update($id, $username, $password, $role) {
        $sql = "UPDATE " . $this->table_name . " SET username = :username, password = :password, role = :role WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);

        $this->id = self::sanitize_input($id);
        $this->username = self::sanitize_input($username);
        $this->password = self::sanitize_input($password);
        $this->role = self::sanitize_input($role);

        $statement->bindParam(":id", $this->id);
        $statement->bindParam(":username", $this->username);
        $statement->bindParam(":password", $this->password);
        $statement->bindParam(":role", $this->role);
        return $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table_name;
        $statement = $this->getConnection()->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetchAll();
        } else {
            $row = 0;
        }
        return $row;
    }
    public function getByUsername($username) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $statement = $this->getConnection()->prepare($sql);
        $this->username = self::sanitize_input($username);
        $statement->bindParam(":username", $this->username);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }
        return $row;
    }

    public function checkUsername($username) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $statement = $this->getConnection()->prepare($sql);
        $this->username = Customer::sanitize_input($username);
        $statement->bindParam(":username", $this->username);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return 1;
        } else {
            return 0;
        }
    }

       public function adminLogin($username, $password) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $statement = $this->getConnection()->prepare($sql);
        $this->username = Customer::sanitize_input($username);
        $this->password = Customer::sanitize_input($password);
        $statement->bindParam(":username", $this->username);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $row['password'])) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
