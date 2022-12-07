<?php

/**
 * Description of Order
 *
 * @author samiwog
 */
class Order extends Connection {

    private $id;
    private $user_email;
    private $shop_id;
    private $qty;
    private $order_status;
    private $payment_status;
    private $trans_ref;
    private $table_name = "order";
    private static $instance;

    public function getId() {
        return $this->id;
    }

    public function getUser_email() {
        return $this->user_email;
    }

    public function getShop_id() {
        return $this->shop_id;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getOrder_status() {
        return $this->order_status;
    }

    public function getPayment_status() {
        return $this->payment_status;
    }

    public function getTrans_ref() {
        return $this->trans_ref;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUser_email($user_email): void {
        $this->$user_email = $user_email;
    }

    public function setShop_id($shop_id): void {
        $this->shop_id = $shop_id;
    }

    public function setQty($qty): void {
        $this->qty = $qty;
    }

    public function setOrder_status($order_status): void {
        $this->order_status = $order_status;
    }

    public function setPayment_status($payment_status): void {
        $this->payment_status = $payment_status;
    }

    public function setTrans_ref($trans_ref): void {
        $this->trans_ref = $trans_ref;
    }

    public static function getInstance() {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            try {
                self::$instance = new Order();
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

    public function add($user_email, $shop_id, $qty, $order_status, $payment_status, $trans_ref) {
        $sql = "INSERT INTO `" . $this->table_name . "` (user_email, shop_id, qty, order_status, payment_status, trans_ref) VALUES(:user_email, :shop_id, :qty, :order_status, :payment_status, :trans_ref)";
        $statement = $this->getConnection()->prepare($sql);
        $this->user_email = self::sanitize_input($user_email);
        $this->shop_id = self::sanitize_input($shop_id);
        $this->qty = self::sanitize_input($qty);
        $this->order_status = self::sanitize_input($order_status);
        $this->payment_status = self::sanitize_input($payment_status);
        $this->trans_ref = self::sanitize_input($trans_ref);

        $statement->bindParam(":user_email", $this->user_email);
        $statement->bindParam(":shop_id", $this->shop_id);
        $statement->bindParam(":qty", $this->qty);
        $statement->bindParam(":order_status", $this->order_status);
        $statement->bindParam(":payment_status", $this->payment_status);
        $statement->bindParam(":trans_ref", $this->trans_ref);
        return $statement->execute();
    }

    public function updateQty($id, $qty) {
        $sql = "UPDATE `" . $this->table_name . "` SET qty = :qty WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->qty = self::sanitize_input($qty);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        $statement->bindParam(":qty", $this->qty);
        return $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $statement = $this->getConnection()->prepare($sql);
        $this->id = self::sanitize_input($id);

        $statement->bindParam(":id", $this->id);
        return $statement->execute();
    }
    
    public function getCartItemID($user_email) {
        $sql = "SELECT shop_id FROM `" . $this->table_name . "` WHERE user_email = :user_email AND payment_status = 0 ";
        $statement = $this->getConnection()->prepare($sql);
        $this->user_email = self::sanitize_input($user_email);
        $statement->bindParam(":user_email", $this->user_email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetchAll();
        } else {
            $row = 0;
        }
        return $row;
    }

    public function getCartCount($user_email) {
        $sql = "SELECT COUNT(id) AS total FROM `" . $this->table_name . "` WHERE user_email = :user_email AND payment_status = 0 ";
        $statement = $this->getConnection()->prepare($sql);
        $this->user_email = self::sanitize_input($user_email);

        $statement->bindParam(":user_email", $this->user_email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $row = $result['total'];
        } else {
            $row = 0;
        }
        return $row;
    }

    public function getCartItemByEmail($user_email) {
        $sql = "SELECT * FROM `" . $this->table_name . "` WHERE order_status = 0 AND payment_status = 0 AND user_email = :user_email";
        $statement = $this->getConnection()->prepare($sql);
        $this->user_email = self::sanitize_input($user_email);
        $statement->bindParam(":user_email", $this->user_email);
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
