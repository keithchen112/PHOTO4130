<?php 

require_once('connection.php');

class ProductManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function listProducts() {
        $sql = "SELECT SKU, title, item_price, description, qty FROM product";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function addProducts() {
        $sql = "INSERT INTO product (SKU, title, item_price, description, qty)
            VALUES ('REN69', 'this is something', '500.00', 'cool','1')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function findProduct($SKU) {
        $params = array(":sku" => $SKU);
        $sql = "SELECT SKU, item_price, description FROM product WHERE SKU = :sku";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }
    
}



?>