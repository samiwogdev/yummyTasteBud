<?php

/**
 * Description of Customer
 *
 * @author samiwog
 */
class Customer extends Connection {

    private $fullname;
    private $phone;
    private $email;
    private $address;
    private $password;
    private $table_name = "customer";
    private static $instance;

    public function getFullname() {
        return $this->fullname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setFullname($fullname): void {
        $this->fullname = $fullname;
    }

    public function setPhone($phone): void {
        $this->phone = $phone;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setAddress($address): void {
        $this->address = $address;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Customer();
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

    public function add($fullname, $phone, $email, $address, $password) {
        $sql = "INSERT INTO " . $this->table_name . " (fullname, phone, email, address, password) VALUES(:fullname, :phone, :email, :address, :password)";
        $statement = $this->getConnection()->prepare($sql);

        $this->fullname = self::sanitize_input($fullname);
        $this->phone = self::sanitize_input($phone);
        $this->email = self::sanitize_input($email);
        $this->address = self::sanitize_input($address);
        $temp_pswd = self::sanitize_input($password);
        $this->password = password_hash($temp_pswd , PASSWORD_DEFAULT);

        $statement->bindParam(":fullname", $this->fullname);
        $statement->bindParam(":phone", $this->phone);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":address", $this->address);
        $statement->bindParam(":password", $this->password);
        return $statement->execute();
    }

    public function update($id, $fullname, $phone, $email, $address, $password) {
        $sql = "UPDATE " . $this->table_name . " SET fullname = :fullname, phone = :phone, email = :email, address = :address, password = :password WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);

        $this->id = self::sanitize_input($id);
        $this->fullname = self::sanitize_input($fullname);
        $this->phone = self::sanitize_input($phone);
        $this->email = self::sanitize_input($email);
        $this->address = self::sanitize_input($address);
        $temp_pswd = self::sanitize_input($password);
        $this->password = password_hash($temp_pswd , PASSWORD_DEFAULT);

        $statement->bindParam(":id", $this->id);
        $statement->bindParam(":fullname", $this->fullname);
        $statement->bindParam(":phone", $this->phone);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":address", $this->address);
        $statement->bindParam(":password", $this->password);
        return $statement->execute();
    }
    public function updatePasswordByEmail($email, $password) {
        $sql = "UPDATE " . $this->table_name . " SET password = :password WHERE email = :email";
        $statement = $this->getConnection()->prepare($sql);

        $this->email = self::sanitize_input($email);
        $temp_pswd = self::sanitize_input($password);
        $this->password = password_hash($temp_pswd , PASSWORD_DEFAULT);

        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":password", $this->password);
        return $statement->execute();
    }
    
    public function updateByEmail($phone, $email, $address) {
        $sql = "UPDATE " . $this->table_name . " SET phone = :phone, address = :address WHERE email = :email";
        $statement = $this->getConnection()->prepare($sql);

        $this->phone = self::sanitize_input($phone);
        $this->email = self::sanitize_input($email);
        $this->address = self::sanitize_input($address);

        $statement->bindParam(":phone", $this->phone);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":address", $this->address);
        return $statement->execute();
    }
    
        public function checkEmail($email) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $statement = $this->getConnection()->prepare($sql);
        $this->email = Customer::sanitize_input($email);
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
      public function checkPhone($phone) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE phone = :phone";
        $statement = $this->getConnection()->prepare($sql);
        $this->phone = Customer::sanitize_input($phone);
        $statement->bindParam(":phone", $this->phone);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
      public function userLogin($email, $password) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $statement = $this->getConnection()->prepare($sql);
        $this->email = Customer::sanitize_input($email);
        $this->password = Customer::sanitize_input($password);
        $statement->bindParam(":email", $this->email);
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
    
    public function get_user_by_email($email) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $statement = $this->getConnection()->prepare($sql);
        $this->email = self::sanitize_input($email);
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }
        return $row;
    }
    
    public function get_user_by_id($id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $id = self::sanitize_input($id);
        $statement = $this->getConnection()->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }
        return $row;
    }
    

}
