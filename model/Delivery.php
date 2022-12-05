<?php

/**
 * Description of Delivery
 *
 * @author samiwog
 */
class Delivery extends Connection {

    private $id;
    private $city;
    private $amount;
    private $table_name = "delivery";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getCity() {
        return $this->city;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCity($city): void {
        $this->city = $city;
    }

    public function setAmount($amount): void {
        $this->amount = $amount;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Delivery();
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

    public function add($city, $amount) {
        $sql = "INSERT INTO " . $this->table_name . " (city, amount) VALUES(:city, :amount)";
        $statement = $this->getConnection()->prepare($sql);

        $this->city = self::sanitize_input($city);
        $this->amount = self::sanitize_input($amount);

        $statement->bindParam(":city", $this->city);
        $statement->bindParam(":amount", $this->amount);
        return $statement->execute();
    }

    public function update($id, $city, $amount) {
        $sql = "UPDATE " . $this->table_name . " SET city = :city, amount = :amount WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);

        $this->city = self::sanitize_input($city);
        $this->amount = self::sanitize_input($amount);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":city", $this->city);
        $statement->bindParam(":amount", $this->amount);
        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }
    
     public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }
    
    public function get_all() {
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
    
      public function get_by_id($id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);
        $statement->bindParam(":id", $this->id);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }

        return $row;
    }
      public function get_by_id_2($id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);
        $statement->bindParam(":id", $this->id);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetchAll();
        } else {
            $row = 0;
        }

        return $row;
    }

}
