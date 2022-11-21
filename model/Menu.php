<?php

/**
 * Description of Menu
 *
 * @author samiwog
 */
class Menu extends Connection {

    private $id;
    private $name;
    private $table_name = "menu";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Menu();
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

    public function add($name) {
        $sql = "INSERT INTO " . $this->table_name . " (name) VALUES(:name)";
        $statement = $this->getConnection()->prepare($sql);
        
        $this->name = self::sanitize_input($name);
        
        $statement->bindParam(":name", $this->name);
        return $statement->execute();
    }

    public function update($id, $name) {
        $sql = "UPDATE " . $this->table_name . " SET name = :name WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        
        $this->id = self::sanitize_input($id);
        $this->name = self::sanitize_input($name);
        
        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":id", $this->id);
        $statement->execute();
    }
    
     public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);
        
        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }


}
