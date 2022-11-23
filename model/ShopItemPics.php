<?php

/**
 * Description of ShopItemPics
 *
 * @author samiwog
 */
class ShopItemPics extends Connection {

    private $id;
    private $shop_id;
    private $picture;
    private $table_name = "shop_item_pics";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getShop_id() {
        return $this->shop_id;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setShop_id($shop_id): void {
        $this->shop_id = $shop_id;
    }

    public function setPicture($picture): void {
        $this->picture = $picture;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new ShopItemPics();
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

    public function add($picture, $shop_id) {
        $sql = "INSERT INTO " . $this->table_name . " (picture, shop_id) VALUES(:picture, :shop_id)";
        $statement = $this->getConnection()->prepare($sql);

        $this->picture = self::sanitize_input($picture);
        $this->shop_id = self::sanitize_input($shop_id);

        $statement->bindParam(":picture", $this->picture);
        $statement->bindParam(":shop_id", $this->shop_id);
        return $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }
    
    public function delete_by_shop_id($shop_id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE shop_id = :shop_id";
        $statement = $this->getConnection()->prepare($sql);
        $this->shop_id = self::sanitize_input($shop_id);

        $statement->bindParam(":shop_id", $this->shop_id);
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
    
    public function get_shop_pics_by_id($shop_id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE shop_id = :shop_id";
        $statement = $this->getConnection()->prepare($sql);
        $this->shop_id = self::sanitize_input($shop_id);
        $statement->bindParam(":shop_id", $this->shop_id);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetchAll();
        } else {
            $row = 0;
        }

        return $row;
    }
    public function get_shop_pics_by_id_2($shop_id) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE shop_id = :shop_id";
        $statement = $this->getConnection()->prepare($sql);
        $this->shop_id = self::sanitize_input($shop_id);
        $statement->bindParam(":shop_id", $this->shop_id);
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
