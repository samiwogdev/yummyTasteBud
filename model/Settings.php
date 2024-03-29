<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Settings
 *
 * @author samiwog
 */
class Settings extends Connection {

    private $id;
    private $title;
    private $definition;
    private $table_name = "settings";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDefinition() {
        return $this->definition;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function setDefinition($definition): void {
        $this->definition = $definition;
    }

        public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Settings();
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
    
        public function add($title, $definition) {
        $sql = "INSERT INTO " . $this->table_name . " (title, definition) VALUES(:title, :definition)";
        $statement = $this->getConnection()->prepare($sql);

        $this->title = self::sanitize_input($title);
        $this->definition = self::sanitize_input($definition);

        $statement->bindParam(":title", $this->title);
        $statement->bindParam(":definition", $this->definition);
        return $statement->execute();
    }
    
     public function update($id, $definition) {
        $sql = "UPDATE " . $this->table_name . " SET definition = :definition WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);

        $this->id = self::sanitize_input($id);
        $this->definition = self::sanitize_input($definition);

        $statement->bindParam(":definition", $this->definition);
        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }
    
        public function get_settings_by_title($title) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE title = :title";
        $statement = $this->getConnection()->prepare($sql);
        
        $this->title = self::sanitize_input($title);
        $statement->bindParam(":title", $this->title);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }
        return $row;
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
    
        public function get_settings_by_id($id) {
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
}
