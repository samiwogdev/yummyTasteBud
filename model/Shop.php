<?php

/**
 * Description of Shop
 *
 * @author samiwog
 */
class Shop extends Connection {

    private $id;
    private $name;
    private $category;
    private $description;
    private $price;
    private $alias;
    private $table_name = "shop";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setCategory($category): void {
        $this->category = $category;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function setAlias($alias): void {
        $this->alias = $alias;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Shop();
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

    public function add($name, $category, $description, $price, $alias) {
        $sql = "INSERT INTO " . $this->table_name . " (name, category, description, price, alias) VALUES(:name, :category, :description, :price, :alias)";
        $statement = $this->getConnection()->prepare($sql);

        $this->name = self::sanitize_input($name);
        $this->category = self::sanitize_input($category);
        $this->description = self::sanitize_input($description);
        $this->price = self::sanitize_input($price);
        $this->alias = self::sanitize_input($alias);

        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":category", $this->category);
        $statement->bindParam(":description", $this->description);
        $statement->bindParam(":price", $this->price);
        $statement->bindParam(":alias", $this->alias);
        return $statement->execute();
    }

    public function update($name, $category, $description, $price, $alias, $id) {
        $sql = "UPDATE " . $this->table_name . " SET name = :name, category = :category, description = :description, price = :price, alias = :alias WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);

        $this->name = self::sanitize_input($name);
        $this->category = self::sanitize_input($category);
        $this->description = self::sanitize_input($description);
        $this->price = self::sanitize_input($price);
        $this->alias = self::sanitize_input($alias);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":category", $this->category);
        $statement->bindParam(":description", $this->description);
        $statement->bindParam(":price", $this->price);
        $statement->bindParam(":alias", $this->alias);
        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }

}
